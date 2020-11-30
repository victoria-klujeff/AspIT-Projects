<?php
    // /* Save form attribute */
    // $disabled = "disabled";
   
    /* Fetch user information
       Check if there is anything in the session variable on index newuser-username*/
    if(isset($_SESSION['userMail'])) 
    {      
        /* If set we save the information in a variable and use concatenation
           This way the info can be used easily later */
        $usermail = "'" . $_SESSION['userMail'] . "'";
        
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
            $result = $db->query("SELECT * FROM users WHERE UEmail = $usermail");
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
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-dark container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ">
            <li class="nav-item"><a href="index.php" class="nav-link text-uppercase">Home</a></li> 
            <li class="nav-item"><a href="shop.php?cat=alle" class="nav-link text-uppercase">Shop</a></li>
            
            <?php
                /* We check if there is anything in our session variable on index signIn 
                   If set we echo the nav-item My account
                   If not set we echo the nav item New user*/
                if(isset($_SESSION["signIn"])){
                    echo '<li class="nav-item"><a href="userPage.php" class="nav-link text-uppercase">My account</a></li>';
                    echo '<li class="nav-item"><a href="signOut.php" class="nav-link text-uppercase">Sign out</a></li>';
                    if($userrow['UPriviledge'] == 'Administrator'){
                        echo '<li class="nav-item"><a href="newProduct.php" class="nav-link text-uppercase">New product</a></li>';
                        echo '<li class="nav-item"><a href="editProduct.php" class="nav-link text-uppercase">Edit product</a></li>';
                        echo '<li class="nav-item"><a href="editPriviledge.php" class="nav-link text-uppercase">Edit privilege</a></li>';
                    }
                }
                else{
                    echo '<li class="nav-item"><a href="newUser.php" class="nav-link text-uppercase">New user</a></li>';
                    echo '<li class="nav-item"><a href="signIn.php" class="nav-link text-uppercase">Sign in</a></li>';
                }
            ?>
            <li class="nav-item"><a href="#" class="nav-link text-uppercase">About</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-uppercase">Contact</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-uppercase">Basket</a></li>

        </ul>
    </div>
</nav>
   