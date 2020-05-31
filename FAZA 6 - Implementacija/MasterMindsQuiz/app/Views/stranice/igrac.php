<html>
    <head>
        <!-- Ana Blazic,Ana Saponjic -->
        <title>Igrac</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script>


        $(document).ready(function(){

            $("#kategorije_meni").hide(); //na pocetku

          $("a[id='trening_link']").click(function(){ //klikom na trening
            $("#osnovni_meni").hide();

            $("#kategorije_meni").fadeToggle("slow");
          });

         $("a[id='nazad']").click(function(){ // vrati osnovni_meni
                 $("#kategorije_meni").hide();
           $("#osnovni_meni").show();
          });


 $("a[id='odjavajq']").click(function(){
                             var komentar = prompt("Ocenite nas!", "Komentar...");
                            if ( komentar != null && komentar != "")
                          {

                                $.ajax({
                                    url: "../../Igrac/odjava",
                                    method: "post",
                                    dataType: 'json',
                                    data: {komentar : komentar},
                                    error: function(ts) { alert(ts.responseText) },
                                    success: function(data) {
                                    alert(data);
                                    }
                                });
                            }

  });


        });

        </script>


    </head>
    <body>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-3'>
                    <p id='par1'>Ulogovan registrovani korisnik</p>

                    <br>
                    <br>
                    <br>

                  <img src="<?php echo base_url('slike/logo_master.png'); ?>" style = "width: '100%'; margin-top: 30px; " >  </div>
                <div class='col-sm-5 text-center ' id='osnovni_meni'>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <a href='#' class='linkovi' id='trening_link'  style = "color: white;">TRENING</a>
                    <br>

                    <a href ="<?= site_url("Takmicenje/takmicenjePrikaz")?>" class='linkovi' style = "color: white;">TAKMICENJE</a>
                    <br>
                    <a href='<?php echo base_url('Igrac/istorijaRezultata'); ?>' class='linkovi' style = "color: white;" >REZULTATI</a>
                    <br>
                    <a href='<?php echo base_url('Igrac/rang'); ?>' class='linkovi' style = "color: white;">RANG LISTA</a>
                    <br>
                    <!--**************************************************************-->
                    <a href ="<?= site_url("Igrac/odjava")?>" class='linkovi' id='odjavajq' style = "color: white;">ODJAVA</a>

                    <br>
                </div>
                <div class='col-sm-5 text-center ' id='kategorije_meni'>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


                    <a href ="<?= site_url("Trening/treningPrikaz/8")?>" class='linkovi' id="biologija">BIOLOGIJA</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/7")?>" class='linkovi' id="istorija">ISTORIJA</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/3")?>" class='linkovi' id="geografija">GEOGRAFIJA</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/4")?>" class='linkovi' id="matematika">PRIRODNE NAUKE</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/2")?>" class='linkovi' id="muzika">MUZIKA</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/9")?>" class='linkovi' id="umetnost">UMETNOST</a>
                    <br>

                    <a href ="<?= site_url("Trening/treningPrikaz/6")?>" class='linkovi' id="sport">SPORT</a>
                    <br>

                    <a href ="<?= site_url("Trening/treningPrikaz/5")?>" class='linkovi' id="filmovi">FILMOVI</a>
                    <br>
                    <a href ="<?= site_url("Trening/treningPrikaz/1")?>"  class='linkovi' id="serije">SERIJE</a>
                    <br>
                    <a href='#' class='linkovi' id="nazad">Nazad </a>
                    <a href="<?= site_url("Home/regIg")?>">ovde</a>.


                </div>
                <div class='col-sm-4' style = "color: white;">
                  <br>
                <br>
                <br>
                <br>

                <br>
                <center>  <h2><i>Dobrodosli, <?php  if(!empty($_SESSION['ulogovaniKorisnik'])) echo $_SESSION['ulogovaniKorisnik']; ?> !</i></h2></center>
                  Stekni znanje na zabavan nacin:
                  <br />
                  <p id='p1'>
                      Sva pitanja i zadaci koji se postavljaju u kvizu preuzeti su iz zvanične literature,
                      tako da je verodostojnost tačnih odgovora na najvišem nivou.
                  </p>
                  <p>
                      Ukoliko ste registrovani korisnik, imate mogucnost da unapredite svoje znanje u delu <b>trening</b> , pre nego sto se oprobate u
                      takmicenju. Ako ste samo gost, da biste vezbali, potrebno je da se registrujete.
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
