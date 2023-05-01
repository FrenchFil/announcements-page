<html>
    <head>
	    <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>

        <header>
            <div> 
                <a href="logout.php"> <button type="button" class="menu">Wyloguj <?php echo $_SESSION['user']['username']?></button></a>
                <a href='index.php?action=addForm'> <button type="button" class="menu">Dodaj</button></a>
                <a href="index.php?action=getForm"> <button type="button" class="menu">Wyswietl</button></a>
            </div>
        </header>
           
            <?php if (array_key_exists("null",$errors)):?>
                <div class="regiPanel">
                    <img src="picture.jpeg">
                    <label><?php echo $content?></label>
                </div>
                <?php endif; ?>

            <?php if (array_key_exists("find",$errors)):?>
                <div>
                <label class="error"> Brak pliku graficznego. <a href='index.php?action=addForm'> Dodaj plik.</a>
                </div>
                <?php endif; ?>

    </body>
</html>