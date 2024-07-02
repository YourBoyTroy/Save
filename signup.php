<?php
session_start();
include 'connect.php';

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
            $_SESSION['email'] = $email;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            // Redirect to login page after successful signup
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
        <style>
        body {
            background-image: url('black.jpg'); /* Replace with your actual image path */
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
    <script>
        // JavaScript to show a popup message
        document.addEventListener('DOMContentLoaded', function() {
            // Check if URL has success parameter
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success') && urlParams.get('success') === 'true') {
                alert('Successfully Registered!');
            }
        });
    
    </script>
</head>
<body>
    <div class="container">
        <h1 class="form-title">Register</h1>
        <form method="post" action="signup.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fName" id="fName" placeholder="First Name" required>
                <label for="fName">First Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                <label for="lName">Last Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
        <div class="links">
            <p>Already Have Account ?</p>
            <button onclick="window.location.href='login.html';">Sign In</button>
        </div>
    </div>
</body>
</html>
