<?php
   include "include/db.php";
    /* Set id*/
    $id = 0;
/* If id is set run through the code */
if(isset($_GET['id'])){
    /* find id and generate page based on that*/
    $id = $_GET['id'];
   
 /* Check if any errors happen while connecting to the db*/
   if($db->connect_error){
    /* If an error occurs, the connection is killed*/
       die("Connection to database failed:". $db->connect_error);
   }
   else{
       /* If no errors, we fetch all information from table products and put them in the variable result */
       $result = $db->query("SELECT * FROM products WHERE PID = '$id'");
       if($db->error){
        /* If an error occurs we echo the error*/

           echo $db->error;
       }
       else{
           /*If not we take use the function fetch_assoc to take our info from result */
           $productrow = $result->fetch_assoc();

            /* We test if our array productrow on index prodimage contains any empty spaces
               If it does the array contains more than one image */
            if(strpos($productrow['PImage'], " ")){
                /* If the array contains more than one image we convert the array to a string with the explode function
                   We use the blank space as our seperator */
                $productimages = explode(" ", $productrow['PImage']);
            }
            else{
                /* Else there is only one image
                   We set productimage on index 0 equal to prductrow on index prodimage */
                $productimages[0] = $productrow['PImage'];
            } 
       }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta name="description" content="We are here to provide everyone with a piece on nature - affordable and rare united">
    <title>Weirdplantgirl | Rare Plants | Aroids | Anthurium | Philodendron | Monstera | Sansevieria</title>
</head>
<body>
    <?php
    include "include/nav.php";
    ?>
    <main class="container productPage"> 
        <section class="row ">
        <div class="col-md-6">
        <?php
        /* Create new empty array */
        $productimages[] = "";
        /* We set our counter $i to 0
           We run through the loop as long as the amount of images in our array is more than the value of $i
           We substract 1, as the index of the array starts with 0, but the count function counts from 1.
           So if we dont substract the loop is run through once after the array is empty
           We count up $i 1 each time we run through */
        for($i = 0; $i < count($productimages) - 1; $i++){   
            /* We print our html img sentence */    
             echo "<img class='img-fluid' src='img/{$productimages[$i]}'>";
        }            
        ?>
        </div>

        <div class="col-md-6">
        <h1><?php echo "{$productrow['PName']}"?></h1> 
        <p><?php echo "{$productrow['PDescription']}"?></p> 
        <p><?php echo "{$productrow['PPrice']}"?></p> 

        <?php
        /* We check if the amount of products in stock does not equal 0*/
        if($productrow['PStock'] != 0){  
            /* If true the product is in stock and can be bought */          
            echo "
            <form method='post'>
            <input name='SubmtProdCart' class='BtnToCart btn btn-primary btn-block mr-2 mx-auto' type='submit' value='Add to cart' </input>
            </form>
            ";

        }
        else{           
            /* If false the product cannot be bought and a out of stock message is printed */ 
            echo "<input class='BtnProdPage' type='submit' value='Out of stock' </input>";
        }
        ?>
        <div class="accordion row" id="accordionExample">
            <div class="card col">
                <div class="card-header" id="headingOne">        
                    <h2>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            More info + care                       
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                    <!-- We echo the correct info in each p tag -->
                        <p>Origin: <?php echo "{$productrow['POrigin']}"?></p>
                        <p>Soil: <?php echo "{$productrow['PSoil']}"?></p>
                        <p>Sun: <?php echo "{$productrow['PSun']}"?></p>
                        <p>Water: <?php echo "{$productrow['PWater']}"?></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
</section>
    
</main> 
<?php
    include "include/JS.php";
?>
</body>
</html>