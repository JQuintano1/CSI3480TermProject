<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include("databaseconnect.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login</title>
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
            width: 100%;
            padding: 8px;
            border: 1px solid #c8e6c9;
            border-radius: 5px;
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
        }
        button:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Secure Login</h2>
        <form action="" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="user2" required> <!-- username exposure -->
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="password5" required> <!-- password exposure -->
            </div>
            
            <button type="submit">Login</button>
        </form>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $_POST['username'];
            $userpassword = hash('sha512', $_POST['password']);

            try {
                require_once "databaseconnect.php";

                $query = 'SELECT * from accounts where Username = :Username AND Password = :Password';
                $stmt = $pdo->prepare($query);
                
                $stmt->bindParam(':Username', $user);
                $stmt->bindParam(':Password', $userpassword);
                $stmt->execute();
                $row = $stmt->fetch();

                if($row){
                    echo "successful login";
                } else {  
                    echo '<script type="text/javascript">
                    window.onload = function () { alert("Incorrect Username or Password"); } 
                    </script>';
                }
                
            
        }   catch (PDOException $e){
            die("Query Failed: " . $e->getMessage());
        } }
        ?>
        
    </div>
</body>
</html>
