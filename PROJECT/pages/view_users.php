<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "UserSystem";

$conn = new mysqli($host, $user, $pass, $db);

$sql = "SELECT id, email, username,password, created_at FROM users ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıtlı Kullanıcılar</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: grey;
        }
    </style>
</head>
<body>
    <h1>Kayıtlı Kullanıcılar</h1>
    <?php if ($result->num_rows > 0): ?>
        <table style="width: 50%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Kullanıcı Adı</th>
                    <th>Şifre</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['password']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Henüz kayıtlı kullanıcı yok.</p>
    <?php endif; ?>
    <?php $conn->close(); ?>
</body>
</html>
