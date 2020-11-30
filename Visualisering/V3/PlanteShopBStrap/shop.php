<?php
include "include/db.php";

/* If category not set url is determined to show all products */
if(!isset($_GET['cat']))
    {
        header('location: testshop.php?cat=alle');
    } 
/* We put our GET in a variable and set a rowCount */
$category = $_GET['cat'];
$rowCount = "";
/* Connect to database if fail sent a connect error */
if($db->connect_error)
{
    echo $db->connect_error;
}
/*  if connection to db succesfull we check if category is set to all. 
    If true we set result to fetch all products from products table 
    else we only select products from products table where category = category  */
 else{
    if($category == "alle")
        {
            $result = $db->query("SELECT * FROM products");
        }
        else
        {
            $result = $db->query("SELECT * FROM products WHERE PCategory = '$category'");
        }
/* If db connect error we send error else we check if number of rows is more than 1 
    if true we put all the results in a associative array with a while loop. 
    By using a while loop we make sure the code only runs when there are more rows in the table */
        if($db->error)
        {
            echo $db->error;
        }
        else{
            if($result->num_rows > 0)
            {
                while($rows = $result->fetch_assoc())
                {
                    $prodrows[] = $rows;
                }
            }
            else
            {
                $prodrows[0]['PID'] = "";
            }
            
        }
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
    <meta name="description" content="We are here to provide everyone with a piece on nature - affordable and rare united">
    <title>Weirdplantgirl | Shop rare plants</title>
</head>
<body>
<?php
    include "include/nav.php";
    ?>

    <main class="container shop">
    <?php
    if($_GET['cat'] == 'Philodendron'){
        echo '<h1>Philodendron</h1>';
    }
    elseif($_GET['cat'] == 'Anthurium'){
        echo '<h1>Anthurium</h1>';
    }
    elseif($_GET['cat'] == 'Monstera'){
        echo '<h1>Monstera</h1>';
    }
    else{
        echo '<h1>All Plants</h1>';
    }

    ?>
    <section>
    <div class="dropdown">
                <a href="#" class="btn btn-primary dropdown-toggle" role="button" data-toggle="dropdown" data-flip="false">Choose Category</a>
                <div class="dropdown-menu" aria-labelledby="categoryChooser">
                    <a class="dropdown-item" href="shop.php?cat=alle">All</a>
                    <a class="dropdown-item" href="shop.php?cat=Anthurium">Anthurium</a>
                    <a class="dropdown-item" href="shop.php?cat=Philodendron">Philodendron</a>
                    <a class="dropdown-item" href="shop.php?cat=Monstera">Monstera</a>
            </div>

    </section>
    <section class="row">
    
    <?php
        $rowCount = count($prodrows);
        if($prodrows[0]['PID'] == "")
        {
            echo "<div class=' row'><div class='noProducts col-12'><h4 >No products available</h4></div></div>
            ";
        }
        else{
            /*We set our init counter to equal $rowCount - 1 because any arrays first index is 0
          The loop is set to run until $j is greater than or equal 0
          For every run through we count 1 down
          This means our products are shown with the newest on first and all our products wil be shown*/
            for($j = $rowCount - 1; $j >= 0; $j--){
                /*We check our ProdImage string contains any spaces
                If true it means there is more than one picture */
                if(strpos($prodrows[$j]['PImage'], " ")){
                    /* To print more than one image we use the function explode
                    explode converts a string to an array with empty keystroke as seperator
                    The array is saved in $productimages */
                    $productimages = explode(" ", $prodrows[$j]['PImage']);
                }
                else{
                    /* If false only one picture has been uploaded
                    And only that picture is put in the array */
                    $productimages[0] = $prodrows[$j]['PImage'];
                }
                /* We echo our html containing the productimages and productrow
                on index $j and the value matching the info we want to output 
                We also use a href and look for the id so we can produce a page
                based on the info in the array*/
                echo
                "<div class='col-md-4 card text-center mt-5'>
                <a href='productPage.php?id={$prodrows[$j]['PID']}'> 
                <img class='img-fluid imgShop' src='img/{$productimages[0]}'>
                </a> 
                <div class='card-text'>
                <h2 class='h3 text-capitalize'>{$prodrows[$j]['PName']}</h2> 
                <p>{$prodrows[$j]['PPrice']}</p> 
                
                <div class='row  d-flex justify-content-center'>
                <a href='productPage.php?id={$prodrows[$j]['PID']}'> 
                <input type='submit' value='View product' class=' btn btn-primary btn-block mr-2 mx-auto text-capitalize'>
                </a> 
                <a href='productPage.php?id={$prodrows[$j]['PID']}'> 
                <input type='submit' value='add To Cart' class=' btn btn-primary btn-block ml-2 text-capitalize'>
                </a> 
                </div>
                </div>
                </div>";
            }
        }
        
   ?>
   </section>
    </main>
        <?php
            include "include/JS.php";
            include "include/footer.php";

        ?>
</body>
</html>