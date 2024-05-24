<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: url('dashimage.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 300px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-box input[type="submit"],
        .login-box input[type="button"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .login-box input[type="submit"]:hover,
        .login-box input[type="button"]:hover {
            background-color: #0056b3;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color: #007bff;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Login</h2>
        <form action="loginpage.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login">
        </form>
        <p style="text-align: center;">Are you a new user? Register <a href="registerpage.php">here</a></p>

    </div>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Include the database connection file
    include("logindatabase.php");

    $sql = "Select Name, Password from logindetails;";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($username == $row["Name"] && $password == $row["Password"]) {
                file_put_contents('username.txt', $username);
                header("Location: dashboard.php");
                exit();
                break;
            }
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}
?>