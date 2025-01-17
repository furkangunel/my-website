<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "UserSystem";

$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($username) && !empty($password)){

        $sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $email, $username, $password);

        if ($stmt->execute()){
            echo "<p style='color: green;'>Kayıt başarılı, Kullanıcı eklendi.</p>";
        }
        else{
            echo "<p style='color: red;'>Hata: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
    else{
        echo "<p style='color: red;'>Lütfen tüm alanları doldurun.</p>";
    }
}
$conn->close();
?>