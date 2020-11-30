<?php
include "db.php";
/* Create connection to datatbase
   Database info in variables, makes it easier if changes are neccesary*/

    // $servername = "localhost";
    // $usernamedb = "victoria";
    // $passworddb = "victoria";
    // $namedb = "starupuif";

    // $db = new MySQLi($servername, $usernamedb, $passworddb, $namedb);
    
   
    /* Fetch user information
       Check if there is anything in the session variable on index newuser-username*/
    if(isset($_SESSION['brugerMail'])) 
    {      
        $_SESSION += $_POST;
        /* If set we save the information in a variable and use concatenation
           This way the info can be used easily later */
        $userEmail = "'" . $_SESSION['brugerMail'] . "'";
        
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
            $result = $db->query("SELECT * FROM users WHERE UEmail = $userEmail");
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
    ?>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-dark">
    <a href="index.php" class="navbar-brand">
    <img class="d-inline-block align-top" width="30" height="30" src="img/LOGO-Starupuif.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="navbar-item"><a href="index.php" class="nav-link text-uppercase">Forside</a></li>
            <?php
                /* We check if there is anything in our session variable on index signIn 
                   If set we echo the nav-item Min konto and log ud
                   If not set we echo the nav item New user*/
                if(isset($_SESSION["loginSubmit"])){
                    echo '<li class="navbar-item"><a href="logud.php" class="nav-link text-uppercase">Log ud</a></li>
                          <li class="navbar-item"><a href="visBruger.php" class="nav-link text-uppercase">Min konto</a></li>'; 
                    /* If $userrow['UPriviledge'] contains either administrator or moderator we echo nav item Opret arrangement  */
                    if($userrow['UPriviledge'] == 'Administrator'){
                        echo '<li class="navbar-item"><a href="opretArrangement.php" class="nav-link text-uppercase">Opret arrangement</a></li>'; 
                    }
                    /* if $userrow['UPriviledge'] contains moderator we echo Ret brugerprivilegie */
                    if($userrow['UPriviledge'] == 'Moderator'){
                        echo '<li class="navbar-item"><a href="opretArrangement.php" class="nav-link text-uppercase">Opret arrangement</a></li>
                        <li class="navbar-item"><a href="retPrivilegie.php" class="nav-link text-uppercase">Ret brugerprivilegie</a></li>'; 
                    }
                }
                else{
                    echo '<li class="navbar-item"><a href="login.php" class="nav-link text-uppercase">Log ind</a></li>';
                    echo '<li class="navbar-item"><a href="opretBruger.php" class="nav-link text-uppercase">Opret bruger</a></li>';
                }

            ?>
        </ul>
    </div>
</nav>
   