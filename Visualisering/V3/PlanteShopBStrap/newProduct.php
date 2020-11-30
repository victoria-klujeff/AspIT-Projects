<?php        

include "include/db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
// Copy all values from $_POST to $_SESSION to keep them available for the whole session
$_SESSION += $_POST;
// // Create database connection. Returns MySQLi object.
// $db = new MySQLi("localhost", "victoria", "victoria", "planteshop");

// Define targe-directory for uploaded files
$imageDir = "C:\\xampp\htdocs\Visualisering\V3-1\PlanteShopBStrap\img\\";
// Initialise array to hold error-messages related to file-upload
$imageErr[] = "";

$errormessage = "";
// If the array with information about file uploads ($_FILES) is not empty
if(!empty($_FILES['productimage']))
{
    // Count how many images were uploaded. Do the for loop as many times as pictures were uploaded.
    for($i = 0; $i < count($_FILES['productimage']['name']); $i++)
    {
        // If no error was returned at the upload of the current image
        if($_FILES['productimage']['error'][$i] == 0)
        {
            // Remove spaces in image filename - if any and add to array containing all image names from this one submit action
            $noSpaceString[] = str_replace(' ', '', $_FILES['productimage']['name'][$i]);
            // Move image current temp location/name to variable
            $imageTmp = $_FILES['productimage']['tmp_name'][$i];
            // Retrieve just the filename from the image name
            $imageFileName = basename($noSpaceString[$i]);
            // Combine the path for image uploads with the image filename
            $imageFullPath = $imageDir . $imageFileName;
            // Check if file was moved correctly from $imageTmp to $imageFullPath
            if(move_uploaded_file($imageTmp, $imageFullPath))
            {
                
                $imageErr[$i] = 0; // If move was successfull errormessage is 0
            }
            else
            {
                $imageErr[$i] = "Billedet kunne ikke flyttes";
            }
        }
        else
        {
            $imageErr[$i] = "Fejl i upload af billedet:" . $_FILES['productimage']['error'][$i];
        }
    }
    // Convert array of image names (with spaces removed) to string, where image names are separated by space
    $prodImagesString = implode(" ", $noSpaceString);
}
else
{
    // If $_FILES is empty nothing was uploaded. Add name of standard no image picture (which will then be uploaded to database)
    $prodImagesString = "No_image_available.png";
}

 // Check if connection to database failed
 if($db->connect_error) 
 {
     // Finish script and write error message
     die("Connection to database failed: ". $db->connect_error);
 }
 else // If connection to database succeeded
 {

     // Check if SQL query succeeded
     if ($db->error) // If SQL query failed
         {
             echo $db->error;
         }
         else // If SQL query succeeded
         {
            
             // Do SQL query to insert data from form fields (and a few others) into table "products"
             // Test if SQL query succeeded
             if($db->query("INSERT INTO products (PName, PDescription, PCategory, PPrice, PImage, PStock, POrigin, PSoil, PSun, PWater, PAlttext)
             VALUES ('{$_POST['productname']}', '{$_POST['proddescription']}', '{$_POST['categori']}', '{$_POST['price']}', '{$prodImagesString}', '{$_POST['stock']}', '{$_POST['origin']}', '{$_POST['soil']}', '{$_POST['sun']}', '{$_POST['water']}', '{$_POST['alttext']}')"))
                 {
                     $errormessage = "Product submission successful";
                 }
                 else
                 {
                     $errormessage = "Product submission not successful: ".$db->error;
                 }
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
    <title>Weirdplantgirl | New product</title>
</head>
<body>
    <?php
        include "include/nav.php";
        
    ?>
    <main class="container">
        <section class="">
        <h2 class="mt-5 mb-5">Create new product</h2>
        <form method="post" enctype="multipart/form-data">
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="productname">Productname</label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="productname" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="categori">Categori</label>
                        </div>
                        <div class="form-group col-md-4">
                        <select id="categori" name="categori" class="form-control">
                            <option value="Anthurium">Anthurium</option>
                            <option value="Philodendron">Philodendron</option>
                            <option value="Monstera">Monstera</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="productimage">Upload image</label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="file" name="productimage[]" multiple class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="alttext">Provide alt text</label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="alttext" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="proddescription">Product description</label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="proddescription" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="price">Price</label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="price" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="origin">Origin</label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="origin" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="soil">Soil</label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="soil" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="water">Water</label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="water" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="sun">Sun/Light</label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="sun" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="stock">In stock</label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="stock" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <input type="submit" name="addNewProduct" value="Add product" class="btn btn-primary">
                        </div>
                        <div class="form-group col-md-4">
                        <p> <?php echo $errormessage; ?></p>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        </div>
                        <div class="form-group col-md-3">
                        </div>
                    </div>
            </form>
        </section>
        
</main>
    

    <?php
    // include "include/footer.php"
    include "include/JS.php";
    ?>
</body>
</html>