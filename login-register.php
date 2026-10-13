<?php
session_start();

require_once 'includes/config.php';

$message = '';
$show_register = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $action = $_POST["action"] ?? "";

    try {

        if ($action === "register") {

            $show_register = true;

            $username = trim($_POST["username"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $password = $_POST["password"] ?? "";

            if ($username === "" || $email === "" || $password === "") {
                $message = "Vul alle velden in.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "Voer een geldig e-mailadres in.";
            } else {

                $check_email = $conn->prepare(
                    "SELECT `ID` FROM `Ileo_Users` WHERE `Email` = ?"
                );
                $check_email->execute([$email]);

                if ($check_email->fetch()) {
                    $message = "This email is already registered";
                } else {

                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    $stmt = $conn->prepare(
                        "INSERT INTO `Ileo_Users` (`Username`, `Email`, `Password`)
                         VALUES (?, ?, ?)"
                    );

                    $stmt->execute([
                        $username,
                        $email,
                        $hashed_password
                    ]);

                    $message = "Account created. You can now log in.";
                    $show_register = false;
                }
            }

        } elseif ($action === "login") {

            $email = trim($_POST["email"] ?? "");
            $password = $_POST["password"] ?? "";

            if ($email === "" || $password === "") {
                $message = "Vul alle velden in.";
            } else {

                $stmt = $conn->prepare(
                    "SELECT `ID`, `Username`, `Email`, `Password`
                     FROM `Ileo_Users`
                     WHERE `Email` = ?"
                );
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user["Password"])) {
                    session_regenerate_id(true);

                    $_SESSION["user_id"] = $user["ID"];
                    $_SESSION["username"] = $user["Username"];
                    $_SESSION["email"] = $user["Email"];

                    header("Location: profile.php");
                    exit;
                }

                $message = "Ongeldige e-mail of wachtwoord.";
            }

        } else {
            $message = "Ongeldige actie.";
        }

    } catch (PDOException $e) {
        error_log($e->getMessage());
        $message = "Databasefout: " . $e->getMessage();
    }
}

include 'views/login_view.php';
