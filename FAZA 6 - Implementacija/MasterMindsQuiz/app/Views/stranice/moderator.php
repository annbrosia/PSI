<!--Martina Markovic 0672/17-->
<!DOCTYPE html>
<html>
    <head>
         <title> Moderator Home </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel='stylesheet' type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
    </head>
    <body>
        <div class="container">
            <div class='row'>
                <div class='col-sm-3'>
                    <p id='par1'></p>
                    <br>
                    <br>
                    <br>
                  <img src="<?php echo base_url('slike/logo_master.png'); ?>" style = "width: '100%'; margin-top: 30px; " >
                  </div>
                <div class='col-sm-5 text-center ' id='osnovni_meni'>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <a href="<?php echo site_url('Moderator/dodajpitanje'); ?>" class='linkovi' >Dodaj pitanje </a>
                    <br>
                    <a href="<?php echo site_url('Moderator/izbrisipitanje'); ?>" class='linkovi' >Ukloni pitanje </a>
                    <br>
                    <a href="<?php echo site_url('Moderator/rang'); ?>" class='linkovi' >Rang lista </a>
                    <br>
                    <a href="<?php echo site_url('Home/odjava'); ?>" class='linkovi'>ODJAVA</a>
                    <br>
                </div>
                <div class='col-sm-4' style = "color: white;">
                  <br>
        <br>
        <br>
        <br>

        <br>
                <center>  <h2><i>Dobrodosli, <?php  if(!empty($_SESSION['ulogovaniKorisnik'])) echo $_SESSION['ulogovaniKorisnik']; ?> !</i></h2></center>
                  Vasa uloga na ovom sajtu je uloga moderatora:
                  <br />
                  <p id='p1'>
                    Mozete da postavljate razlicita pitanja <u>iskljucivo</u> iz kategorije za koju ste se prijavili. Morate da vodite racuna o vjerodostojnosti
                    tacnih odgovora, jer ako vasa pitanja ne budu u skladu sa politikom sajtom, mozete biti uklonjeni.
                  </p>
                  <p>
                    Naravno, imate i mogucnost da uklonite neko od pitanja koje ste prethodno postavili, kao i da budete u toku sa desavanjima na sajtu, zato imate mogucnost pregleda rang liste.
                      <br>
                  </p>
                  <br>
                  <br>

                  <p>

                  </p>
                </div>
            </div>
        </div>
    </body>
</html>
