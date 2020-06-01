<!--  Martina Markovic 0672/17-->
<!DOCTYPE html>
<html>
    <head>
        <title>Dodaj pitanje</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel='stylesheet' type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
    </head>


    <body>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-3'>
                    <p id='par1'></p>
                </div>
            </div>
            <div class='row'>
                <div class='col-sm-3 text-center '>


                <img src="<?php echo base_url('slike/logo_master.png'); ?>" style = "width: '100%'; margin-top: 60px; " >
                </div>
                <div class="loginBox" style ="height:600px;">
                    <div class = "naslov_mastermind"> <h2> Dodaj pitanje: </h2></div>
                    <form action="<?= base_url('Moderator/dodajnovo') ?>" method="post">

                        <input type="text" name = "tekstP" id="tekstP" required="required" placeholder="Unesite tekst pitanja">

                        <input type="text" name = "tacan" id="tacan" required="required" placeholder="Unesite tacan odgovor">
                        <input type="text" name = "netacan1" id="netacan1" required="required" placeholder="Unesite netacan odgovor">

                        <input type="text" name = "netacan2" id="netacan2" required="required" placeholder="Unesite netacan odgovor">

                        <input type="text" name = "netacan3" id="netacan3" required="required" placeholder="Unesite netacan odgovor">
                        <font color='red' size='2'>
                                      <?php
                                      if(!empty($errors))
                                      {
                  foreach ($errors as $error) {
                            echo $error.". ";
                  }
                                      }

                                      ?>
                                  </font>
                        <font color='white' size='2'>
                                      <?php
                                      if(!empty($notification))
                                          {

                            echo $notification;
                                          }

                                      ?>
                                  </font>
                        <input type="submit" name = "" value="Dodaj pitanje">

                        <a href ="<?php echo base_url('Moderator/home'); ?>"> Nazad</a>
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>
