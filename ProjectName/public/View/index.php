<?php
session_start();
if (!isset($_SESSION['userData'])){
    //header("Location: http://ec2-3-129-209-209.us-east-2.compute.amazonaws.com/View/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="https://mayar.abertay.ac.uk/~1600964/Honours-Project/Android/APIs/View/css/index.css">
    <?php include("templates/header.php"); ?>
</head>
    <body>
        <?php include("templates/nav.php"); ?>

            <div class="header">
                <a href="https://mayar.abertay.ac.uk/~1600964/Honours-Project/Android/APIs/View/index"><h1>Honours Project</h1></a>
                <h3>Aaron Stones | BSc Computing | Abertay University</h3>
            </div>

        <?php include("templates/footer.php"); ?>
    </body>
</html>