<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=width-device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="views/style.css">
        <title>Rejsetracja</title>
    </head>
 

    <body>
      <div>
        <header>
            <nav class="navbar navbar-expand-lg" id="navbar">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Witamy</a>
                  <button class="navbar-toggler dropstart" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
			<div class="col-md-2" id="tlo">
				<form method="POST" action="index.php?action=register">
        		<div class="border border-secondary rounded border-opacity-25 mx-auto px-3 py-3" id="panel_rejestracji" >
				
				<?php if (isset($name)):?>
				<input name = "name" type="text" class="form-control mx-auto mt-3" id="logowanie_haslo" value=<?php echo($name)?>>
				<?php else: ?>
				<input name = "name" type="text" class="form-control mx-auto mt-3" placeholder="Wpisz imie" aria-label="Wpisz imie" id="logowanie_haslo">
				<?php endif;?>	

				<?php if (isset($errors['name'])):?>
				<div id="error" class="form-text" input type>
					<?php echo ($errors['name']);?>
				</div>
				<?php endif;?>

				<?php if (isset($lastName)):?>
				<input name = "lastName" type="text" class="form-control mx-auto mt-3" id="logowanie_haslo" value=<?php echo($lastName)?>>
				<?php else: ?>
				<input name = "lastName" type="text" class="form-control mx-auto mt-3" placeholder="Wpisz nazwisko" aria-label="Wpisz hasło" id="logowanie_haslo">
				<?php endif;?>

				<?php if (isset($errors['lastName'])):?>
				<div id="error" class="form-text" input type>
					<?php echo ($errors['lastName']);?>
				</div>
				<?php endif;?>

				<?php if (isset($email)):?>
				<input name = "email" type="text" class="form-control mx-auto mt-3" value=<?php echo($email)?> id="logowanie_haslo">
				<?php else: ?>
				<input name = "email" type="email" class="form-control mx-auto mt-3" placeholder="Wpisz email" aria-label="Wpisz email" id="logowanie_haslo">
				<?php endif;?>

				<?php if (isset($errors['email'])):?>
				<div id="error" class="form-text" input type>
					<?php echo ($errors['email']);?>
				</div>
				<?php endif;?>

				<?php if (isset($login)):?>
				<input name = "login" type="text" class="form-control mx-auto mt-3" value=<?php echo($login)?> id="logowanie_haslo">
				<?php else: ?>
				<input name = "login" type="login" class="form-control mx-auto mt-3" placeholder="Wpisz login" aria-label="Wpisz login" id="logowanie_haslo">
				<?php endif;?>

				<?php if (isset($errors['login'])):?>
				<div id="error" class="form-text" input type>
					<?php echo ($errors['login']);?>
				</div>
				<?php endif;?>

				<input name = "password" type="password" class="form-control mx-auto mt-3" placeholder="Wpisz hasło" aria-label="Wpisz hasło" id="logowanie_haslo">

				<?php if (isset($errors['password'])):?>
				<div id="error" class="form-text" input type>
					<?php echo ($errors['password']);?>
				</div>
				<?php endif;?>

				<input name = "secPassword" type="password" class="form-control mx-auto mt-3" placeholder="Powtórz hasło" aria-label="Wpisz hasło" id="logowanie_haslo">

				<?php if (isset($errors['secPassword'])):?>
				<div id="error" class="form-text" input type>
					<?php echo ($errors['secPassword']);?>
				</div>
				<?php endif;?>

				<div id="passwordHelpBlock" class="form-text" input type>
						Hasło musi zawierać od 8 do 20 znaków, nie może zawierać spacji
				</div>
				<button class="btn btn-primary mt-2" type="submit" >Zarejestruj</button>
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