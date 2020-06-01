<!-- Ana Blazic,Ana Saponjic -->
<html>
    <head>
        <title>Gost</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
    </head>
    <body>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-3'>
                    <p id='par1'></p>

                    <br>
                    <br>
                    <br>
                    <img src="<?php echo base_url('slike/logo_master.png'); ?>" style = "width: '100%'; margin-top: 30px; " >
                    </div>
                <div class='col-sm-5 text-center '>
                    <br />    <br />  <br> <br />  <br> <br>

                    <a href ="<?= site_url("Takmicenje/gost")?>" class='linkovi'>TAKMICENJE</a>
                    <br>

                    <br>
                    <a href ="<?= site_url("Home/index")?>" class='linkovi'>POCETNA STRANA</a>
                    <br>
              </div>
              <div class='col-sm-4' style = "color: white;">
                <br>
              <br>
              <br>
              <br>

              <br>
              <center>  <h2><i>Dobrodosli, gostu!</i></h2></center>
                Stekni znanje na zabavan nacin:
                <br />
                <p id='p1'>
                    Sva pitanja i zadaci koji se postavljaju u kvizu preuzeti su iz zvanične literature,
                    tako da je verodostojnost tačnih odgovora na najvišem nivou.
                </p>
                <p>
                    Ukoliko ste registrovani korisnik, imate mogucnost da unapredite svoje znanje u delu <b>trening</b> , pre nego sto se oprobate u
                    takmicenju. Ako ste samo gost, da biste vezbali, potrebno je da se registrujete.
                    <a href="<?= site_url("Home/regIg")?>">ovde</a>.

                    <br>
                </p>
                <br>
                <br>

                <p>

                </p></div>

            </div>
        </div>
    </body>
</html>
