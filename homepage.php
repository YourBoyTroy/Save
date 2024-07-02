<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.html");
    exit();
}

$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
     * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "poppins", sans-serif;
        }
        body {
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: #fff;
            width: 100%;
            max-width: 1200px;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 20px 35px rgba(0, 0, 1, 0.9);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .dashboard-header {
            background: linear-gradient(to right, #ff9a9e, #fad0c4);
            padding: 10px 0;
            text-align: center;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
            width: 100%;
        }
        .dashboard-header a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .dashboard-header a:hover {
            color: #d42a68; /* Darker pink color */
        }
        form {
            margin: 0 2rem;
        }
        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            padding: 1.3rem;
            margin-bottom: 0.4rem;
        }
        input {
            color: inherit;
            width: 100%;
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #757575;
            padding-left: 1.5rem;
            font-size: 15px;
        }
        .input-group {
            padding: 1% 0;
            position: relative;
        }
        .input-group i {
            position: absolute;
            color: black;
        }
        input:focus {
            background-color: transparent;
            outline: transparent;
            border-bottom: 2px solid hsl(327, 90%, 28%);
        }
        input::placeholder {
            color: transparent;
        }
        label {
            color: #757575;
            position: relative;
            left: 1.2em;
            top: -1.3em;
            cursor: auto;
            transition: 0.3s ease all;
        }
        input:focus ~ label, input:not(:placeholder-shown) ~ label {
            top: -3em;
            color: hsl(327, 90%, 28%);
            font-size: 15px;
        }
        .recover {
            text-align: right;
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        .recover a {
            text-decoration: none;
            color: rgb(125, 125, 235);
        }
        .recover a:hover {
            color: blue;
            text-decoration: underline;
        }
        .or {
            font-size: 1.1rem;
            margin-top: 0.5rem;
            text-align: center;
        }
        .icons {
            text-align: center;
        }
        .icons i {
            color: rgb(125, 125, 235);
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            font-size: 1.5rem;
            cursor: pointer;
            border: 2px solid #dfe9f5;
            margin: 0 15px;
            transition: 1s;
        }
        .icons i:hover {
            background: #07001f;
            font-size: 1.6rem;
            border: 2px solid rgb(125, 125, 235);
        }
        .links {
            display: flex;
            justify-content: space-around;
            padding: 0 4rem;
            margin-top: 0.9rem;
            font-weight: bold;
        }
        .btn {
            font-size: 1.5rem;
            padding: 8px 0;
            border-radius: 5px;
            outline: none;
            border: none;
            width: 100%;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            color: white;
            cursor: pointer;
            transition: 0.9s;
            background-size: 200% auto;
        }
        .btn:hover {
            background-position: right center;
            background: linear-gradient(to right, #1a1f71, #4e54c8);
        }
        .hello-box {
            background: white;
            border: 2px solid pink;
            border-radius: 10px;
            padding: 20px;
            font-family: "Arial", sans-serif;
            font-size: 30px;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 200px;
            width: 100%;
            max-width: 600px;
        }

        body {
            background-image: url('pic.jpg'); /* Replace with your actual image path */
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard-header">
            <a href="index.php">Dashboard</a>
        </div>
        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; flex: 1;">
            <div class="hello-box">
                Hello <?php echo $firstName . ' ' . $lastName; ?>, Welcome! 🙂
            </div>
            <form action="logout.php" method="post" style="margin-top: 20px;">
                <button type="submit" class="btn">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
