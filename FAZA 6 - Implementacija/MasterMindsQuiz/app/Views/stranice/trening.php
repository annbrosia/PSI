<!--Ana Saponjic, Ana Blazic-->
<html>
<head>
  <title>Trening</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel='stylesheet' type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
</head>
<body>
  <div class='container'>
              <div class='row'>
                    <div class='col-sm-3'>
                        <p id='par1'></p>
                        <img src="<?php echo base_url('slike/logo_master.png'); ?>" style = "width: '100%'; margin-top: 110px; " >
                      </div> <!--div col za sliku-->
                      <div class='col-sm-8 text-center'>
                        <form name="treningForma" method="post" action="<?= site_url("Trening/izracunajPoeneTrening")?>">
                        <table style = 'text-align:center; background: rgba(000, 000, 000, 0.4); width: 100%; height:450px ;margin-top:100px' >
                         <tr align = 'center'>
                        <td>
                        <label id = 'pitanje'>
                        <font color = 'white' style = 'opacity: 2;'>  <i>  <?php if(!empty($_SESSION['tekstTrening']))
                                        echo $_SESSION['tekstTrening'];
                                    ?> </i> </font>
                        </label>
                        </td>
                          </tr>

                          <tr >
                            <td >
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="izbor" id="gridRadios1" value="<?php echo $_SESSION['tacan1Trening']; ?>" >
                                <label class="form-check-label" for="gridRadios1" style = ' width: 580px;'>
                                  <div class='form-group has-error has-feedback'>
                                    <input type='text' class='form-control' name='izbor'  value= "<?php if(!empty($_SESSION['tacan1Trening']))
                                    echo $_SESSION['tacan1Trening'];
                                    ?>"  disabled>
                                  </div>
                                </label>
                                </div>
                              </td>
                            </tr>


                          <tr>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="izbor" id="gridRadios2" value="<?php echo $_SESSION['netacan1Trening']; ?>" >
                                <label class="form-check-label" for="gridRadios2" style = ' width: 580px;'>
                                  <div class='form-group has-error has-feedback'>
                                    <input type='text' class='form-control' name='izbor'  value= "<?php if(!empty($_SESSION['netacan1Trening']))
                                    echo $_SESSION['netacan1Trening'];
                                    ?>"  disabled>
                                  </div>
                                </label>
                                </div>
                              </td>
                            </tr>


                         <tr>
                           <td>
                             <div class="form-check">
                               <input class="form-check-input" type="radio" name="izbor" id="gridRadios3" value="<?php echo $_SESSION['netacan2Trening']; ?>" >
                               <label class="form-check-label" for="gridRadios3" style = ' width: 580px;'>
                                 <div class='form-group has-error has-feedback'>
                                   <input type='text' class='form-control' name='izbor'  value= "<?php if(!empty($_SESSION['netacan2Trening']))
                                   echo $_SESSION['netacan2Trening'];
                                   ?>"  disabled>
                                 </div>
                               </label>
                               </div>
                             </td>
                           </tr>

                            <tr>
                              <td>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="izbor" id="gridRadios4" value="<?php echo $_SESSION['netacan3Trening']; ?>" >
                                  <label class="form-check-label" for="gridRadios4" style = ' width: 580px;'>
                                    <div class='form-group has-error has-feedback'>
                                      <input type='text' class='form-control' name='izbor'  value= "<?php if(!empty($_SESSION['netacan3Trening']))
                                      echo $_SESSION['netacan3Trening'];
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
