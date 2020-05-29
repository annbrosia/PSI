<html>
     <!-- Martina Markovic,Marija Lalic -->
    <head>
        <title> Registracija Moderatora </title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
    </head>


    <body>
	<div class="regBoxRM">

		<img src="<?php echo base_url('slike/pink.png')?>" class="user">
		<div class = "naslov_mastermind"> <h2> Master Minds </h2></div>
		<form  method="post" action="<?= site_url("Home/registrujModeratora")?>" size = "100%">
		<table size = "100%" align = "center">
		<tr>
		<td> <p>Korisnicko ime &nbsp &nbsp </p>  </td>
		<td> <input type="text" value="<?php if(!empty($_SESSION['username2'])) echo $_SESSION['username2']; $_SESSION['username2']=""; ?>" name = "reg_mod_username" placeholder="Unesite Korisnicko Ime" required> </td>
		</tr>
                <tr>
                        <td>
                            <p style="font-size:11px" style="background-color:white">

                            <?php if(!empty($_SESSION['usernamePoruka']))
                               echo $_SESSION['usernamePoruka'];
                                $_SESSION['usernamePoruka']="";
                            ?>


                        </p>
                        </td>


                    </tr>

		<tr>
		<td> <p>Ime </p> </td>
		<td> <input type="text" value="<?php if(!empty($_SESSION['ime2'])) echo $_SESSION['ime2']; $_SESSION['ime2']=""; ?>" name = "reg_mod_ime" placeholder="Unesite Ime" required></td>
		</tr>

		<tr>
		 <td><p>Prezime </p></td>
		 <td><input type="text" value="<?php if(!empty($_SESSION['prezime2'])) echo $_SESSION['prezime2']; $_SESSION['prezime2']=""; ?>" name = "reg_mod_prezime" placeholder="Unesite Prezime" required> </td>
		 </tr>

		 <tr>
		 <td><p>E-mail </p> </td>
		 <td><input type="email" name = "reg_mod_email" placeholder="Unesite E-mail"  value="<?php if(!empty($_SESSION['email2'])) echo $_SESSION['email2']; $_SESSION['email2']=""; ?>" required/> </td>
		 </tr>

                  <tr>
                        <td>
                            <p style="font-size:11px" style="background-color:white">

                            <?php if(!empty($_SESSION['emailPoruka']))
                               echo $_SESSION['emailPoruka'];
                                $_SESSION['emailPoruka']="";
                            ?>


                        </p>
                        </td>


                    </tr>

		  <tr>
		 <td>  <p>Lozinka </p> </td>
		 <td> <input type="password" name = "reg_mod_lozinka" placeholder="Unesite Lozinku" required> </td>
		 </tr>

		 <tr>
		 <td><p>Biografija </p> </td>
		 <td><textarea name="reg_mod_biografija" id="" cols="45" rows="10" style = "color: white;" required><?php if(!empty($_SESSION['biografija'])) echo $_SESSION['biografija']; $_SESSION['biografija']=""; ?></textarea></td>
		 </tr>

		 <tr>
		 <td> <p> Kategorija </p> </td>
		 <td > <select name="opcija" id="kategorije">
                    <option value="8" name="8" class = "opcija" <?php if($_SESSION['opcija'] == 8) {$_SESSION['opcija'] =""; echo 'selected'; } ?> > Biologija</option>
                    <option value="7" name="7" class = "opcija" <?php if($_SESSION['opcija'] == 7) {$_SESSION['opcija'] =""; echo 'selected'; } ?> >Istorija</option>
                    <option value="3" name="3" class = "opcija"  <?php if($_SESSION['opcija'] == 3) {$_SESSION['opcija'] =""; echo 'selected'; } ?> >Geografija</option>
                    <option value="4" name="4" class = "opcija"  <?php if($_SESSION['opcija'] == 4) {$_SESSION['opcija'] =""; echo 'selected'; } ?> >Prirodne nauke</option>
                     <option value="2" name="2" class = "opcija"  <?php if($_SESSION['opcija'] == 2) {$_SESSION['opcija'] =""; echo 'selected'; } ?> >Muzika</option>
                    <option value="9" name="9" class = "opcija"  <?php if($_SESSION['opcija'] == 9) {$_SESSION['opcija'] =""; echo 'selected'; } ?> >Umetnost</option>
                    <option value="6" name="6" class = "opcija"  <?php if($_SESSION['opcija'] == 6) {$_SESSION['opcija'] =""; echo 'selected'; } ?>  >Sport</option>
                    <option value="5" name="5" class = "opcija"  <?php if($_SESSION['opcija'] == 5) {$_SESSION['opcija'] =""; echo 'selected'; } ?> >Filmovi</option>
                      <option value="1"  name="1" class = "opcija"  <?php if($_SESSION['opcija'] == 1) {$_SESSION['opcija'] =""; echo 'selected'; } ?>  >Serije</option>

                </select></td>
		 </tr>


		 <tr> </tr>
		 <td colspan = "2" align = "center">
		 <input type="submit" name = "klik_reg_mod" value="Posalji zahtjev">
		 </td>

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
	</div>
    </body>


</html>
