<!-- 
    mangler:
    Opret produkt
    Ret produkt
    Log in
    Log ud
    Opret bruger
    Hash koder
    Ret bruger
    Tilmeld nyhedsbrev
    Tilføj til kurv
    Betaling
    Sorter efter kategorier
    

 -->
<?php
include "include/db.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta name="description" content="We are here to provide everyone with a piece on nature - affordable and rare united">
    <title>Weirdplantgirl | Rare Plants | Aroids | Anthurium | Philodendron | Monstera | Sansevieria</title>
</head>
<body class ="container">
<?php
    include "include/nav.php";
?>
<header class="card headerMobile">
  <img class="card-img d-none d-md-block" src="img/header_aroid1.jpg" alt="Card image">
  <div class="card-img-overlay text-center">
  <h1 class="headerText">We are here to provide everyone with a piece on nature - affordable and rare united</h1>
    <p>The team at WeirdPlantGirl source rare plants at local and experienced growers all over the world. 
             We try to keep prices as low as possible by flooding the market with the most amazing plants and by that we force the prices down.
             Our goal is to eradicate the idea of rare and exclusive plants by making them available to hobbyist growers.
             All our plants are sustainably sourced and we do not condone any illegal activity or plant poaching. 
         </p> 
 </div>
</header>
<main class=" index">
    
    <h1 class="text-center">The Plants</h1>
        <section class="row text-center">
            <div class="card col-md-6 mt-5">            
                <a href="shop.php?cat=alle"><img class="card-img w-100" src="img/allIndex.jpg" alt="Anthurium">
                <div class="card-img-overlay">
                <h1 class=" card-text">All</h1>
                </div></a>
            </div>
            
            <div class="card col-md-6 mt-5">
            <a href="shop.php?cat=Anthurium"><img class="card-img" src="img/aUnknownIndex.jpg" alt="Anthurium">
                <div class=" card-img-overlay">
                <h1 class=" card-text">Anthurium</h1>
                </div></a>
                
            </div>
        </section>

        <section class="row text-center mb-5">
            <div class="card col-md-6 mt-5">            
                <a href="shop.php?cat=Philodendron">
                <img class="card-img" src="img/pGloriosumIndex.jpg" alt="Philodendron Tropical Plants Houseplant Aroids Rare ">
                <div class="card-img-overlay">
                <h1 class=" card-text">Philodendron</h1>
                </div></a>
            </div>
            
            <div class="card col-md-6 mt-5">
                <a href="shop.php?cat=Monstera">
                <img class="card-img" src="img/mDeliciosaIndex.jpg" alt="Anthurium">
                <div class="card-img-overlay">
                <h1 class=" card-text">Monstera</h1>
                </div></a>
            </div>
        </section>
</main>
<?php
    include "include/footer.php";
    include "include/JS.php";
?>
</body>
</html>