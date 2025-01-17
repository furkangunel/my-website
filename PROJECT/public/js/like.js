const likeButtons = document.querySelectorAll(".like-button");

likeButtons.forEach((button) => {
    button.addEventListener("click", function () {
        if (button.classList.contains("fa-solid")) {
            button.classList.remove("fa-solid");
            button.classList.add("fa-regular");
            button.classList.remove("active");
        } 
        else {
            button.classList.remove("fa-regular");
            button.classList.add("fa-solid");
            button.classList.add("active");
        }
    });
});
