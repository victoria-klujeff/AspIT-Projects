<?php
include "include/db.php";  

$disabled = "disabled";

 /* Fetch user information
       Check if there is anything in the session variable on index newuser-username*/
       if(isset($_SESSION['brugerMail'])) 
       {      
           /* If set we save the information in a variable and use concatenation
              This way the info can be used easily later */
           $userMail = "'" . $_SESSION['brugerMail'] . "'";
           
           /* Check if any errors happen while connecting to the db*/
           if($db->connect_error){
               /* If an error occurs, the connection is killed*/
               die("Connection to database failed:". $db->connect_error);
           }
            else{
               /* If no errors, we fetch all information from table new_user
                  with username matching the one in session
                  
                  The information in put in a result, which contains the result from the query on the db
                  We do this to check who is logged in and use this later */
               $result = $db->query("SELECT * FROM users WHERE UEmail = $userMail");
               /* If an error occurs we echo the error*/
               if($db->error){
                   echo $db->error;
               }
               else{
                   /* If not we take use the function fetch_assoc to take our info from result
                      and put it into an associative array */
                   $userrow = $result->fetch_assoc();  
               }
           }
       }

  /* Delete user*/ 
  /* Checks if the button has been clicked
   If true the user is deleted
   If false error is returned*/
  $delete_user = $_SESSION["brugerMail"];
  /* We check if which button has been set by checking which value lies in post */
 if($_SERVER["REQUEST_METHOD"] == "POST"){
  /* If the value in post is "delete_user" and if the query we delete the user in the database and sign out
     by deleting all values insession and then we redirect to index */
    if(isset($_POST["delete_user"])){
      $delete = "DELETE FROM users WHERE UEmail = '$delete_user'";
      if(MySQLi_query($db, $delete)){
          echo "The user has been deleted";
          session_unset();
          session_destroy();
          $_SESSION = array();
          header("index.php");
      }
      else{
        echo "ERROR could not delete user";
      } 
    }
    /*Update user changes
    Checks if the button is clicked
    If true the data is updated
    If false error message is printed */
    elseif(isset($_POST["save_userchanges"])){

      if($db->query(
      "UPDATE users
      SET UFirstname= '{$_POST['brugerFornavn']}', ULastname= '{$_POST['brugerEfternavn']}', UAddress= '{$_POST['brugerAdresse']}', UPostcode= '{$_POST['brugerPostnr']}', UCity= '{$_POST['brugerBy']}', UPhone= '{$_POST['brugerTlfnr']}'
      WHERE $userrow[UID] = UID")){
        $_updatemessage = "Your information has been succesfully updated";
      }
      else{
        $_updatemessage = "Something went wrong, please try again";
      }
    }
    
    /*Disable form fields*/
    if(isset($_POST["modify_user"])){
      $disabled = " ";
    }
 }

?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta name="description" content="Starup UIF arrangements kalender. Opret nye arrangementer - tilmeld dig arrangementer. Et godt sted at starte et aktivt og interessant fritidsliv.">
    <title>Starup UIF arrangementer - min konto</title>
</head>
<body>
  <?php
  include "include/nav.php";
  ?>
  <main class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <p class="form-group">
        <label for="brugerMail">Email: </label>
        <input type="email" name="brugerMail" class="form-control" value="<?php echo $userrow["UEmail"];?>" disabled>
        </p>
    
                 

                    <p class="form-group">
                        <label for="brugerPrivilegie">Privilegie:</label>
                        <input type="text" name="brugerPrivilegie" class="form-control" value="<?php echo $userrow["UPriviledge"];?>" disabled> <!-- Kun Administratorer kan redigere -->
                    </p>

                    <p class="form-group">
                        <label for="brugerFornavn">Fornavn: </label>
                        <input type="text" name="brugerFornavn" class="form-control" <?php echo "value='{$userrow['UFirstname']}' {$disabled}"; ?>>
                        <label for="brugerEfternavn">Efternavn: </label>
                        <input type="text" name="brugerEfternavn" class="form-control" <?php echo "value='{$userrow['ULastname']}' {$disabled}"; ?>>
                    </p>
            
                    <p class="form-group">
                        <label for="brugerAdresse">Adresse: </label>
                        <input type="text" name="brugerAdresse" class="form-control" <?php echo "value='{$userrow['UAddress']}' {$disabled}"; ?>>
                    </p>

                    <p class="form-group">
                        <label for="brugerPostnr">Postnummer: </label>
                        <input type="text" name="brugerPostnr" class="form-control" <?php echo "value='{$userrow['UPostcode']}' {$disabled}"; ?>>
                        <label for="brugerBy">By: </label>
                        <input type="text" name="brugerBy" class="form-control" <?php echo "value='{$userrow['UCity']}' {$disabled}"; ?>>
                    </p>

                    <p class="form-group">
                        <label for="brugerTlfnr">Telefonnummer: </label>
                        <input type="text" name="brugerTlfnr" class="form-control" <?php echo "value='{$userrow['UPhone']}' {$disabled}"; ?>>
                    </p>
  
                <?php
               
                  if($_SERVER["REQUEST_METHOD"] == "POST"){

                    if(isset($_POST["regret_userchanges"])){
                      echo "<input type='submit' name='modify_user' value='Ret bruger' class='btn btn-primary'>";
                    }
                    elseif(isset($_POST["save_userchanges"])){
                      echo "<input type='submit' name='modify_user' value='Ret bruger' class='btn btn-primary'>";
                      echo $_updatemessage;

                    }
                    elseif(isset($_POST["modify_user"])){
                      echo "<input type='submit' name='save_userchanges' value='Acceptér ændringer' class='btn btn-primary'>
                      <input type='submit' name='regret_userchanges' value='Fortryd ændringer' class='btn btn-primary'>";
                    }
                  }
                  else{
                    echo "<input type='submit' name='modify_user' value='Ret bruger' class='btn btn-primary'>";
                  }
                  // print_r($userrow);
                  // print_r($_POST);
                ?>
                <input type="submit" name="delete_user" value="Slet bruger" class="btn btn-primary">
            </p>
        </form>
    </main>

    
      
</body>
</html>