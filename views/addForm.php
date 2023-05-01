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
        <br/>
            <div class="regiPanel">
                <form action="index.php?action=addForm" method="POST"enctype="multipart/form-data">
                    <label>Opis zalacznika graficznego:</label>
                    <input type="text" name="description" value="" /><br/>
                    <input type="file" name="plik" accept="image/jpeg" /><br/>
                    <input type="submit" value="Wyslij" />
                </form>

                <div>
                    <?php if (array_key_exists("size",$errors)):?>
                    <label class="error"><?php echo $errors['size'] ?></label><?php endif; ?>

                    <?php if (array_key_exists("dest",$errors)):?>
                    <label class="error"><?php echo $errors['dest'] ?></label><?php endif; ?>

                    <?php if (array_key_exists("all",$errors)):?>
                    <label class="error"><?php echo $errors['all'] ?></label><?php endif; ?>

                </div>
            </div>

    </body>
</html>