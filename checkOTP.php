<?php
function checkOTP(){
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
        }
?>
        