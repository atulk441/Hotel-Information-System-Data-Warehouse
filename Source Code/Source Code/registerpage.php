<?php
session_start();
?>
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

        .register-box {
            width: 300px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .register-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-box input[type="text"],
        .register-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .register-box input[type="submit"],
        .register-box input[type="button"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .register-box input[type="submit"]:hover,
        .register-box input[type="button"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="register-box">
        <h2>Register</h2>
        <form action="registerpage.php" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Register">
        </form>


    </div>
</body>

</html>
<?php
// session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $username = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Include the database connection file
        include("logindatabase.php");

        $sql = "INSERT INTO logindetails (Name, EmailID, Password) VALUES ('$username', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registered Successfully.');</script>";
            header("Location: loginpage.php");
            exit();
        } else {
            echo "<script>alert('Error encountered during registeration. Please register again.');</script>";
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "<script>alert('Please fill all the details.');</script>";
    }
}
?>