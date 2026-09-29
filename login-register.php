<?php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    if ($action === "register") {

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $check_email = $conn->prepare(
            "SELECT Email FROM Ileo_Users WHERE Email = ?");

        $check_email->execute([$email]);

        if ($check_email->rowCount() > 0) {
            echo "This email is already registered";

        } else {
            $stmt = $conn->prepare(
                "INSERT INTO Ileo_Users (Username, Email, Password) VALUES (?, ?, ?)"
            );
            if ($stmt->execute([$username, $email, $hashed_password])) {
                echo "Account created";
            } else {
                echo "Error creating account";
            }
        }
    } elseif ($action === "login") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT * FROM Ileo_Users WHERE Email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['Password'])) {
                echo "login succes";
            } else {
                echo "Invalid Email or Password";
            }
        } else {
            echo "Invalid Email or Password";
        }
    }
}
?>
