<?php
    include "include/db.php";
    $UpdateMsg = ""; // Empty variable to hold our update message
    
    /* Connect to data base
        if fail we send a error so as it doesnt try to unsuccesfully put data into the db as this will be lost
        if succesfull we check if server request method is post 
        if true we update the user. We the identity of the user by updating on the matching email  */
    if($db->connect_error)
    {
        echo $db->connect_error;
    }
    else
    {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if(isset($_POST['admAccEditUser']))
            {
                if($db->query("UPDATE users SET UFirstname = '{$_POST['userFirstname']}', ULastname = '{$_POST['userLastname']}',UAddress = '{$_POST['userAddress']}', UPostcode = '{$_POST['userPostcode']}', UCity = '{$_POST['userCity']}', UPhone = '{$_POST['userPhone']}', UPriviledge = '{$_POST['userPriviledge']}' WHERE  UEmail = '{$_POST['userMail']}'"))
                {
                    $UpdateMsg = "The user has been succesfully updated";
                    $currUserMail = $_POST['userMail'];
                    $currUserFName = $_POST['userFirstname'];
                    $currUserLName = $_POST['userLastname'];
                    $currUserAdd = $_POST['userAddress'];
                    $currUserPost = $_POST['userPostcode'];
                    $currUserCity = $_POST['userCiy'];
                    $currUserCountry = $_POST['UCountry'];
                    $currUserPhone = $_POST['userPhone'];
                    /*We control our user privilegde by giving a select by checking our post(select is the dropdown item that will be shown) */
                    if($_POST['userPriviledge'] == "User")
                    {
                        $bruger = "selected";
                        $moderator = "";
                        $administrator = "";
                    }
                    elseif($_POST['userPriviledge'] == "Moderator")
                    {
                        $bruger = "";
                        $moderator = "selected";
                        $administrator = "";
                    }
                    elseif($_POST['userPriviledge'] == "Administrator")
                    {
                        $bruger = "";
                        $moderator = "";
                        $administrator = "selected";
                    }
                }
                else
                {
                    $UpdateMsg = "The user was not updated!";
                }
            }
        }
        /* We fetch all users from users table into a associative array called allUsers */
        $result = $db->query("SELECT * FROM users");

        if($db->error)
        {
            echo $db->error;
        }
        else
        {
            while($userRow = $result->fetch_assoc())
            {
                $allUsers[] = $userRow;
            }
        }
    }

    /* if post chooseUserSubmit is not set we show the first user in the array and check which priviledge is set. */
    if(!isset($_POST['chooseUserSubmit']))
    {
        
        $currUserMail = $allUsers[0]['UEmail'];
        $currUserFName = $allUsers[0]['UFirstname'];
        $currUserLName = $allUsers[0]['ULastname'];
        $currUserID = $allUsers[0]['UID'];
        $currUserAdd = $allUsers[0]['UAddress'];
        $currUserPost = $allUsers[0]['UPostcode'];
        $currUserCity = $allUsers[0]['UCity'];
        $currUserCountry = $allUsers[0]['UCountry'];
        $currUserPhone = $allUsers[0]['UPhone'];
        if($allUsers[0]['UPriviledge'] == "User")
        {
            $bruger = "selected";
            $moderator = "";
            $administrator = "";
        }
        elseif($allUsers[0]['UPriviledge'] == "Moderator")
        {
            $bruger = "";
            $moderator = "selected";
            $administrator = "";
        }
        elseif($allUsers[0]['UPriviledge'] == "Administrator")
        {
            $bruger = "";
            $moderator = "";
            $administrator = "selected";
        }
    }

    // print_r($allUsers);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta name="description" content="We are here to provide everyone with a piece on nature - affordable and rare united">
    <title>Weirdplantgirl | Edit Privilege</title>
</head>
<body>

    <?php include "include/nav.php"; ?>
    <main class="container ">
        <section >
            <h1 class="mt-5 mb-5">Edit Privilege</h1>

            <article>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-row align-items-end">
                    <div class="form-group col-md-3">
                            <label for="chooseUser">Users: </label>
                        </div>
                        <div class="form-group col-md-3">
                            <select name="chooseUser" class="form-control">
                                <?php
                                    // Make select field(dropdown) where all users from the table users are put, then the admin can choose which they want to change
                                    foreach($allUsers as $user)
                                    {
                                        if($_SERVER['REQUEST_METHOD'] == "POST")
                                        {
                                            // $selectedUser = $_POST['vaelgBruger'];

                                            if($user['UEmail'] == $_POST['chooseUser'])
                                            {
                                                echo "<option value='{$user['UEmail']}' selected>{$user['UEmail']} | {$user['UFirstname']} {$user['ULastname']}</option>";
                                                $currUserMail = $user['UEmail'];
                                                $currUserFName = $user['UFirstname'];
                                                $currUserLName = $user['ULastname'];
                                                $currUserID = $user['UID'];
                                                $currUserAdd = $user['UAddress'];
                                                $currUserPost = $user['UPostcode'];
                                                $currUserCity = $user['UCity'];
                                                $currUserCountry = $user['UCountry'];
                                                $currUserPhone = $user['UPhone'];
                                                if($user['UPriviledge'] == "User")
                                                {
                                                    $bruger = "selected";
                                                    $moderator = "";
                                                    $administrator = "";
                                                }
                                                elseif($user['UPriviledge'] == "Moderator")
                                                {
                                                    $bruger = "";
                                                    $moderator = "selected";
                                                    $administrator = "";
                                                }
                                                elseif($user['UPriviledge'] == "Administrator")
                                                {
                                                    $bruger = "";
                                                    $moderator = "";
                                                    $administrator = "selected";
                                                }

                                            }
                                            else
                                            {
                                                echo "<option value='{$user['UEmail']}'>{$user['UEmail']} | {$user['UFirstname']} {$user['ULastname']}</option>";

                                            }
                                        }
                                        else
                                        {
                                            echo "<option value='{$user['UEmail']}'>{$user['UEmail']} | {$user['UFirstname']} {$user['ULastname']}</option>";

                                        }
                                        
                                    }
                                ?>                        
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" name="chooseUserSubmit" value="Choose" class="btn btn-primary">
                        </div>
                    </div>
                    
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="userMail">Email: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="email" name="userMail" value="<?php echo $currUserMail; ?>" class=" form-control form-control-plaintext" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row align-items-end">
                         <div class="form-group col-md-3">
                            <label for="userPriviledge">Privilege:</label>
                        </div>
                        <div class="form-group col-md-4">
                            <select name="userPriviledge" class="form-control">
                                <option value="Administrator" <?php echo $administrator; ?>>Administrator</option>
                                <option value="Moderator" <?php echo $moderator; ?>>Moderator</option>
                                <option value="User" <?php echo $bruger; ?>>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="userFirstname">Firstname: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="userFirstname" value="<?php echo $currUserFName; ?>"  class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="userLastname">Lastname: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="userLastname" value="<?php echo $currUserLName; ?>"  class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="UserAddress">Address: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="userAddress" value="<?php echo $currUserAdd; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="userPostcode">Postcode: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="userPostcode" value="<?php echo $currUserPost; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="userCity">City: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="userCity" value="<?php echo $currUserCity; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-3">
                            <label for="userPhone">Phone number: </label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="userPhone" value="<?php echo $currUserPhone; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-2">
                            <input type="submit" value="Accept Changes" name="admAccEditUser" class="btn btn-primary">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="submit" value="Regret Changes" name="admRegEditUser" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-6">
                            <?php echo $UpdateMsg; ?>
                        </div>
                    </div>
                </form>
            </article>
        </section>
    </main>
    <?php
        include "include/JS.php";
    ?>
</body>
</html>