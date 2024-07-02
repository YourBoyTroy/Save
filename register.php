<?php
session_start(); // Start session at the beginning
include 'connect.php'; // Include database connection

// Handle sign up
if(isset($_POST['signUp'])){
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checkEmail = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        echo "Email Address Already Exists !";
    } else {
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password)
                        VALUES (:firstName, :lastName, :email, :password)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if($stmt->execute()){
            $_SESSION['email'] = $email; // Set session variable
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            header("Location: homepage.php");
            exit(); // Ensure no further script execution after redirection
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
}
?>