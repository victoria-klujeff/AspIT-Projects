<?php
    include "include/db.php";
   
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

      $_SESSION["userMail"] = test_input($_POST["userMail"]);
      $_SESSION["userPassword"] = test_input($_POST["userPassword"]); 

    /* If set we save the information in a variable and use concatenation
      This way the info can be used easily later */
      if(isset($_SESSION['userMail'])){
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
            
         /* We put our database result in an array */
            $row = $result->fetch_assoc(); 
         /* We test if a username has been entered, by checking if there is anything in our post variable on newuser-username */
          if(empty($_POST["userMail"])){
          /* If true nothing has been entered and a error message is put in the variable $usernameErr */
            $usernameErr = "Please enter the mail you used when creating a user!";
          }
          else{
            if($row["UEmail"] != $_POST["userMail"]){
                $usernameErr = "There is no user with this email";
                $showusername = "Please enter email";
            }
            else{
                $showusername = $row["UEmail"];
            }

           /* If else a username has been submitted and we test if a password has been entered */
            if(empty($_POST["userPassword"])){
            /* If no password has been entered an error message is put the variable $passwordErr */
              $passwordErr = "No password has been entered!";
            }
            else{
              /* If the password matches the user is signed in */
              if($row["UPassword"] == $_POST["userPassword"]){
                $_SESSION["signIn"] = $_POST["signIn"];
                header("Location: index.php");
              }
              else{
                $passwordErr = "The password is incorrect";
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
    <meta name="description" content="We are here to provide everyone with a piece on nature - affordable and rare united">
    <title>Weirdplantgirl | Sign in</title>
</head>
<body>
<?php
        include "include/nav.php";
    ?>
<main class="container mainSignIn">
    
    <section class="sectionMargin">
        <article>
          <h1 class="mt-5">Sign in</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <p class="form-group" >
                    <label for="userMail">Email: </label>
                    <input type="text" name="userMail" class="form-control" value="<?php echo $showusername;?>">
                    <span class="error"><?php echo $usernameErr;?></span>
                </p>
                <p class="form-group" >
                    <label for="userPassword">Password:</label>
                    <input type="password" id="myInput" name="userPassword" class="form-control">
                    <span class="error"><?php echo $passwordErr;?></span> 
                </p>
                <p class="form-check">
                <input name="showPassword"  type="checkbox" class="form-check-input" onclick="myFunction()"></input>
                <label for="showPassword">Show Password</label>
                </p>
        
                <input type="submit" name="signIn" value="Sign in" class="btn btn-primary">
            </form>
        </article>
    </section>
</main>
<?php
  include "include/JS.php";
  include "include/footer.php";
?>
</body>
</html>