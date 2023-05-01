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
          <div class="col-md-2 mx-auto" id="tlo">
            
             
            </div>
          </div>
          </div>
          <div class="col-md-8 mx-auto" id="post">
            <?php foreach ($ads as $row): array_map('htmlentities',$row); ?>
            
            <div class="card border-secondary mx-auto mb-3" id="karta_ogloszenia">
            <a href=<?php echo "index.php?action=selectedAd&Id=".$row['Id']?> class="text-decoration-none" style="color:black">
              <div class="row g-0">
                <div class="col-md-4">
                  <img class="card-img-top" src="picture\<?php echo $row['Id']?>.jpg" alt="Card image cap">
                </div>
              
              <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-text"><?php echo $row["Name"] ?>  </h5>
                <p class="card-text mt-5"> Cena: <?php echo $row["Price"] ?>   </p>
                <p class="card-text mt-5"> Kategoria: 
                  <?php 
                foreach($result as $r)
                  if($r['Id']==$row['Category'])
                    echo $r['Name']
                  ?>
                  
                </p>
                <p class="card-text mt-5">
                    
                    

                    <?php if($_SESSION['Id']=='1') : ?>
                        <a href="<?php echo "http://localhost/adminPanel/adDelete.php?id=".$row['Id']."&user=".$_SESSION['Id']?>"><button type="button" type="POST" class="btn btn-danger">X</button></a>
                        <?php if($row['isApproved']=='0') : ?>
                            <a href="<?php echo "http://localhost/adminPanel/adApprove.php?id=".$row['Id']."&user=".$_SESSION['Id']?>"><button type="button" type="POST" class="btn btn-success">✓</button></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </p>
                    
              </div>
            </div>
            </div>
            </a>
            </div>
            
            <?php endforeach; ?>
        
          </div>
          
          <div class="col-md-2 mx-auto" id="tlo">

          </div>
        </div>
      </div>
  </section>
   

</main>

<footer>
    <div class="container-fluid">
      <div class="row">
        
       <div class="col-md-12 mx-auto" id="stopka">&copy Footer</div>
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