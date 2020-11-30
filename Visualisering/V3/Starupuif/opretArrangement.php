<?php
    $errormessage = "";
    if(!isset($_SESSION)) 
     { 
         session_start(); 
     }

     $servername = "localhost";
     $usernamedb = "victoria";
     $passworddb = "victoria";
     $namedb = "starupuif";
  
     $db = new MySQLi($servername, $usernamedb, $passworddb, $namedb); 


if($_SERVER['REQUEST_METHOD'] == 'POST'){

// Define targe-directory for uploaded files
$imageDir = "C:\\xampp\htdocs\V3-1-Exam\img\\";
// Initialise array to hold error-messages related to file-upload
$imageErr[] = "";
print_r($_FILES);

// If the array with information about file uploads ($_FILES) is not empty
if(!empty($_FILES['eventImage']))
{
    print_r($_FILES);
    echo $_FILES;
    // Count how many images were uploaded. Do the for loop as many times as pictures were uploaded.
    for($i = 0; $i < count($_FILES['eventImage']['name']); $i++)
    {
        // If no error was returned at the upload of the current image
        if($_FILES['eventImage']['error'][$i] == 0)
        {
            print_r($_FILES);
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
    $eventImagesString = implode(" ", $noSpaceString);
}
else
{
    // If $_FILES is empty nothing was uploaded. Add name of standard no image picture (which will then be uploaded to database)
    $eventImagesString = "No_image_available.png";
}
echo $imageFileName;
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
            //  // Transfer MySQLi-result object to array (that we can work on/with)
            //  $row = $resultuser->fetch_assoc();

             
             // Do SQL query to insert data from form fields (and a few others) into table "products"
             // Test if SQL query succeeded
             if($db->query("INSERT INTO events (EImage, EName, EDescription, ECategory, EDate, EStartTime, EEndTime, EPlace, EPrice, EMaxPart, ECurrPart, EContactName, EContactPhone, ECreatedBy) 
             VALUE ('{$eventImagesString}', '{$_POST['eventNavn']}', '{$_POST['eventBeskrivelse']}', '{$_POST['eventCategory']}', '{$_POST['eventDato']}', '{$_POST['eventStartTid']}', '{$_POST['eventSlutTid']}', '{$_POST['eventSted']}', '{$_POST['eventPris']}', '{$_POST['eventMaxDelt']}', '0', '{$_POST['eventAnsvarlig']}', '{$_POST['eventAnsvTlf']}', '{$_SESSION['brugerMail']}')"))
                 {
                     $errormessage = "Produktoprettelse lykkedes.";
                 }
                 else
                 {
                     $errormessage = "Produktoprettelse lykkedes ikke: ".$db->error;
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
    <meta name="description" content="Starup UIF arrangements kalender. Opret nye arrangementer - tilmeld dig arrangementer. Et godt sted at starte et aktivt og interessant fritidsliv.">
    <title>Starup UIF arrangementer - opret arrangement</title>
</head>
<body>
    <?php
        include "include/nav.php"
    ?>
    <main class="container">
        <section>
            <h1>Opret arrangement</h1>

            <article>
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                    <p class="form-group">
                        <label for="eventNavn">Navn på arrangement: </label>
                        <input type="text" name="eventNavn" class="form-control">
                   </p>
                    <p class="form-group">
                        <label for="eventCategory">Kategori</label>
                        <select name="eventCategory" class="form-control">
                            <option value="Musik">Musik</option>
                            <option value="Kunst">Kunst</option>
                            <option value="Foredrag">Foredrag</option>
                            <option value="Sport">Sport/idræt</option>
                            <option value="Natur">Natur</option>
                            <option value="Andet">Andet</option>
                        </select>
                    </p>
                    <p class="form-group">
                        <label for="eventBeskrivelse">Beskrivelse af arrangementet:</label>
                        <textarea name="eventBeskrivelse" placeholder="Indtast beskrivelse..." style="resize: none;" class="form-control"></textarea>
                    </p>
                    <p>
                        <label for="eventImage">Upload et billede til/af arrangement:</label>
                        <input type="file" name="eventImage[]" class="form-control" multiple class='form-control'>
                    </p>
                    <div class="form-row">
                        <div class="col-md-4">
                        <label for="eventDato">Dato: </label>
                        <input type="date" name="eventDato" min="2020-01-01" max="2020-12-31" class="form-control"></div>
                        
                        <div class="col-md-4">
                        <label for="eventStartTid">Start tidspunkt: </label>
                        <input type="time" name="eventStartTid" class="form-control"></div>

                       
                        <div class="col-md-4">
                        <label for="eventSlutTid">Slut tidspunkt (ikke påkrævet): </label>
                        <input type="time" name="eventSlutTid" class="form-control"></div>
                    </div>
                    <p>
                        <label for="eventSted">Sted: </label>
                        <input type="text" name="eventSted" class="form-control">
                    </p>
                    <p class="form-group">
                        <label for="eventPris">Pris: </label>
                        <input type="text" name="eventPris" class="form-control">
                    </p>
                    <p class="form-group">
                        <label for="eventMaxDelt">Max. antal deltagere: </label>
                        <input type="number" name="eventMaxDelt" class="form-control" min="1">
                    </p>
                    <p class="form-group">
                        <label for="eventAnsvarlig">Ansvarlig/kontaktperson: </label>
                        <input type="text" name="eventAnsvarlig" class="form-control">
                    </p>
                    <p class="form-group">
                        <label for="eventAnsvTlf">Telefonnummer ansvarlig/kontaktperson:</label>
                        <input type="text" name="eventAnsvTlf" class="form-control">
                    </p>

                    <input type="submit" value="Opret" name="eventSubmit" class="btn btn-primary">
                </form>

            </article>

        </section>
    </main>
    <?php
    print_r($imageErr);

    ?>
</body>
</html>