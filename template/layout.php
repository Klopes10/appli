<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?=CSS_DIR?>style.css">
        <title>Boutique</title>
    </head>
    <body>
        <div id= "wrapper">
        <header>
            <?php 

                include "menu.php";
                
            ?>  
        </header>
        <main>
            <?php 

                include "messages.php"; 

            ?> 
            
            <?= $page ?>
        </main>
        <footer> 
            <p>
                &copy; 2020 - Kéké corp
            </p>
        </footer>
        </div>
    </body>
</html>
