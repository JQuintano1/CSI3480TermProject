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
            echo "Successful login";
        } else {
            echo "failed login";
        }
        
    
}   catch (PDOException $e){
    die("Query Failed: " . $e->getMessage());
}
}