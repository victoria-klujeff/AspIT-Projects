<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$servername = "localhost";
$usernamedb = "victoria";
$passworddb = "victoria";
$namedb = "starupuif";

$db = new MySQLi($servername, $usernamedb, $passworddb, $namedb);   

 if($db->connect_error) 
 {
     die("Connection to database failed: ". $db->connect_error);
 }
    function test_input($data) {
        $data = trim($data);                // Strips data of unnecessary characters (newline, tab, extra spaces)
        $data = stripslashes($data);        // Strips data of backslashes
        $data = htmlspecialchars($data);    // Changes HTML-characters to HTML encoded entities (&lt; < &gt; >)
        return $data;
    }
   
   
    // Test if typed in passwords match
    function testpwmatch ($pw1, $pw2)
    {

        if ($pw1 == $pw2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    $namePattern = '/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u';
    $phonePattern = '/^[0-9]$/';
    $passwordPattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/';
    $userErr = $pwErr = $repeatPwErr = $emailErr = $fnameErr =  $lnameErr = $phoneErr = "";     // Variables to contain error-messages;

    /* Variables where we put our SESSION in */
    $UserMail = "";
    $UserFName = "";
    $UserLName = "";
    $UserAdd = "";
    $UserPost = "";
    $UserCity = "";
    $UserCountry = "";
    $UserPhone = "";

    // Has user pressed submit button?
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Did user type an email?
        if (empty($_POST["userMail"])) 
        {
            $emailErr = "Email is required";
        } 
        else 
        {
            // Is the email a valid email format?
            if (!filter_var($_POST["userMail"], FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "Please enter a valid email";
            }
            else
            {
                    // Transfer email to SESSION variable
                $_SESSION["userMail"] = test_input($_POST["userMail"]);
                $UserMail = $_SESSION["userMail"];

            }
                
        } 
        // Did user type a password?
        if (empty($_POST["userPassword"])) {
            $pwErr = "Password is required";
        }
        else
        {
            if(!preg_match($passwordPattern ,$_POST["userPassword"]))
            {
                $pwErr = "Password does not reach the requirements";
            }
            // Transfer password to SESSION variable
            $_SESSION["userPassword"] = test_input($_POST["userPassword"]);   
        }

        // Did user type the repeat password?
        if (empty($_POST["userRepeatPassword"])) 
        {
            $repeatPwErr = "Please repeat password";
        } 
        else
        {
            // Do the two passwords match?
            if (testpwmatch($_POST["userPassword"], $_POST["userRepeatPassword"]))
            {
                // Transfer repeated password to SESSION variable (is this even necessary?)
                $_SESSION["userRepeatPassword"] = test_input($_POST["userRepeatPassword"]);
            }

            else
            {
                $repeatPwErr = "The password does not match";
            }
        }

        if(empty($_POST["userFirstname"])){
            $fnameErr = "Firstname is required";
        }
        else{
            if(strlen($_POST['userFirstname']) > 1){
                if(!preg_match($namePattern ,$_POST["userFirstname"])){
                    $fnameErr = "Invalid firstname";
                }
                else{
                    $_SESSION["userFirstname"] = test_input($_POST["userFirstname"]);
                    $UserFName = $_SESSION["userFirstname"];
                }    
            }
            else{
                $fnameErr = "Invalid firstname";
            }
           
        }

        if(empty($_POST["userLastname"])){
            $fnameErr = "Lastname is required";
        }
        else{
            if(strlen($_POST['userLastname']) > 1){
                if(!preg_match($namePattern ,$_POST["userLastname"])){
                    $fnameErr = "Invalid lastname";
                }
                else{
                    $_SESSION["userLastname"] = test_input($_POST["userLastname"]);
                    $UserLName = $_SESSION["userLastname"];
                }    
            }
            else{
                $fnameErr = "Invalid lastname";
            }    
        }
        
        if(empty($_POST['userPhone'])){
            $_SESSION["userPhone"] = "";
        }
        else{
            if(strlen($_POST['userPhone']) != 8){
                $phoneErr = "Invalid phone number";
            }
            else{
                if(!preg_match($phonePattern, $_POST['userPhone'])){
                    $phoneErr = "Invalid phone number";
                }
                else{
                    $_SESSION["userPhone"] = test_input($_POST["userPhone"]);
                    $UserPhone = $_SESSION["userPhone"];
                }
            }
        }
        
        if(!empty($_POST['userCity'])){
            $_SESSION["userCity"] = test_input($_POST["userCity"]);
            $UserCity = $_SESSION["userCity"];
        }

        if(!empty($_POST['userAddress'])){            
            $_SESSION["userAddress"] = test_input($_POST["userAddress"]);
            $UserAdd = $_SESSION["userAddress"];
        }

        if(!empty($_POST['userCountry'])){
            $_SESSION["userCountry"] = test_input($_POST["userCountry"]);
            $UserCountry = $_SESSION["userCountry"];

        }
       

        if(!empty($_POST['userPostcode'])){
            $_SESSION["userPostcode"] = test_input($_POST["userPostcode"]);
            $UserPost = $_SESSION["userPostcode"];
        }
        

        // Check if username, password, passwordrepeat and email are not empty and check if the passwords match - then we can start the insert-procedure into the database
        if (!empty($_POST["userPassword"]) && !empty($_POST["userRepeatPassword"]) && !empty($_POST["userMail"]) && testpwmatch($_POST["userPassword"], $_POST["userRepeatPassword"]))
        {
            // Put apostrophes around username so it can be used in SELECT statement
            $userMail = "'" . $_POST["userMail"] . "'";
            // Check if there is already a user in database with the same username
            $result = $db->query("SELECT * FROM users WHERE UEmail = $userMail");

            if ($db->error) // Did SQL query return an error?
            {
                echo $db->error;
            }
            // If SQL query returns no rows this username is not in the database and new user can be inserted into database
            elseif ($result->num_rows == 0)
            { 
                if($db->query("INSERT INTO users (UEmail, UPassword, UFirstname, ULastname, UAddress, UPostCode, UCity, UPhone, UPriviledge)
                VALUE ('{$_POST['userMail']}', '{$_POST['userPassword']}', '{$_POST['userFirstname']}', '{$_POST['userLastname']}', '{$_POST['userAddress']}',
                       '{$_POST['userPostcode']}', '{$_POST['userCity']}', '{$_POST['userPhone']}', 'User')"))
                {
                    // Redirect to landing page for new users
                    header("Location: logIn.php");
                }
                else
                {
                    echo "Something went wrong when creating the user, please try again";
                }
            }
            else
            {
                // Username already exists in database - redirect to error-message and login form
                header("Location: signIn.php");
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
    <title>Starup UIF arrangementer - opret bruger</title>
</head>
<body>
<?php include "include/nav.php"; ?>
<main class="container mainNewUser">
    <section>
    <h1>Opret bruger</h1>

        <article>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                   
                   <p class="form-group">
                    <label for="userMail">Email: </label>
                    <input type="email" name="userMail" class="form-control" autocomplete="off" value="<?php echo $UserMail;?>">
                    <span class="error">* <?php echo $emailErr;?></span>
                    </p>
    
                    <p class="form-group">
                        <label for="userPassword">Password:</label>
                        <input type="password" name="userPassword" class="form-control">
                        <span class="error">* <?php echo $pwErr;?></span>
                        <label for="userRepeatPassword">Repeat password:</label>
                        <input type="password" name="userRepeatPassword" class="form-control">
                        <span class="error">* <?php echo $repeatPwErr;?></span>
                    </p>

                    <p class="form-group">
                        <label for="userFirstname">Firstname: </label>
                        <input type="text" name="userFirstname" class="form-control" value="<?php echo $UserFName;?>">
                        <span class="error">* <?php echo $fnameErr;?></span>
                        <label for="userLastname">Lastname: </label>
                        <input type="text" name="userLastname" class="form-control" value="<?php echo $UserLName;?>">
                        <span class="error">* <?php echo $lnameErr;?></span>
                    </p>
            
                    <p class="form-group">
                        <label for="userAddress">Address: </label>
                        <input type="text" name="userAddress" class="form-control" value="<?php echo $UserAdd;?>">
                    </p>

                    <p class="form-group">
                        <label for="userPostcode">Postcode: </label>
                        <input type="text" name="userPostcode" class="form-control" value="<?php echo $UserPost;?>">
                        <label for="userCity">City: </label>
                        <input type="text" name="userCity" class="form-control" value="<?php echo $UserCity;?>">
                        <label for="userCountry">Country: </label>
                        <input type="text" name="userCountry" class="form-control" value="<?php echo $UserCountry;?>">
                    </p>

                    <p class="form-group">
                        <label for="userPhone">Phone number: </label>
                        <input type="text" name="userPhone" class="form-control" value="<?php echo $UserPhone;?>">
                        <span class="error">* <?php echo $phoneErr;?></span>
                    </p>
            </p>                    
            <input type="submit" value="Create user" name="createUserSubmit" class="btn btn-primary">
        </form>
        </article>
    
    </section>
 
    </main>
    <?php
            include "include/JS.php";

        ?>
</body>
</html>