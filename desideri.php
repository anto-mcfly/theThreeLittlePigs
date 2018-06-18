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

                include("dati.php");

                include("portions\menu.htm");

                $button = $_POST['desidera'];
                $nome = $_POST["nome"];
                $cognome = $_POST["cognome"];
                $desiderio = $_POST["desiderio"];

                if($button == "desidera")
                    $db->query("insert into desideri (nome, cognome, desiderio)
                    values ('$nome', '$cognome', '$desiderio')");


            ?>

            <!-- lascia una desiderio -->

            <section>

                <h1>Cosa desideri per domani?</h1>

                <form action="desideri.php" method="POST">
                    Nome: <input type="text" name="nome" placeholder="Mario">
                    Cognome: <input type="text" name="cognome" placeholder="Rossi">
                    Recensione(max 500): <input type="text"  id="desiderio" name="desiderio" placeholder="tutto bene... tutto bello...">
                    <input type="submit" name="desidera" value="desidera">
                </form>

            </section>

            <!-- Desideri -->

            <section>

                <h1>Desideri espressi</h1>

                <?php

                        $query = $db->query("SELECT * FROM desideri");

                        while($row = $query->fetch_object())
                            echo "<p> <strong>$row->nome $row->cognome</strong> <br> $row->desiderio</p>"

                ?>

            </section>

        </body>

        <footer>
            <?php include("portions\pooter.htm");?>
        </footer>

    </div>    
    
</body>
</html>