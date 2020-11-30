<!-- New page template
     All neccesary links included -->

<?php
/* We check if session is not set, if true we set session */
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <?php
        include "include/nav.php"
    ?>
    <main class="container">
    </main>

    <?php
    // include "include/footer.php"
    include "include/JS.php";
    ?>
</body>
</html>

