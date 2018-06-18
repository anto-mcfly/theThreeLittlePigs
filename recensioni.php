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

                $button = $_POST['recensisci'];
                $nome = $_POST["nome"];
                $cognome = $_POST["cognome"];
                $recensione = $_POST["recensione"];

                if($button == "recensisci")
                    $db->query("insert into recensione (nome, cognome, recensione)
                    values ('$nome', '$cognome', '$recensione')");
                
            
            ?>

            <!-- lascia una recensione -->

            <section>
                
                <h1>LASCIA UNA RECENSIONE</h1>

                <form action="recensioni.php" method="POST">
                    Nome: <input type="text" name="nome" placeholder="Mario">
                    Cognome: <input type="text" name="cognome" placeholder="Rossi">
                    Recensione(max 500): <input type="text"  id="recensione" name="recensione" placeholder="tutto bene... tutto bello...">
                    <input type="submit" name="recensisci" value="recensisci">
                </form>


            </section>

            <!-- RECENSIONI -->

            <section>
                
                <h1>Recensioni passate</h1>

                <?php

                        $query = $db->query("SELECT * FROM recensione");

                        while($row = $query->fetch_object())
                            echo "<p> <strong>$row->nome $row->cognome</strong> <br> $row->recensione</p>"

                ?>

            </section>

        </body>

        <footer>
            <?php include("portions\pooter.htm");?>
        </footer>

    </div>    
    
</body>
</html>