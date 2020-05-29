<!--Marija Lalic 0616/17-->
<html>
<head>
<title> Ukloni Moderatora </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">


<script type="text/javascript">

//uzimamo moderatore iz baze i ispisujemo ih na stranici
function dohvati_moderatore(){
$.ajax({
url: "../../Admin/dohvati_moderatore",
method:"post",
dataType: "json",
error: function(ts) { alert(ts.responseText) },
success:function(data){
var html='';
var i;
for (i in data)
{
if(i ==0)
{
html+= "<div class='regBoxRM' style = 'position: relative; height: auto; width: 60%; padding: 30px 30px; margin-top: -145px'>  <table size = '100%' align = 'center' cellspacing = '100px'>  <tr><td> <p>Korisnicko ime </p>  </td><td> &nbsp;</td><td> &nbsp;</td><td> <p>"+ data[i].username + "</p> </td></tr><tr><td> <p> Kategorija </p> </td><td> &nbsp; </td><td> &nbsp;</td> <td> <p> "+ data[i].naziv +"</p> <td> </tr>"+
"<tr> <td> &nbsp; </td><td> &nbsp; </td><td> &nbsp; </td> <td> &nbsp; </td> </tr><tr><td colspan = '4' align = 'center'><input class = 'dugme_obrisi'  type='submit'value='Obrisi'  style = 'width: 150px;' id = " + data[i].idKorisnika + "></td></tr></table></div>";
}
else
{
html+= "<div class='regBoxRM' style = 'position: relative; height: auto; width: 60%; padding: 30px 30px; margin-top: 60px'>  <table size = '100%' align = 'center' cellspacing = '100px'>  <tr><td> <p>Korisnicko ime </p>  </td><td> &nbsp;</td><td> &nbsp;</td><td> <p>"+ data[i].username + "</p> </td></tr><tr><td> <p> Kategorija </p> </td><td> &nbsp; </td><td> &nbsp;</td> <td> <p> " + data[i].naziv + "</p> <td> </tr>"+
"<tr> <td> &nbsp; </td><td> &nbsp; </td><td> &nbsp; </td> <td> &nbsp; </td> </tr><tr><td colspan = '4' align = 'center'><input class = 'dugme_obrisi'  type='submit' value='Obrisi'  style = 'width: 150px;' id = " + data[i].idKorisnika + "></td></tr></table></div>";
}
}
$('#prikaz').html(html);
}//end_success
});//end_ajax
}//end_dohvati_zathjeve


//klikom na dugme_obrisi, id moderatora se proslijedi funkciji delete_moderator kako bi se obrisao
$(document).on('click', '.dugme_obrisi', function(){
var mod_id = $(this).attr("id");
$.ajax({
url: "../../Admin/delete_moderator",
method:"post",
data:{mod_id:mod_id},
error: function(ts) { alert(ts.responseText) },
success: function(data) {
dohvati_moderatore();
}
});
});//end_delete_moderator

</script>
</head>


<body>
<div  style = "margin-top: 490px; margin-left: 100px; position: fixed">
        <a href="<?= site_url("Admin/index")?>"> Nazad</a>
</div>
<div class = "naslov_mastermind" style = "position: relative;  margin-top: 100px; font-size: 30px"> <h2> Moderatori </h2></div>
<img src="<?php echo base_url('slike/pink.png') ?>" alt = "nope" class ="user" style = "z-index: -10; position: relative; margin-top: -30px;">


<div class = "container" style = "margin-top: 300px;" id = "prikaz">
<?php
for ($i = 0; $i < count($moderatori); $i++)
{
if ($i==0)
{
?>
<div class="regBoxRM" style = "position: relative; height: auto; width: 60%; padding: 30px 30px; margin-top: -145px">
<table size = "100%" align = "center" cellspacing = "100px">
<tr>
<td> <p>Korisnicko ime </p>  </td>
<td> &nbsp;</td>
<td> &nbsp;</td>
<td> <p> <?php echo "{$moderatori[$i]->username}" ?> </p> </td>
</tr>

<tr>
<td> <p> Kategorija </p> </td>
<td> &nbsp; </td>
<td> &nbsp;</td>
<td> <p> <?php echo "{$moderatori[$i]->naziv}" ?></p> <td>
</tr>

<tr>
<td> &nbsp; </td>
<td> &nbsp; </td>
<td> &nbsp; </td>
<td> &nbsp; </td>
</tr>


<tr>
<td colspan = "4" align = "center">
<input class = "dugme_obrisi"  type="submit"  style = "width: 150px;" id = <?php echo "{$moderatori[$i]->idKorisnika}" ?> value="Obrisi">
</td>
</tr>

</table>
</div>
<?php
}
else
{
?>
<div class="regBoxRM" style = "position: relative; height: auto; width: 60%; padding: 30px 30px; margin-top: 60px">
<table size = "100%" align = "center">

<tr>
<td> <p>Korisnicko ime </p>  </td>
<td> &nbsp;</td>
<td> &nbsp;</td>
<td> <p> <?php echo "{$moderatori[$i]->username}" ?></p> </td>
</tr>

<tr>
<td> <p> Kategorija </p> </td>
<td> &nbsp; </td>
<td> &nbsp;</td>
<td> <p> <?php echo "{$moderatori[$i]->naziv}" ?> </p> <td>
</tr>

<tr>
<td> &nbsp; </td>
<td> &nbsp; </td>
<td> &nbsp; </td>
<td> &nbsp; </td>
</tr>


<tr>
<td colspan = "4" align = "center">
<input class = "dugme_obrisi"  type="submit"  style = "width: 150px;" id = <?php echo "{$moderatori[$i]->idKorisnika}" ?> value="Obrisi">
</td>
</tr>


</table>
</div>
<?php  }?> <!--end_else-->
<?php } ?>
</div> <!--end_container-->
</body>
</html>
