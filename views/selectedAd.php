<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=width-device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="views/style.css">
        <title>Strona główna</title>
    </head>


    <body>
      <div class="bg-image" >
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

<main>
  <section class="section-1" >
    <div class="container-fluid">
    <div class=" text-center">
      <div class="d-flex justify-content-center">
        <div class="row g-3 align-items-center" >
			<div class="col-md-4" id="tlo">
				<div class="border border-secondary rounded border-opacity-25 mx-auto px-3 py-3" id="obramowka_add_post" >
                    <img class="card-img-top mt-5" src="picture\<?php echo $ad['Id']?>.jpg" alt="Card image cap">
                    <div class="row my-auto">
                    <div class="col-md-12">
                    <label >Nazwa:</label>
                    <label><?php echo $ad['Name']?></label>
                            </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                    <label >Kategoria:</label>
                    <label ><?php echo $ad['Category']?></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                    <label >Cena:</label>
                    <label ><?php echo $ad['Price']?></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                    <label >Miasto:</label>
                    <label><?php echo $ad['City']?></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                    <label >Opis:</label>
                    <label><?php echo $ad['Descr']?></label>
                    </div>
                    </div>

                    <?php if(isset($_SESSION['Id'])) : ?>

                        <div class="row">
                        <div class="col-md-12">
                        <label>Login:</label>
                        <label><?php echo $user['Login']?></label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                        <label>Mail:</label>
                        <label><?php echo $user['Mail']?></label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                        <label>Telefon:</label>
                        <label><?php echo $user['Phone']?></label>
                        </div>
                        </div>
                        
                    <?php if($_SESSION['Id']==$ad['IdOfUser'] && $_SESSION['Id']!='1') : ?>
                        <a href="<?php echo "http://localhost/adminPanel/adDelete.php?id=".$ad['Id']?>"><button class="btn btn-primary mt-2">Usuń</button></a>
                    <?php endif; ?>
                    
                    <?php if($_SESSION['Id']=='1') : ?>
                        <a href="<?php echo "http://localhost/adminPanel/adDelete.php?id=".$ad['Id']?>"><button class="btn btn-primary mt-2">Usuń</button></a>
                        <?php if($ad['isApproved']=='0') : ?>
                            <a href="<?php echo "http://localhost/adminPanel/adApprove.php?id=".$ad['Id']?>"><button class="btn btn-primary mt-2">Zaakceptuj</button></a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>

				</div>
                
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
      </div>
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