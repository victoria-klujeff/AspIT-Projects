<?php
   include "include/db.php";
 /* Set id*/
    $id = 0;
    $_updatemessage = "";
    $disabled = "disabled";

/* If id is set run through the code */
if(isset($_GET['id'])){
    /* find id and generate page based on that*/
    $id = $_GET['id'];

    $_SESSION['getID'] = $id;
   /* Create connection to datatbase
   Database info in variables, makes it easier if changes are neccesary*/

 
   
 /* Check if any errors happen while connecting to the db*/
   if($db->connect_error){
    /* If an error occurs, the connection is killed*/
       die("Connection to database failed:". $db->connect_error);
   }
   else{
       /* If no errors, we fetch all information from table products and put them in the variable result */
       $resultEvent = $db->query("SELECT * FROM events WHERE EID = '$id'");
       if($db->error){
        /* If an error occurs we echo the error*/

           echo $db->error;
       }
       else{
           /*If not we take use the function fetch_assoc to take our info from result */
           $eventrow = $resultEvent->fetch_assoc();
           $eventDate = date("d-m-Y", strtotime($eventrow['EDate']));

            /* We test if our array productrow on index prodimage contains any empty spaces
               If it does the array contains more than one image */
            if(strpos($eventrow['EImage'], " ")){
                /* If the array contains more than one image we convert the array to a string with the explode function
                   We use the blank space as our seperator */
                $eventimages = explode(" ", $eventrow['EImage']);
            }
            else{
                /* Else there is only one image
                   We set productimage on index 0 equal to prductrow on index prodimage */
                $eventimages[0] = $eventrow['EImage'];
            } 
       }
   }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Define targe-directory for uploaded files
    $imageDir = "C:\\xampp\htdocs\V3-1-Exam\img\\";
    // Initialise array to hold error-messages related to file-upload
    $imageErr[] = "";

    // If the array with information about file uploads ($_FILES) is not empty
    if(!empty($_FILES['eventImage']))
    {
        // Count how many images were uploaded. Do the for loop as many times as pictures were uploaded.
        for($i = 0; $i < count($_FILES['eventImage']['name']); $i++)
        {
            // If no error was returned at the upload of the current image
            if($_FILES['eventImage']['error'][$i] == 0)
            {
                // Remove spaces in image filename - if any and add to array containing all image names from this one submit action
                $noSpaceString[] = str_replace(' ', '', $_FILES['eventImage']['name'][$i]);

                // Move image current temp location/name to variable
                $imageTmp = $_FILES['eventImage']['tmp_name'][$i];

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
                $imageErr[$i] = "Fejl i upload af billedet:" . $_FILES['eventImage']['error'][$i];
            }
        }
        // Convert array of image names (with spaces removed) to string, where image names are separated by space
        $ImagesString = implode(" ", $noSpaceString);
    }
    else
    {
        // If $_FILES is empty nothing was uploaded. Add name of standard no image picture (which will then be uploaded to database)
        $ImagesString = "No_image_available.png";
    }
    if(isset($_POST['tilmeldArrangement'])){
        $currPart = intval($eventrow['ECurrPart']);
        $addParticipant = $_POST['tilmeldAntal'];
        $newCurrPart = $addParticipant + $currPart;
        if($db->query(
            "UPDATE events
            SET ECurrPart= '{$newCurrPart}'
            WHERE $eventrow[EID] = EID")){
              $_updatemessage = "Du er nu tilmeldt arrangementet";
              header('location: testindex.php');
            }
            else{
              $_updatemessage = "Hov, noget gik galt";
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
    <meta name="description" content="Starup UIF arrangements kalender. Opret nye arrangementer - tilmeld dig arrangementer. Et godt sted at starte et aktivt og interessant fritidsliv.">
    <title>Starup UIF arrangementer - vis arrangement</title>
</head>
<body>
<?php
include "include/nav.php";
?>
    <main class="container">
    
        <section class="row">
           
            <?php
                 /* Create new empty array */
                $eventimages[] = "";
                /* We set our counter $i to 0
                We run through the loop as long as the amount of images in our array is more than the value of $i
                We substract 1, as the index of the array starts with 0, but the count function counts from 1.
                So if we dont substract the loop is run through once after the array is empty
                We count up $i 1 each time we run through */
                for($i = 0; $i < count($eventimages) - 1; $i++){   
                    /* We print our html img sentence */    
                    echo "<div class='col-md-6 col-xs-12'>
                            <img class='img-fluid' src='img/{$eventimages[$i]}'>
                         </div>";
                }     
            ?>
            <div class="col-md-6 col-xs-12">
            <h1><?php echo $eventrow['EName']; ?></h1>
            <p>Event beskrivelse: <?php echo $eventrow['EDescription']; ?></p>
            <p>Dato: <?php echo $eventDate; ?></p>
            <p>Starttidspunkt: <?php echo $eventrow['EStartTime']; ?></p>
            <p>Sluttidspunkt <?php echo $eventrow['EEndTime']; ?></p>
            <p>Sted: <?php echo $eventrow['EPlace']; ?></p>
            <p>Max antal deltagere: <?php echo $eventrow['EMaxPart']; ?></p>
            <p>Event ansvarlig:  <?php echo $eventrow['EContactName']; ?></p>
            <p>Kontakt nr.: <?php echo $eventrow['EContactPhone']; ?></p>
            
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?id={$eventrow['EID']}"; ?>">
                    <?php
                        if(isset($_SESSION['loginSubmit'])){
                            if($eventrow['ECurrPart'] == $eventrow['EMaxPart']){
                                echo "<p>Der er ikke flere ledige pladser</p>";
                            }
                            else{
                                echo "                    
                                <label for='tilmeldAntal'>Tilmeld antal:</label>
                                <p class='row'>
                                <input class='form-control col-md-6' type='number' name='tilmeldAntal' min='1'>
                                <input class='btn btn-primary col-md-6' type='submit' name='tilmeldArrangement' value='Tilmeld'></p>
                                <p> $_updatemessage </p>";
                            }
                        } ?>
            </form>
            </div>
            </div>

            
        </section>
    </main>
</body>
</html>