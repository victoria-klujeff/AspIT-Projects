<?php
    include "include/db.php";
    $UpdateMsg = "";
 // print_r($_POST);
 /* This works the same way as edit priviledge by getting all items into an array and into a dropdown where the admin can change te information which is then updated into our table products in the db */
    if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['admAccEditProduct']))
            {
                if($db->query("UPDATE products SET PName = '{$_POST['productname']}', PDescription = '{$_POST['proddescription']}', PPrice = '{$_POST['price']}', PCategory = '{$_POST['categori']}', POrigin = '{$_POST['origin']}', PSoil = '{$_POST['soil']}', PWater = '{$_POST['water']}', PSun = '{$_POST['sun']}', PStock = '{$_POST['stock']}' WHERE  PID = '{$_POST['pID']}'"))
                {
                    $UpdateMsg = "Product has been updated!";
                    $currProductID = $_POST['pID'];
                    $currProductName = $_POST['productname'];
                    $currAltText = $_POST['alttext'];
                    $currProductDescription = $_POST['proddescription'];
                    $currProductPrice = $_POST['price'];
                    $currProductCategory = $_POST['categori'];
                    $currProductOrigin = $_POST['origin'];
                    $currProductSoil = $_POST['soil'];
                    $currProductWater = $_POST['water'];
                    $currProductSun = $_POST['sun'];
                    $currProductStock = $_POST['stock'];
                    if($_POST['categori'] == "Anthurium")
                    {
                        $anthurium = "selected";
                        $philodendron = "";
                        $monstera = "";
                    }
                    elseif($_POST['categori'] == "Philodendron")
                    {
                        $anthurium = "";
                        $philodendron = "selected";
                        $monstera = "";
                    }
                    elseif($_POST['categori'] == "Monstera")
                    {
                        $anthurium = "";
                        $philodendron = "";
                        $monstera = "selected";
                    }
                }
                else
                {
                    $UpdateMsg = "The product was not updated!";
                }
            }
            
        
    }
    $result = $db->query("SELECT * FROM products");

        if($db->error)
        {
            echo $db->error;
        }
        else
        {
            while($productRow = $result->fetch_assoc())
            {
                $allProducts[] = $productRow;
            }
        }
    if(!isset($_POST['chooseProductSubmit'])){
            $currProductID = $allProducts[0]['PID'];
            $currProductName = $allProducts[0]['PName'];
            $currProductImage[] = $allProducts[0]['PImage'];
            $currAltText = $allProducts[0]['PAlttext'];
            $currProductDescription = $allProducts[0]['PDescription'];
            $currProductPrice = $allProducts[0]['PPrice'];
            $currProductCategory = $allProducts[0]['PCategory'];
            $currProductOrigin = $allProducts[0]['POrigin'];
            $currProductSoil = $allProducts[0]['PSoil'];
            $currProductWater = $allProducts[0]['PWater'];
            $currProductSun = $allProducts[0]['PSun'];
            $currProductStock = $allProducts[0]['PStock'];
        if($allProducts[0]['PCategory'] == "Anthurium")
        {
            $anthurium = "selected";
            $philodendron = "";
            $monstera = "";
        }
        elseif($allProducts[0]['PCategory'] == "Philodendron")
        {
            $anthurium = "";
            $philodendron = "selected";
            $monstera = "";
        }
        elseif($allProducts[0]['PCategory'] == "Monstera")
        {
            $anthurium = "";
            $philodendron = "";
            $monstera = "selected";
        }
      }

    

    // print_r($allUsers);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta name="description" content="We are here to provide everyone with a piece on nature - affordable and rare united">
    <title>Weirdplantgirl | Edit product</title>
</head>
<body>

    <?php include "include/nav.php"; ?>

    <main class="container">
        <section>
            <h2 class="mt-5 mb-5">Edit product</h2>

            <article>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-row align-items-end">
                    <div class="form-group col-md-3">
                            <label for="chooseProduct">Products: </label>
                        </div>
                        <div class="form-group col-md-3">
                            <select name="chooseProduct" class="form-control">
                                <?php
                                    // Opret et select field (dropdown box) hvor alle brugerne fra tabellen users indsættes, så administratorer kan vælge, hvilken bruger de vil ændre i
                                    foreach($allProducts as $product)
                                    {
                                        if($_SERVER['REQUEST_METHOD'] == "POST")
                                        {
                                            // $selectedUser = $_POST['vaelgBruger'];

                                            if($products['PID'] == $currProductID)
                                            {
                                                echo "<option value='{$product['PName']}' selected>{$product['PName']} | {$product['PPrice']}</option>";
                                                $currProductID = $product['PID'];
                                                $currProductName = $product['PName'];
                                                $currProductImage = $product['PImage'];
                                                $currAltText = $product['PAlttext'];
                                                $currProductDescription = $product['PDescription'];
                                                $currProductPrice = $product['PPrice'];
                                                $currProductCategory = $product['PCategory'];
                                                $currProductOrigin = $product['POrigin'];
                                                $currProductSoil = $product['PSoil'];
                                                $currProductSun = $product['PSun'];
                                                $currProductWater = $product['PWater'];
                                                $currProductStock = $product['PStock'];
                                                if($product['PCategory'] == "Anthurium")
                                                {
                                                    $anthurium = "selected";
                                                    $philodendron = "";
                                                    $monstera = "";
                                                }
                                                elseif($product['PCategory'] == "Philodendron")
                                                {
                                                    $anthurium = "";
                                                    $philodendron = "selected";
                                                    $monstera = "";
                                                }
                                                elseif($product['PCategory'] == "Monstera")
                                                {
                                                    $anthurium = "";
                                                    $philodendron = "";
                                                    $monstera = "selected";
                                                }

                                            }
                                            else
                                            {
                                                echo "<option value='{$product['PName']}'>{$product['PName']} | {$product['PPrice']}</option>";

                                            }
                                        }
                                        else
                                        {
                                            echo "<option value='{$product['PName']}'>{$product['PName']} | {$product['PPrice']}</option>";

                                        }
                                        
                                    }
                                ?>                        
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="submit" name="chooseProductSubmit" value="Choose" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="pID">Item number: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="pID" value="<?php echo $currProductID; ?>" class=" form-control form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="product">Name: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="productname" value="<?php echo $currProductName; ?>" class=" form-control form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="categori">Category:</label>
                        </div>
                        <div class="form-group col-md-4">
                            <select name="categori" class="form-control">
                                <option value="Anthurium" <?php echo $anthurium; ?>>Anthurium</option>
                                <option value="Philodendron" <?php echo $philodendron; ?>>Philodendron</option>
                                <option value="Monstera" <?php echo $monstera; ?>>Monstera</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="alttext">Alt text: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="alttext" value="<?php echo $currAltText; ?>"  class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="proddescription">Description: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <textarea type="text" rows="10" style="resize: none;" name="proddescription" class="form-control"><?php echo $currProductDescription; ?></textarea>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="price">Price: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="price" value="<?php echo $currProductPrice; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="origin">Postalcode: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="origin" value="<?php echo $currProductOrigin; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="soil">Soil: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="soil" value="<?php echo $currProductSoil; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="sun">Sun: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="sun" value="<?php echo $currProductSun; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="water">Water: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="water" value="<?php echo $currProductWater; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="stock">Stock: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="stock" value="<?php echo $currProductStock; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <input type="submit" value="Accept Changes" name="admAccEditProduct" class="btn btn-primary">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="submit" value="Regret Changes" name="admRegEditProduct" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <?php echo $UpdateMsg; ?>
                        </div>
                    </div>
                </form>
            </article>
        </section>
    </main>
    <?php

        include "include/JS.php";
    ?>
</body>
</html>