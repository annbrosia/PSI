<!-- Ana Blazic,Ana Saponjic -->
<html>
    <head>
        <title> Registracija Igraca </title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
    </head>


    <body>
	<div class="regBox">

            <img src="<?php echo base_url('slike/pink.png')?>" class="user">
            <div class = "naslov_mastermind"> <h2> Master Minds </h2></div>
            <form method="post" action="<?= site_url("Home/registrujIgraca")?>" size = "100%">
                <table size = "100%" align = "center">
                    <tr>
                        <td> <p>Korisnicko ime &nbsp &nbsp </p>  </td>
                        <td> <input type="text"  id="prov1" value="<?php if(!empty($_SESSION['username1'])) echo $_SESSION['username1']; $_SESSION['username1']=""; ?>" name = "reg_username" placeholder="Unesite Korisnicko Ime" required> </td>

                    </tr>
                    <tr>
                        <td>
                            <p style="font-size:11px" style="background-color:white">

                            <?php
                             if(!empty($username_errors))
                            echo $username_errors." ";


                            if(!empty($_SESSION['username']))
                               echo $_SESSION['username'];
                                $_SESSION['username']="";
                            ?>


                        </p>
                        </td>


                    </tr>

                    <tr>
                        <td> <p>Ime </p> </td>
                        <td> <input type="text"  id="prov2" value="<?php if(!empty($_SESSION['ime1'])) echo $_SESSION['ime1']; $_SESSION['ime1']=""; ?>" name = "reg_ime" placeholder="Unesite Ime" required></td>
                    </tr>
                    <tr>
                       <td>
                           <p style="font-size:11px" style="background-color:white">

                           <?php      if(!empty($ime_errors))
                               echo $ime_errors;
                           ?>


                       </p>
                       </td>


                   </tr>
                    <tr>
                        <td><p>Prezime </p></td>
                        <td><input class = "form-control"  id="prov3"  type="text" value="<?php if(!empty($_SESSION['prezime1'])) echo $_SESSION['prezime1']; $_SESSION['prezime1']=""; ?>" name = "reg_prezime" placeholder="Unesite Prezime" required="" > </td>
                     </tr>
                     <tr>
                        <td>
                            <p style="font-size:11px" style="background-color:white">

                            <?php  if(!empty($prezime_errors))
                                echo $prezime_errors;
                            ?>


                        </p>
                        </td>


                    </tr>
                     <tr>
                        <td><p>E-mail </p> </td>
                        <td><input class = "form-control"  id="prov5" type="email" name = "reg_email" placeholder="Unesite E-mail" value="<?php if(!empty($_SESSION['email1'])) echo $_SESSION['email1']; $_SESSION['email1']=""; ?>" required= "" > </td>
                     </tr>
                     <tr>
                        <td>
                            <p style="font-size:11px" style="background-color:white">

                            <?php if(!empty($_SESSION['email']))
                               echo $_SESSION['email'];
                                $_SESSION['email']="";
                            ?>


                        </p>
                        </td>


                    </tr>
                      <tr>
                        <td>  <p>Lozinka </p> </td>
                        <td> <input type="password"  id="prov4" name = "reg_lozinka" placeholder="Unesite Lozinku" required> </td>
                     </tr>
                     <tr>
                        <td>
                            <p style="font-size:11px" style="background-color:white">

                            <?php  if(!empty($lozinka_errors))
                                echo $lozinka_errors;
                            ?>


                        </p>
                        </td>


                    </tr>
                     <tr> </tr>
                        <td colspan = "2">
                            <input type="submit" name = "klik_reg" value="Registruj se" >

                     <tr>
                        <td colspan = "2">
                         <div class = 'words_login'>
                                <a href="<?= site_url("Home/index")?>"> Nazad</a>
                                 </p>
                        </td>
                     </tr>
                </table>

        </form>
    </div>

       <script>

/*for (var i = 1; i<5; i++)
{
      document.getElementById("prov" + i).oninvalid = function () {
      this.setCustomValidity('Polje je prazno');}

      document.getElementById("prov" + i).oninput = function () {
      this.setCustomValidity('');}
}

document.getElementById("prov5").oninvalid = function () {
this.setCustomValidity('Polje je prazno ili je mejl neispravan');}

document.getElementById("prov5").oninput = function () {
this.setCustomValidity('');}/*


                </script>

    </body>


</html>
