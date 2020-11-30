<?php
/* We check if session is not set, if true we set session */
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
/* Create connection to database
   Database info in variables, makes it easier if changes are necessary*/

   $servername = "localhost";
   $usernamedb = "victoria";
   $passworddb = "victoria";
   $namedb = "starupuif";
   $row = "";

   $db = new MySQLi($servername, $usernamedb, $passworddb, $namedb);  
   
  /* To avoid abuse of user input we use htmlspecialchars which converts special characters to html entities
     When the user submits the form we also use the following function to strip the input from unnecessary characters with php trim
     And remove backslashes
   */
   function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    } 

  /*define variables and set to empty values*/
  $usernameErr = $passwordErr = $showusername = "";

  /* Fetch user information
       Check if there is anything in the session variable on index newuser-username*/
  if($_SERVER["REQUEST_METHOD"] == "POST"){

      $_SESSION["brugerMail"] = test_input($_POST["brugerMail"]);
      $_SESSION["brugerPassword"] = test_input($_POST["brugerPassword"]); 

    /* If set we save the information in a variable and use concatenation
      This way the info can be used easily later */
      if(isset($_SESSION['brugerMail'])){
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
            
         /* We put our database result in an array */
            $row = $result->fetch_assoc(); 
         /* We test if a username has been entered, by checking if there is anything in our post variable on newuser-username */
          if(empty($_POST["brugerMail"])){
          /* If true nothing has been entered and a error message is put in the variable $usernameErr */
            $usernameErr = "Brugernavn er påkrævet,  brug den mail du oprettede din bruger med!";
          }
          else{
            if($row["UEmail"] != $_POST["brugerMail"]){
                $usernameErr = "Ingen bruger tilknyttet denne email adresse";
                $showusername = "";
            }
            else{
                $showusername = $row["UEmail"];
            }

           /* If else a username has been submitted and we test if a password has been entered */
            if(empty($_POST["brugerPassword"])){
            /* If no password has been entered an error message is put the variable $passwordErr */
              $passwordErr = "Password skal indtastes!";
            }
            else{
              /* If the password matches the user is signed in */
              if($row["UPassword"] == $_POST["brugerPassword"]){
                $_SESSION["loginSubmit"] = $_POST["loginSubmit"];
                header("Location: index.php");
              }
              else{
                $passwordErr = "Passwordet eksisterer ikke";
              }
            }
          }
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
    <title>Starup UIF arrangementer - login</title>
</head>
<body>
<?php
        include "include/nav.php";
    ?>
<main class="container">
    <h1>Login</h1>
    <section>
        <article>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <p class="form-group" >
                    <label for="brugerMail">Email: </label>
                    <input type="text" name="brugerMail" class="form-control" value="<?php echo $showusername;?>">
                    <span class="error"><?php echo $usernameErr;?></span>
                </p>
                <p class="form-group" >
                    <label for="brugerPassword">Adgangskode:</label>
                    <input type="password" id="myInput" name="brugerPassword" class="form-control">
                    <span class="error"><?php echo $passwordErr;?></span> 
                </p>
                <p class="form-check">
                <input name="showPassword"  type="checkbox" class="form-check-input" onclick="myFunction()"></input>
                <label for="showPassword">Vis Password</label>
                </p>
        
                <input type="submit" name="loginSubmit" value="Log ind" class="btn btn-primary">
            </form>
        </article>
    </section>
</main>
<?php
  include "include/JS.php"
?>
</body>
</html>