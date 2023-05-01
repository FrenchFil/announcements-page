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


    <body class="bg-image" style="background-image:url('test_background.jpg'); height:100vh;">
      
        <header>
            <nav class="navbar navbar-expand-lg" id="navbar">
                <div class="container-fluid">
                  <a class="navbar-brand" href="index.php?action=home">Witamy</a>
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
  <section class="section-1">
    <div class="container-fluid text-center">
        <div class="row">
          <div class="col-md-2 mx-auto" style="background: rgba(0,0,0,0);border:0px;">
            
             
            </div>
          </div>
          </div>
          
          <?php foreach ($users as $row): array_map('htmlentities',$row); ?>
          <?php if($row['Id']!='1') :?>
          <div class="col-md-8 mx-auto" style="border-radius: 0;">
            <div class="card mx-auto" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Imie: <?php echo $row['Name']?></li>
                  <li class="list-group-item">Nazwisko: <?php echo $row['LastName']?></li>
                  <li class="list-group-item">Login: <?php echo $row['Login']?></li>
                  <li class="list-group-item">Mail:<?php echo $row['Mail']?></li>
                  <li class="list-group-item">Numer telefonu: <?php echo $row['Phone']?></li>
                </ul>
                <p class="card-text mx-auto my-2">
                <?php if($_SESSION['Id']=='1') : ?>
                        <a href="<?php echo "http://localhost/adminPanel/userDelete.php?id=".$row['Id']."&user=".$_SESSION['Id']?>"><button type="button" type="POST" class="btn btn-danger">X</button></a>
                        <?php if($row['isApproved']=='0') : ?>
                            <a href="<?php echo "http://localhost/adminPanel/userApprove.php?id=".$row['Id']."&user=".$_SESSION['Id']?>"><button type="button" type="POST" class="btn btn-success">✓</button></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </p>
              </div>
          </div>
          <?php endif;?>
          <?php endforeach;?>
          <div class="col-md-2 mx-auto" style="background: rgba(0,0,0,0);border:0px;">
            
          </div>
        </div>
      </div>
  </section>
   

</main>

<footer style="background-color:#9966FF;">
    <div class="container-fluid">
      <div class="row">
        
       <div class="col-md-12 mx-auto" style="background-color: #9966FF; border:0px">&copy Footer</div>
      </div>
  </div>
  </footer> 

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