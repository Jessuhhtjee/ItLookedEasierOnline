const loginSection = document.getElementById("login-section");
const registerSection = document.getElementById("register-section");

const registerButton = document.getElementById("Register_button");
const backToLogin = document.getElementById("Back_to_login");


registerButton.addEventListener("click", function () {
    loginSection.style.display = "none";
    registerSection.style.display = "flex";
});


backToLogin.addEventListener("click", function () {
    registerSection.style.display = "none";
    loginSection.style.display = "flex";
});
