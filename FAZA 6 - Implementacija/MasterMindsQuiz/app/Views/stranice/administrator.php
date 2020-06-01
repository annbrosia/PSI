<!-- Prototip: Martina Markovic 0672/17, Marija Lalic 0616/17-->
<!-- Implementacija: Marija Lalic 0616/17-->

<!DOCTYPE html>
<html>
<head>
<title> Administrator Home Page </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
</head>
<body >


<div class="container">
<div class='row'>
<div class='col-sm-3'>
<p id='par1' class ="glow" ></p>

<br>  <br> <br>
<img src="<?php echo base_url('slike/logo_master.png'); ?>" style = "width: '100%'; margin-top: 30px; " >
</div>

<div class='col-sm-6 text-center ' id='osnovni_meni'>
<br> <br> <br> <br>
<a href='<?php echo site_url('Admin/rang') ?>' class='linkovi' id='m3'> Rang lista </a>
<br>
<a href = "<?php echo site_url('Admin/zahtjevi_prikaz') ?>" class='linkovi' id="registruj_moderatora_link">Registruj moderatora</a>
<br>
<a href = "<?php echo site_url('Admin/moderatori_prikaz') ?>" class='linkovi' >Ukloni moderatora</a>
<br>
<a href= "<?php echo site_url('Admin/pitanja_prikaz') ?>" class='linkovi' id="prikazi_pitanja_link">Pitanja moderatora</a>
<br>
<a href="<?php echo site_url('Admin/obavjesti_prikaz') ?>" class='linkovi' >Obavesti korisnika</a>
<br>
<a href="<?php echo site_url('Admin/komentari_prikaz') ?>" class='linkovi' id="komentari_korisnika_link">Komentari korisnika</a>
<br>
<a href="<?php  echo site_url('Admin/ukloni_prikaz') ?>" class='linkovi' id="ukloni_korisnika_link">Ukloni korisnika</a>
<br>
<a href= <?php echo site_url('Home/odjava') ?> class='linkovi' id='m5' > ODJAVA </a>
<br>
</div>


<div class='col-sm-3' style = "color: white;">
  <br>
<br>
<br>
<br>

<br>
<center>  <h2><i>Dobrodosli, <?php  if(!empty($_SESSION['ulogovaniKorisnik'])) echo $_SESSION['ulogovaniKorisnik']; ?> !</i></h2></center>
  Da biste mogli uspjesno da vodite Master Minds imate mogucnost:
  <br />
  <p id='p1'>
      Da izaberete zahtjeve onih koji zele da budu moderatori i da odobrite one koji vam se najvise svidjaju. Na taj nacin registrujete
      moderatora.
  </p>
  <p>
      Takodje, imate mogucnost uklanjanja postojecih moderatora i njihovih pitanja, mozete da pogledate kako korisnici komentarisu ovaj sajt.
     Mozete najbolje da obavjestite o ucescu u emisiju i da resetujete poene kad pronadjete <b><i>Master Mind-a</i></b>.
      <br>
  </p>
  <br>
  <br>

  <p>

  </p></div>

</div>
</div> <!--end_container-->
</body>
</html>
