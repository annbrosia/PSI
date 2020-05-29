<!-- Prototip: Martina Markovic,Marija Lalic -->
<!-- Implementacija: Martina Markovic 0672/17-->
<!DOCTYPE html>
<html>
    <head>
        <title>Rang lista</title>
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
                    <img src="<?php echo base_url('slike/logo_master.png'); ?>" style = "width: '100%'; margin-top: 100px; " >
                   </div>

                    <div class="loginBox" style ="height:600px; width:400px;">
                        <div class = "naslov_mastermind"> <h2> Rang lista: </h2></div>

   <table style="color:white; text-align: center; height:400px; width:360px;" >
                            <?php
                         if (!empty($najbolji) && !empty($usernames))
                         {
                             echo "<tr><td style='color:white'>Username:</td><td style='color:white'>Poeni:</td></tr>";

                             if ( count($najbolji) <11){
                                 $i=0;
                            foreach ($najbolji as $rezultat) {
                            echo "<tr><td>{$usernames[$i]}</td><td>{$rezultat['poeni']}</td><tr>";  $i++;
                        }
                         }
                         else
                         {
                             for ($i=0;$i<10;$i++)
                             {
                                   echo "<tr><td>{$usernames[$i]}</td><td>{$najbolji[$i]['poeni']}</td><tr>";

                             }
                         }
                         }
                         else
                         {
                             echo "<tr><td style='color:white'>Nema registrovanih igraca!</td></tr>";
                         }
                      ?>
                        <tr><td>  <a href ="<?php
                        if($_SESSION['tip_ulogovan'] == 'moderator') echo base_url('Moderator/home');
                        else if($_SESSION['tip_ulogovan'] == 'admin') echo base_url('Admin/home');
                        else echo base_url('Igrac/home');
                        ?>"> Nazad</a>

                            </td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        </tr>

                    </table>
                    </div>

            </div>
            </div>
        </div>
    </body>
</html>
