<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>The Three Little Pigs</title>
</head>
<body>

    <div>

        <header>
            <picture>
                <source media="(max-width: 476px)" srcset="img\logo\text.png">
                <source media="(max-width: 662px)" srcset="img\logo\sLogo.png">
                <img src="img\logo\logo.png" alt="the three little pigs">
            </picture>
        </header>

        <body>

            <?php 
                
                include("portions/menu.htm");

                include("dati.php");

                $menu = $_GET["selection"];

                if( empty($menu) == 0){

                    echo " <section> <h1>Menu' di ieri</h1> ";

                    $query = $db->query("SELECT * FROM menu WHERE id=2");

                    while($row = $query->fetch_object())
                        echo "<p> 
                                <strong>Antipasto</strong> <br> $row->antipasto <br>
                                <strong>Primo</strong> <br> $row->primo <br>
                                <strong>Secondo</strong> <br> $row->secondo <br>
                                <strong>Dolce</strong> <br> $row->dolce
                            </p>";

                    echo "</section>";

                }
                else{

                    echo " <section> <h1>Menu' del giorno</h1> ";

                    $query = $db->query("SELECT * FROM menu WHERE id=1");

                    while($row = $query->fetch_object())
                        echo "<p> 
                                <strong>Antipasto</strong> <br> $row->antipasto <br>
                                <strong>Primo</strong> <br> $row->primo <br>
                                <strong>Secondo</strong> <br> $row->secondo <br>
                                <strong>Dolce</strong> <br> $row->dolce
                            </p>";

                    echo "</section>";

                }

            ?>

        </body>

        <footer>
            <?php include("portions/pooter.htm");?>
        </footer>

    </div>    
    
</body>
</html>