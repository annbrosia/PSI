<!-- Prototip: Martina Markovic,Marija Lalic -->
<!-- Implementacija: Martina Markovic 0672/17-->
<!DOCTYPE html>
<html>
    <head>
        <title>Moji rezultati</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel='stylesheet' type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
    </head>
    <body>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-3'>
                    <p id='par1'>Ulogovan korisnik</p>
                </div>
            </div>
            <div class='row'>

                <div class='col-sm-3 text-center '>
                    <img src="<?php echo base_url('slike/logo_master.png'); ?>" style = "width: '100%'; margin-top: 100px; ">
                </div>

                <div class="loginBox" style ="width:450px;height:675px;">
                    <div class = "naslov_mastermind"> <h2> Lista mojih rezultata: </h2></div>
                    <table style="color:white; text-align: center; height:400px; width:360px;" >
                            <?php
                         if (!empty($rezultati))
                         {
                             echo "<tr><td>Datum:</td><td>Poeni:</td><td>Datum:</td><td>Poeni:</td></tr>";
                        foreach ($rezultati as $rezultat) {
                            if ($rezultat['idrezultati'] % 2 !=0)
                            echo "<tr><td>{$rezultat['datum']}</td><td>{$rezultat['poeni']}</td>";
                            else echo "<td>{$rezultat['datum']}</td><td>{$rezultat['poeni']}</td><tr>";

                        }
                         }
                         else
                         {
                             echo "<tr><td style='color:white'>Niste se takmicili! Nemate rezultata!</td></tr>";
                         }
                      ?>
                        <tr><td>  <a href ="<?php echo base_url('Igrac/home'); ?>"> Nazad</a>

                            </td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
