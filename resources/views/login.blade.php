<?php
session_start();
include "conect.php";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        $_SESSION['user'] = $data;

        echo '<script>
                alert("Welcome, '.$data['nama'].'");
                location.href="index.php";
              </script>';
    } else {
        echo '<script>alert("Username or Password wrong!");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modern Flip Login</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #f2f5f9, #dfe8f2);
            font-family: 'Segoe UI', sans-serif;
            perspective: 1200px;
        }

        .login-box {
            background: #ffffff;
            padding: 40px;
            width: 360px;
            border-radius: 20px;

            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.1),
                0 8px 15px rgba(0, 0, 0, 0.05);

            transform-style: preserve-3d;
            animation: flipIn 1s ease forwards;
        }

        @keyframes flipIn {
            0% {
                transform: rotateY(90deg) scale(0.8);
                opacity: 0;
            }
            60% {
                transform: rotateY(-10deg) scale(1.05);
                opacity: 1;
            }
            100% {
                transform: rotateY(0deg) scale(1);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 3px rgba(74,144,226,0.2);
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #4a90e2, #2f6cd1);
            border: none;
            color: white;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(74,144,226,0.4);
        }

        .signup {
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
        }

        .signup a {
            text-decoration: none;
            color: #4a90e2;
            font-weight: 600;
        }

        .signup a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-box">
    <form method="post">
        <h2>Login</h2>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Login</button>

        <div class="signup">
            Don't have account? <a href="Signup.php">Sign Up</a>
        </div>
    </form>
</div>

</body>
</html>
