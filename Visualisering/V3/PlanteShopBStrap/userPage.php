<?php
include "include/db.php";

$disabled = "disabled";

if($_SERVER['REQUEST_METHOD'] == $_POST){
  /* Fetch user information
       Check if there is anything in the session variable on index newuser-username*/
       if(isset($_SESSION['userMail'])) 
       {      
           /* If set we save the information in a variable and use concatenation
              This way the info can be used easily later */
           $userMail = "'" . $_SESSION['userMail'] . "'";
           
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
  $delete_user = $_SESSION["userMail"];
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
      SET UFirstname= '{$_POST['userFirstname']}', ULastname= '{$_POST['userLastname']}', UAddress= '{$_POST['userAddress']}', UPostcode= '{$_POST['userPostcode']}', UCity= '{$_POST['userCity']}', UPhone= '{$_POST['userPhone']}'
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
    <meta name="description" content="We are here to provide everyone with a piece on nature - affordable and rare united">
    <title>Weirdplantgirl | My account </title>
</head>
<body>
  <?php
  include "include/nav.php";
  ?>
  <main class="container">
    <section>
      <article >
        <h2 class="mt-5 mb-5">User Profile</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="userMail">Email: </label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="email" name="userMail" class="form-control" value="<?php echo $userrow["UEmail"];?>" disabled>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="userFirstname">Firstname: </label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="userFirstname" class="form-control" <?php echo "value='{$userrow['UFirstname']}' {$disabled}"; ?>>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="userLastname">Lastname: </label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="userLastname" class="form-control" <?php echo "value='{$userrow['ULastname']}' {$disabled}"; ?>>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="userAddress">Address: </label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="userAddress" class="form-control" <?php echo "value='{$userrow['UAddress']}' {$disabled}"; ?>>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="userPostcode">Postalcode: </label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="userPostcode" class="form-control" <?php echo "value='{$userrow['UPostcode']}' {$disabled}"; ?>>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="userCity">By: </label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="userCity" class="form-control" <?php echo "value='{$userrow['UCity']}' {$disabled}"; ?>>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                        <label for="userPhone">Telephone number: </label>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="text" name="userPhone" class="form-control" <?php echo "value='{$userrow['UPhone']}' {$disabled}"; ?>>
                        </div>
                    </div>
                <?php
               
                  if($_SERVER["REQUEST_METHOD"] == "POST"){

                    if(isset($_POST["regret_userchanges"])){
                      echo "<input type='submit' name='modify_user' value='Edit user bruger' class='btn btn-primary'>";
                    }
                    elseif(isset($_POST["save_userchanges"])){
                      echo "<input type='submit' name='modify_user' value='Edit user' class='btn btn-primary'>";
                      echo $_updatemessage;

                    }
                    elseif(isset($_POST["modify_user"])){
                      echo "<input type='submit' name='save_userchanges' value='Accept changes' class='btn btn-primary'>
                      <input type='submit' name='regret_userchanges' value='Regret changes' class='btn btn-primary'>";
                    }
                  }
                  else{
                    echo "<input type='submit' name='modify_user' value='Edit user' class='btn btn-primary'>";
                  }
                ?>
                <input type="submit" name="delete_user" value="Delete user" class="btn btn-primary">
            </p>
        </form>
    </section>
      </article>
    
 
    </main>
    <?php
            include "include/JS.php";
            include "include/footer.php";

        ?>
</body>
</html>