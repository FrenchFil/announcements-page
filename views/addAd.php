<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=width-device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="views/style.css">
        <title>Dodawanie ogłoszeń</title>
    </head>


    <body>
        <header>
            <nav class="navbar navbar-expand-lg" id="navbar">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Witamy</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse dropstart" id="navbarSupportedContent" >
                    <div class="me-auto"></div>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <?php if(isset($_SESSION['Id'])) : ?>
                            <a href="logout.php" class="btn btn-primary mx-auto mt-1 btn-sm" >Wyloguj</a>
                        <?php else: ?>
                            <a href="index.php?action=login" class="btn btn-primary mx-auto mt-1 btn-sm" >Zaloguj</a>
                        <?php endif; ?>
                        </li>

                        
                        <?php if(isset($_SESSION['Id'])&&$_SESSION['Id']=='1') : ?>
                          <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                            AdminPanel
                          </a>
                          <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="index.php?action=reg">Regulamin</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.php?action=users_show">Użytkownicy</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.php?action=post_show">Ogłoszenia</a></li>
                          </ul>
                          <?php endif; ?>
                          </li>

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                            Menu
                          </a>
                          <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="index.php?action=home">STRONA GŁÓWNA</a></li>
                          <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.php?action=register">Zarejestruj</a></li>
                            <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="index.php?action=search">Szukaj</a></li>
                            <?php if(isset($_SESSION['Id'])) : ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.php?action=addAd">Dodaj ogłoszenie</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.php?action=userEdit">UserPanel</a></li>
                            <?php endif; ?>
                          </ul>
                        </li>
                   
                    </ul>
                
                  </div>
                </div>
              </nav>
        </header>

<main >
  <section class="section-1" >
    <div class="container-fluid"> 
    <div class=" text-center">
      <div class="d-flex justify-content-center">
        <div class="row g-3 align-items-center" >
			<div class="col-md-4 justify-content-center" id="tlo">
                <form method="POST" action="index.php?action=addAd" enctype="multipart/form-data">
                <div class="border border-secondary rounded border-opacity-25 mx-auto px-3 py-3" id="obramowka_add_post" >
                    <label for="formFile" class="form-label" >Default file input example</label>
                    <input name = "plik" class="form-control mx-auto mt-3" type="file" accept="image/jpg" id="formFile" >

                    <?php if (isset($errors['plik'])):?>
				              <div id="error" class="form-text" input type>
					          <?php echo ($errors['plik']);?>
				            </div>
				            <?php endif;?>

                    <input name = "title" type="text" class="form-control mx-auto mt-3" id="tytul" placeholder="Wpisz tytul ogloszenia" aria-label="Wpisz tytul ogloszenia">
                    
                    <?php if (isset($errors['name'])):?>
				              <div id="error" class="form-text" input type>
					          <?php echo ($errors['name']);?>
				            </div>
				            <?php endif;?>

                    <select name = "category " class="form-select mt-3 mx-auto" aria-label="Default select example" id="kategoria" >
                    <option selected>Kategorie</option>
                      <?php foreach ($category as $row): array_map('htmlentities',$row); ?>
                      <option value=<?php echo $row['Name']?>><?php echo $row['Name']?></option>
                      <?php endforeach; ?>
                    </select>

                    <?php if (isset($errors['category'])):?>
				              <div id="error" class="form-text" input type>
					          <?php echo ($errors['category']);?>
				            </div>
				            <?php endif;?>

                    <input name = "city" type="text" class="form-control mx-auto mt-3" id="tytul" placeholder="Lokalizacja" aria-label="Wpisz tytul ogloszenia" >
                    
                    <?php if (isset($errors['city'])):?>
				              <div id="error" class="form-text" input type>
					          <?php echo ($errors['city']);?>
				            </div>
				            <?php endif;?>
                    
                    <input name = "price" type="text" class="form-control mx-auto mt-3" id="tytul" placeholder="Cena" aria-label="Wpisz tytul ogloszenia" >
                    
                    <?php if (isset($errors['price'])):?>
				              <div id="error" class="form-text" input type>
					          <?php echo ($errors['price']);?>
				            </div>
				            <?php endif;?>
                    
                    <input name = "description" type="text" class="form-control mx-auto mt-3" id="opis_ogloszenia" placeholder="Opis ogloszenia" aria-label="Opis ogloszenia">
                    
                    <?php if (isset($errors['description'])):?>
				              <div id="error" class="form-text" input type>
					          <?php echo ($errors['description']);?>
				            </div>
				            <?php endif;?>
                    
                    <button id="addPost"class="btn btn-outline-primary mt-3" type="submit" id="guzik_dodawania_ogloszenia"> Dodaj ogłoszenie </button>
				</div>
                </form>
                
		</div>

        </div>
      </div>
      </div>
    </div>
  </section>




  <div class="container-fluid">
	<div class="row">
	<div class="col-12 mx-auto" id="stopka">&copy Footer</div>
  </div>
</div>

</main>
        <script src="js/bootstrap.bundle.js"></script>
 </body>
  
    


<style>
	[class*="col"]{
		padding: 1rem;
		background-color: #fff;
    border: 2px solid #fff;
    border-radius: 15px;
	}

 
</style>

</html>