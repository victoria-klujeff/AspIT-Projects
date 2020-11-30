<?php
    include "include/db.php";

    if(!isset($_GET['cat']))
    {
        header('location: index.php?cat=alle');
    }
    $today = date("Y-m-d");
    $rowCount = 5;

    $category = $_GET['cat'];

    if($db->connect_error)
    {
        echo $db->connect_error;
    }
    else
    {
        if($category == "alle")
        {
            $result = $db->query("SELECT * FROM events WHERE EDate > '$today' ORDER BY EDate, EStartTime ASC");
        }
        else
        {
            $result = $db->query("SELECT * FROM events WHERE EDate > '$today' && ECategory = '$category' ORDER BY EDate, EStartTime ASC");
        }

        if($db->error)
        {
            echo $db->error;
        }
        else
        {
            if($result->num_rows > 0)
            {
                while($rows = $result->fetch_assoc())
                {
                    $eventrows[] = $rows;
                }
            }
            else
            {
                $eventrows[0]['EID'] = "";
            }

            if(count($eventrows) < 5)
            {
                $rowCount = count($eventrows);
            }

            if(isset($_GET['show']))
            {
                if($_GET['show'] == "all")
                {
                    $rowCount = count($eventrows);
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta name="description" content="Starup UIF arrangements kalender. Opret nye arrangementer - tilmeld dig arrangementer. Et godt sted at starte et aktivt og interessant fritidsliv.">
    <title>Starup UIF arrangementer</title>
</head>
<body>
    <?php include "include/nav.php"; ?>

    <main class="container mb-5">
        
        <h1 class="mb-5">Kommende arrangementer i Starup UIF</h1>

        <section>

            <div class="dropdown">
                <a href="#" class="btn btn-primary dropdown-toggle" role="button" data-toggle="dropdown" data-flip="false">Vælg kategori</a>
                <div class="dropdown-menu" aria-labelledby="categoryChooser">
                    <a class="dropdown-item" href="index.php?cat=alle">Alle</a>
                    <a class="dropdown-item" href="index.php?cat=musik">Musik</a>
                    <a class="dropdown-item" href="index.php?cat=foredrag">Foredrag</a>
                    <a class="dropdown-item" href="index.php?cat=sport">Sport/idræt</a>
                    <a class="dropdown-item" href="index.php?cat=natur">Natur</a>
                    <a class="dropdown-item" href="index.php?cat=mad">Madlavning</a>
                    <a class="dropdown-item" href="index.php?cat=andet">Andet</a>
                </div>
            </div>

            <article class="showEvents mt-5">

                <?php
                    if($eventrows[0]['EID'] == "")
                    {
                        echo "<p>Der er desværre ingen kommende arrangementer i denne kategori.</p>";
                    }
                    else
                    {
                        for($i = 0; $i < $rowCount; $i++)
                        {
                            $eventDate = date("d-m-Y", strtotime($eventrows[$i]['EDate']));
                            $EShortDesc = substr($eventrows[$i]['EDescription'], 0, 200);
                            if(strlen($eventrows[$i]['EDescription']) > 200)
                            {
                                $EShortDesc = $EShortDesc . "...";
                            }
                            echo "
                                <div class='card mb-5'>
                                    <div class='row'>
                                        <div class='col-md-6 col-xs-12'>
                                            <img src='img/{$eventrows[$i]['EImage']}' class='card-img'>
                                        </div>
                                        <div class='col-md-6 col-xs-12'>
                                            <div class='card-body'>
                                                <h4 class='card-title'>
                                                    {$eventrows[$i]['EName']}
                                                </h4>
                                                <p class='card-subtitle mt-3'>
                                                    Kategori: {$eventrows[$i]['ECategory']}
                                                </p>
                                                <p class='card-text mt-3'>
                                                    $EShortDesc
                                                </p>
                                                <p class='card-text mt-3'>
                                                    Dato: $eventDate
                                                </p>
                                                <a class='btn btn-primary' href='visArrangement.php?id={$eventrows[$i]['EID']}'>Læs mere</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    }

                    if(!isset($_GET['show']))
                    {
                        if(count($eventrows) > 5)
                        {
                            echo "<a href='index.php?cat=$category&show=all' class='btn btn-primary'>Vis alle arrangementer</a>";
                        }
                    }
                    else
                    {
                        echo "<a href='index.php?cat=$category' class='btn btn-primary'>Vis færre arrangementer</a>";
                        $rowCount = 5;
                    }
                ?>
            </article>
        </section>
    </main>

    <?php
    include "include/JS.php";
    ?>
</body>
</html>