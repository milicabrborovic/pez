
<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Font/flaticon.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <link rel="icon" href="images/logo-icon.jpg">
    <link rel="stylesheet" href="css/style.css">
    <title>Naslovna</title>
</head>
<body>

 <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
       <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link" href="index.html#pravila">Pravila</a>
                <a class="nav-link" href="index.html#nagrade">Nagrade</a>
                <a class="nav-link" href="index.html#dobitnici">Dobitnici</a>
                <a class="nav-link" href="index.html#pravilnik">Pravilnik</a>
                <a class="nav-link klik" href="#"><img src="images/icon-member.png" alt="member"></a>

<!-- START LOGOVANJE --------------------------------------------------------------------------->             
          <div id="logovanje" class="container">
            <a href="#" class="close"><i class="far fa-window-close"></i></a>
            <h2 class="text-center">Učestvuj u konkursu</h2> 

            <div class="log">
              <p><a href="#" class="reg">Registruj se</a></p>
              <p class="bom"><a href="#">Loguj se</a></p>
            </div><!-- end log -->

           
        <?php 
                        if(!isset($_SESSION['email']))
                        {
                            echo '
                            <form method="post" action="index.php">';
                            include('errors.php');
                            echo '<div class="input-group">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div><!-- end input group -->
                            <div class="input-group">
                                <label>Šifra</label>
                                <input type="password" name="password"  required>
                            </div><!-- end input group -->
                            <div class="input-group">
                                <button type="submit" class="btn" name="login_user">Loguj se</button>
                            </div><!-- end input group -->
                        </form>';
                        }
                        else {
                            
                        }
                        
        ?>


        <!-- Brisanje sesije i podataka --->
        <?php 
            if (isset($_GET['logout'])) {
                session_destroy();
                unset($_SESSION['email']);
                header('location: index.php');
            }
        ?>

         <div class="content">
             <!-- notification message -->
             <?php if (isset($_SESSION['success'])) : ?>
                 <div class="error success" >
                    <h3>
                        <?php 
                         echo $_SESSION['success']; 
                         unset($_SESSION['success']);
                        ?>
                    </h3>
                 </div><!-- end error succes -->
            <?php endif ?>
                 <!-- logged in user information -->
            <?php  if (isset($_SESSION['email'])) : ?>
                 <p>Dobrodošli <strong><?php echo $_SESSION['email']; ?></strong></p>
                 <p> <a href="index.php?logout='1'" style="color: #fff; background-color: #005baa; display:block; padding:10px 0; text-align:center; width:200px">Odjavi se</a> </p>
             <?php endif ?>
          </div><!-- end logovanje -->
           <!-- END LOGOVANJE --------------------------------------------------------------------------->    
             </div><!-- end navbar-nav -->
         </div><!-- end colapse -->
     </div><!-- end fluid -->
</nav><!-- end nav -->
      
<!-- START REGISTRACIJA --------------------------------------------------------------------------->    
    <div class="registruj" id="regi">
       <a href="#" class="zatvori"><i class="far fa-window-close"></i></a>
       <p>Već registrovan?</p>
       <a href="#" class="zatvori back">Loguj se</a>
    
       <h2>Učestvuj u konkursu</h2>
       <form method="post" action="index.php">
  	       <?php include('errors.php'); ?>
  	       <div class="input-group">
  	          <label>*Ime</label>
  	           <input type="text" name="name" required>
  	       </div><!-- end input group -->
           <div class="input-group">
  	          <label>*Prezime</label>
  	           <input type="text" name="surname" required>
  	       </div><!-- end input group -->
           <div class="input-group">
             <label>Nadimak</label>
  	           <input type="text" name="nickname">
  	       </div><!-- end input group -->
            <div class="input-group">
  	          <label>*Adresa</label>
  	          <input type="address" name="address" required>
  	       </div><!-- end input group -->
  	       <div class="input-group">
  	          <label>*Mejl</label>
  	          <input type="email" name="email" value="<?php echo $email; ?>" required>
  	       </div><!-- end input group -->
  	       <div class="input-group">
  	          <label>Šifra</label>
  	           <input type="password" name="password_1" required>
  	       </div><!-- end input group -->
  	       <div class="input-group">
  	          <label>*Potvrdi šifru</label>
  	          <input type="password" name="password_2" required>
  	        </div><!-- end input group -->
            <div class="input-group">
  	          <label>*Kontakt telefon</label>
  	          <input type="tel" name="tel" required>
  	        </div><!-- end input group -->
               <label><input type="checkbox"> Imam preko 18 godina</label>
               <label><input type="checkbox"> Pročitao sam i prihvatio Pravilnik Nagradnog Konkursa</label>
               <label><input type="checkbox"> Slažem se da će se moji lični podaci obrađivati</label>
     	    <div class="input-group">
  	             <button type="submit" class="btn" name="reg_user">Registruj se</button>
  	        </div><!-- end input group -->
              
        </form>
    </div> <!-- end registruj -->
<!-- END REGISTRACIJA --------------------------------------------------------------------------->  


      <section id="naslovna">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <img src="images/pez-dispensers-desktop.png" alt="pez-dispensers-desktop" class="img-fluid">
                </div><!-- end col-7 -->
                <div class="col-6 pt-4 bubble">
                    <img src="images/PEZ BTS Bubble.png" alt="PEZ" class="img-fluid">
                </div><!-- end col-5 -->
                <div class="blue"></div>
            </div><!-- end row -->
        </div><!-- end fluid -->
      </section><!-- end section naslovna -->

      <section id="register">
        <div class="container">
            <div class="row">
                <div class="col-12 fiskalni text-center">
                    <h1 class="mt-5">registruj <br> fiskalni račun</h1>
                </div>
                <div class="col-12 col-md-6 racun mt-3">
                    <img src="images/Račun.png" alt="Račun" class="img-fluid">
                </div><!-- end md-5 -->
                <div class="col-12 col-md-6 forma mt-3">
                <form action="inputbill.php" method="post" onsubmit="return validate()">
                    <label class="d-block">Broj fiskalnog računa (Bl broj)
                        <input type="text" name="brojracuna" placeholder="123456789" class="px-3 my-2" required>
                    </label>
                    <label class="d-block">Datum i vreme
                        <input type="text" name="datum"  id="datumZaProvjeru" placeholder="dd/mm/gggg 00:00" class="px-3 my-2" >
                    </label>
                    <label>
                        <input type="checkbox">Potvrđujem da ću sačuvati fiskalni račun
                    </label>
                    <?php 
                        if(!isset($_SESSION['email']))
                        {
                            echo '<p> Molimo vas da se prvo ulogujete na vaš nalog pre nego što registrujete fiskalni račun! </p>';
                        }
                        else 
                        {
                            echo '<input type="submit" value="registruj" name="submit">';
                        }
                    ?>
                </form>
                </div><!-- end md-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
      </section><!-- end section register -->


      <section id="pravila">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="mb-5">pravila</h1>
                    <img src="images/pravila-ikonice.png" alt="pravila" class="img-fluid">
                </div><!-- end col-12 -->
            </div><!--  -->
        </div><!-- end fluid -->
      </section><!-- end pravila -->



      <section id ="nagrade" class="px-5">
        <div class="container-fluid">
            <h1 class="text-center mb-5">Nagrade</h1>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <h2>20X</h2>
                    <img src="images/nagrade-vaucer.png" alt="nagrade" class="img-fluid">
                    <h2 class="text-center">tehnomanija <br> vaučer 10.000 din</h2>
                </div><!-- end lg-3 -->

                <div class="col-12 col-md-6 col-lg-3">
                    <h2>20X</h2>
                    <img src="images/nagrade-tablet.png" alt="nagrade" class="img-fluid">
                    <h2 class="text-center">tablet</h2>
                </div><!-- end lg-3 -->

                <div class="col-12 col-md-6 col-lg-3">
                    <h2>20X</h2>
                    <img src="images/nagrade-figura.png" alt="nagrade" class="img-fluid">
                    <h2 class="text-center">xxl figura</h2>
                </div><!-- end lg-3 -->

                <div class="col-12 col-md-6 col-lg-3">
                    <h2>60X</h2>
                    <img src="images/nagrade-paket.png" alt="nagrade" class="img-fluid">
                    <h2 class="text-center">školski paket</h2>
                </div><!-- end lg-3 -->
            </div><!-- end row -->
        </div><!-- end fluid -->
      </section><!-- end sekcija nagrade -->


      <section id="footer">
        <div class="container-fluid">
            <a href="#"><i class="flaticon-instagram"></i></a>
            <a href="#"><i class="flaticon-facebook"></i></a>
            <a href="#"><i class="flaticon-email"></i></a>
        </div><!-- end fluid -->
      </section><!-- end footer -->


    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/jQuery 3.3.1.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/messages_sr_lat.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/main.js"></script>
    
    
</body>
</html>