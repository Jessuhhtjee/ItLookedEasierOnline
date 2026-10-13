<?php
session_start();

require_once 'includes/config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $action = $_POST["action"] ?? "";

    try {

        if ($action === "register") {

            $username = trim($_POST["username"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $password = $_POST["password"] ?? "";

            if ($username === "" || $email === "" || $password === "") {

                $message = "Vul alle velden in.";

            } else {

                $hashed_password = password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );

                $check_email = $conn->prepare(
                    "SELECT Email FROM Ileo_Users WHERE Email = ?"
                );

                $check_email->execute([$email]);

                if ($check_email->fetch()) {

                    $message = "This email is already registered";

                } else {

                    $stmt = $conn->prepare(
                        "INSERT INTO Ileo_Users (Username, Email, Password)
                         VALUES (?, ?, ?)"
                    );

                    if ($stmt->execute([
                        $username,
                        $email,
                        $hashed_password
                    ])) {

                        $message = "Account created. You can now log in.";

                    } else {

                        $message = "Error creating account";
                    }
                }
            }

        } elseif ($action === "login") {

            $email = trim($_POST["email"] ?? "");
            $password = $_POST["password"] ?? "";

            $stmt = $conn->prepare(
                "SELECT * FROM Ileo_Users WHERE Email = ?"
            );

            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // TIJDELIJKE TEST: controleer of de gebruiker bestaat.
            if (!$user) {

                $message = "GEBRUIKER NIET GEVONDEN IN DATABASE";

            } else {

                $message = "GEBRUIKER GEVONDEN\n";
                $message .= "ID: " . $user["ID"] . "\n";

                if (password_verify($password, $user["Password"])) {

                    // Login succesvol.
                    session_regenerate_id(true);

                    $_SESSION["user_id"] = $user["ID"];
                    $_SESSION["username"] = $user["Username"];
                    $_SESSION["email"] = $user["Email"];

                    header("Location: profile.php");
                    exit;

                } else {

                    $message .= "Wachtwoordcontrole: FALSE";
                }
            }

        } else {

            $message = "Ongeldige actie.";
        }

    } catch (PDOException $e) {

        error_log($e->getMessage());
        $message = "Databasefout: " . $e->getMessage();
    }
}

// HTML pas laden nadat PHP klaar is.
include 'views/login_view.php';
?>