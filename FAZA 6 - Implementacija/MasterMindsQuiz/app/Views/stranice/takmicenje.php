<html>
    <head>
        <!-- Prototip: Martina Markovic,Marija Lalic -->
        <!-- Implementacija: Ana Blazic,Ana Saponjic -->
        <link rel='stylesheet' type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
      <title>Takmicenje</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

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


        });

        function ocijeni()
        {
         prompt("Ocenite nas!", "Komentar...");
        }
        </script>
    </head>
    <body>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-3'>
                  <img src="<?php echo base_url('slike/logo_master.png'); ?>" style = "width: '100%'; margin-top: 110px; " >
                  <h2 style= "color: white; ">
                        <?php if(!empty($_SESSION['motivaciona']))
                          echo $_SESSION['motivaciona'];
                        ?>
                  <h2>

                </div>
                <div class='col-sm-8 text-center '>
	                    <form name="takmicenjeForma" method="post" action="<?= site_url("Takmicenje/izracunajPoene")?>">
                        <table style = 'text-align:center; background: rgba(000, 000, 000, 0.4); width: 100%; height:450px ;margin-top:100px' >
                          <tr align = 'center'>
                         <td>
                         <label id = 'pitanje'>
                         <font color = 'white' style = 'opacity: 2;'>  <i>
                           <?php if(!empty($_SESSION['tekst']))
                               echo $_SESSION['tekst'];
                           ?>
                                      </i> </font>
                         </label>
                         </td>
                           </tr>

                           <tr>
                             <td>
                               <div class="form-check">
                                 <input class="form-check-input" type="radio" name="izbor" id="gridRadios1" value="<?php echo $_SESSION['tacan1']; ?>" >
                                 <label class="form-check-label" for="gridRadios1" style = ' width: 580px;'>
                                   <div class='form-group has-error has-feedback'>
                                     <input type='text' class='form-control' name='izbor'  value= "  <?php if(!empty($_SESSION['tacan1']))
                                          echo $_SESSION['tacan1'];
                                      ?>"  disabled>
                                   </div>
                                 </label>
                                 </div>
                               </td>
                             </tr>
                             <tr>
                               <td>
                                 <div class="form-check">
                                   <input class="form-check-input" type="radio" name="izbor" id="gridRadios2" value="<?php echo $_SESSION['netacan1']; ?>" >
                                   <label class="form-check-label" for="gridRadios2" style = ' width: 580px;'>
                                     <div class='form-group has-error has-feedback'>
                                       <input type='text' class='form-control' name='izbor'  value= "  <?php if(!empty($_SESSION['netacan1']))
                                             echo $_SESSION['netacan1'];
                                         ?>"  disabled>
                                     </div>
                                   </label>
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td>
                                   <div class="form-check">
                                     <input class="form-check-input" type="radio" name="izbor" id="gridRadios3" value="<?php echo $_SESSION['netacan2']; ?>" >
                                     <label class="form-check-label" for="gridRadios3" style = ' width: 580px;'>
                                       <div class='form-group has-error has-feedback'>
                                         <input type='text' class='form-control' name='izbor'  value= "<?php if(!empty($_SESSION['netacan2']))
                                                                             echo $_SESSION['netacan2'];
                                                                         ?>"  disabled>
                                       </div>
                                     </label>
                                     </div>
                                   </td>
                                 </tr>
                                 <tr>
                                   <td>
                                     <div class="form-check">
                                       <input class="form-check-input" type="radio" name="izbor" id="gridRadios4" value="<?php echo $_SESSION['netacan3']; ?>" >
                                       <label class="form-check-label" for="gridRadios4" style = ' width: 580px;'>
                                         <div class='form-group has-error has-feedback'>
                                           <input type='text' class='form-control' name='izbor'  value= "<?php if(!empty($_SESSION['netacan3']))
                                                                               echo $_SESSION['netacan3'];
                                                                           ?>"  disabled>
                                         </div>
                                       </label>
                                       </div>
                                     </td>
                                   </tr>
                                   <tr>
                                   <td>
                                   <center>
                                   <button type='submit' class='dugme_obrisi' >Dalje </button>
                                   </center>
                                   </td>
                                   </tr>

                                  </table>
                                  </form>
                                </div> <!--div drzi loginBox na sredini-->
                              </div> <!--div row-->
                              </div> <!--div container-->
                              </body>
                              </html>
