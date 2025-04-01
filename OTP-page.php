<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure OTP Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f5e9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }
        h2 {
            color: #388e3c;
            margin-bottom: 10px;
        }
        .info-text {
            font-size: 14px;
            color: #555;
            margin-top: 15px;
            display: none;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .input-group input {
            width: calc(100% - 16px);
            padding: 8px;
            border: 1px solid #c8e6c9;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Secure OTP Login</h2>
        <form action="" method="POST">
            <div class="input-group">
                <label for="otp">One-Time Password (OTP)</label>
                <input type="text" id="onetimepassword" name="onetimepassword" required>
            </div>
            <button type="submit">Verify OTP</button>
        </form>
        <?php
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST")
            $userOTP = null;
            (string)$userOTP = $_POST["onetimepassword"] ?? '';    
            if($userOTP == $_SESSION['otp']){
                echo '<script type="text/javascript">
                 window.onload = function () { alert("You have successfully logged in."); } 
                </script>';
            } else {  
                 echo '<script type="text/javascript">
                window.onload = function () { alert("Incorrect Username or Password"); } 
                </script>';
            }
        ?>
        <p id="info-text" class="info-text">Check your email for your One-Time Password.</p> 
        
        
    </div>       
</body>
</html>