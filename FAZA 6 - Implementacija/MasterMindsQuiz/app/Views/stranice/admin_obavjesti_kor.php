<!--Marija Lalic 0616/17-->
<!DOCTYPE html>
<html>
<head>
<title> Obavijesti Igraca </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
</head>

<script>


//klikom na dugme dugme_reset_poeni svim igracima se resetuju ostvareni bodovi
$(document).on('click', '.dugme_reset_poeni', function(){
if(confirm("Da li ste sigurni da ste pronasli MasterMind-a i zelite da resetujete poene?"))
{
$.ajax({
url:"../../Admin/reset_poeni",
method:"post",
dataType: "text",
error: function(ts) { alert(ts.responseText) },
success:function(data){
alert(data);

}
});
}
else
{
return false;
}

});//end_reset_poeni
</script>

<body>
<div  style = "margin-top: 490px; margin-left: 100px; position: fixed">
      <a href="<?= site_url("Admin/index")?>"> Nazad</a>
</div>
<div class = "naslov_mastermind" style = "position: relative;  margin-top: 100px; font-size: 30px; z-index: 111;"> <h2> Obavjestenje </h2></div>
<img src="<?php echo base_url('slike/pink.png') ?>" alt = "nope" class ="user" style = "z-index: 110; position: relative; margin-top: -36px;">

<div class="container" id = "prikaz_pitanja" style = "margin-top: 60px; width: 60%;" >
<table style = "background: rgba(000, 000, 000, 0.6);  width: 100%; margin-top: -150px; padding: 0 10em 10em 0;  border-spacing: 1em .5em;" >
<form name="email_form" action="<?= site_url("Admin/emailSubmit") ?>" method="post">

<tr>  <td>  &nbsp;  </td></tr>
<tr>  <td>  &nbsp;  </td></tr>
<tr>  <td>  &nbsp;  </td></tr>

<tr>
<td>
<label  style = "color: white"> <i>Username:</i> </label>
</td>
</tr>

<tr>
<td>
<input    name="username" style = "background: transparent; font-weight: bold; width: 60%; color: white; "  placeholder="Molim Vas unesite username" value = "<?php   if(!empty($username)) echo $username; ?>" >
</td>
</tr>

<tr style = "color: red;">
<td>
<?php
if(!empty($errors['username']))
echo $errors['username'];
else if(!empty($username_greska))
{
echo $username_greska;
}
?>
</td>
</tr>


<tr>
<td>

<label for="form_message"  style = "color: white"> <i>Poruka: </i></label>
<textarea id="form_message"  style = "background: transparent; color: white; font-weight: bold" name="message" class="form-control" placeholder="Molim Vas unesite poruku" rows="6"><?php if(!empty($poruka)) echo $poruka; ?></textarea>
</td>
</tr>

<tr style = "color: red;">
<td>
<?php  if(!empty($errors['message']))
echo $errors['message'];
?>
</td>
</tr>

<tr>
<td>   <?php  if(!empty($poruka_success))
echo "<div style = 'background: #b000e6; opacity: 0.4; color: white; height: 40px; font-weight: bold'>". $poruka_success ."</div>";
else if(!empty($poruka_error))
echo "<div style = 'background: red; opacity: 0.4; color: white; height: 40px; font-weight: bold'>". $poruka_error ."</div>";
?>
</td>
</tr>


<tr>
<td colspan = "4" align = "center">
<input class = "dugme_obavjesti"  type="submit"  style = "width: 150px; opacity: 100%" id = "" value="Posalji">
</td>
</tr>

</form>
</table>

<br /><br /> <br />
<table style = "color:white">
<tr>
<td>
<i> Ako su pobjednici ovog mjeseca obavjesteni o ucescu u emisiji "MasterMinds",
klikom na dugme reset ponistavamo poene svih igraca u potrazi za novim <u>MASTERMIND-om!</u>
</i>
<br /><br />
</td>
</tr>
<tr>
<td>
<center>
<input class = "btn btn-default dugme_reset_poeni"  type="submit"  style = "width: 150px; opacity: 100%; border-radius:20px; color: black; font-weight: bold" id = "" value="RESET">
</center>
</td>
</tr>
</table>

</div> <!--end_container-->
</body>
</html>
