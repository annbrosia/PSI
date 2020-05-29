<!--Marija Lalic 0616/17-->
<html>
<head>
<title> Zahtjevi Moderatora </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">


<script type="text/javascript">

/**
*dohvati_zahtjeve funkcija da uzmemo zahtjeve iz baze i ispisujemo ih na stranici
*/
function dohvati_zahtjeve(){
$.ajax({
url: "../../index.php/Admin/dohvati_zahtjeve",
method:"post",
dataType: "json",
error: function(ts) { alert(ts.responseText) },
success:function(data){
var html='';
var i;
var count= 1;
for(i in data)
{
if(i ==0)
{
html+=	"<div class='regBoxRM' style = 'position: relative; height: auto; width: 60%; padding: 30px 30px; margin-top: -145px'><table size = '100%' align = 'center' cellspacing = '100px'><tr>  <td> <p> Korisnicko ime </p>  </td>"+
"<td> <p>" + data[i].username+ "</p> </td></tr> <tr><td> <p> Kategorija </p> </td> <td> <p> " + data[i].naziv + "</p> <td></tr> <tr>  <td><p>Biografija </p> </td>"+"<td><p>"+data[i].biografija +"</p></td></tr> <tr> <td> &nbsp; </td><td> &nbsp; </td></tr><tr>   <td colspan = '2' align = 'center'><input  class = 'dugme_prihvati' type='submit'  value='Prihvati' style = 'width: 150px; margin-right: 5px'  id =" + data[i].idZahteva + "><input class = 'dugme_odbij' type='submit' value='Odbij' style = 'width: 150px;'  id =" +data[i].idZahteva +"></td></tr></table></div>	";
}
else
{
html+=	"<div class='regBoxRM' style = 'position: relative; height: auto; width: 60%; padding: 30px 30px; margin-top: 60px'><table size = '100%' align = 'center' cellspacing = '100px'><tr>  <td> <p> Korisnicko ime </p>  </td>"+
"<td> <p>" + data[i].username+ "</p> </td></tr> <tr><td> <p> Kategorija </p> </td> <td> <p> "+ data[i].naziv +"</p> <td></tr> <tr>  <td><p>Biografija </p> </td>"+"<td><p>"+data[i].biografija +"</p></td></tr> <tr> <td> &nbsp; </td><td> &nbsp; </td></tr><tr>   <td colspan = '2' align = 'center'><input  class = 'dugme_prihvati' type='submit'  value='Prihvati' style = 'width: 150px; margin-right: 5px;'  id =" + data[i].idZahteva + "><input class = 'dugme_odbij' type='submit' value='Odbij' style =  'width: 150px;'  id =" +data[i].idZahteva +"></td></tr></table></div>	";
}
}
$('#prikaz').html(html);
}//end_success
});//end_ajax
}//end_dohvati_zathjeve



//na klik dugmeta odbij zahtjev se brise iz baze
//a prikaze se stranica bez tog zahtjeva
$(document).on('click', '.dugme_odbij', function(){
var del_id = $(this).attr("id");
$.ajax({
url: "../../Admin/delete_zahtjev",
method:"post",
data:{del_id:del_id},
error: function(ts) { alert(ts.responseText) },
success: function(data) {
dohvati_zahtjeve();
}
});
});//end_delete_zahtjev


//na klik dugme_prihvati se zahtjev brise iz baze ali se azurira tabela korisnika i moderatora
//a prikaze se stranica bez tog zahtjeva
$(document).on('click', '.dugme_prihvati', function(){
var ins_id = $(this).attr("id");
$.ajax({
url:"../../Admin/insert_zahtjev",
method: "post",
data: {ins_id: ins_id},
error: function(ts) { alert(ts.responseText) },
success: function(data) {
dohvati_zahtjeve();
}
});
});//end_insert_zahtjev


</script>
</head>


<body>
  <div  style = "margin-top: 490px; margin-left: 100px; position: fixed">
         <a href="<?= site_url("Admin/index")?>"> Nazad</a>
  </div>
<div class = "naslov_mastermind" style = "position: relative;  margin-top: 100px; font-size: 30px"> <h2> Zahtjevi </h2></div>
<img src="<?php echo base_url('slike/pink.png') ?>" alt = "nope" class ="user" style = "z-index: -10; position: relative; margin-top: -30px;">




<div class = "container" style = "margin-top: 300px;" id = "prikaz">
<?php
for ($i = 0; $i < count($zahtjevi); $i++)
{
if ($i==0)
{
?>
<div class="regBoxRM" style = "position: relative; height: auto; width: 60%; padding: 30px 30px; margin-top: -145px">
<table size = "100%" align = "center" cellspacing = "100px">
<tr>
<td> <p> Korisnicko ime </p>  </td>
<td> <p> <?php echo $zahtjevi[$i]['username']; ?></p> </td>
</tr>


<tr>
<td> <p> Kategorija </p> </td>
<td> <p> <?php echo $zahtjevi[$i]['naziv']; ?></p> <td>
</tr>

<tr>
<td><p>Biografija </p> </td>
<td><p><?php echo $zahtjevi[$i]['biografija']; ?></p></td>
</tr>

<tr>
<td> &nbsp; </td>
<td> &nbsp; </td>
</tr>


<tr>
<td colspan = "2" align = "center">
  <input class = "dugme_prihvati"  type="submit"  style = "width: 150px;" id = <?php echo  $zahtjevi[$i]['idZahteva'];  ?> value="Prihvati">
  <input  class = "dugme_odbij" type="submit" style = "width: 150px;" id = <?php echo $zahtjevi[$i]['idZahteva']; ?> value="Odbij">
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
<td> <p> <?php echo $zahtjevi[$i]['username']; ?></p> </td>
</tr>


<tr>
<td> <p> Kategorija </p> </td>
<td> <p> <?php echo $zahtjevi[$i]['naziv']; ?></p> <td>
</tr>

<tr>
<td><p>Biografija </p> </td>
<td><p><?php echo $zahtjevi[$i]['biografija']; ?></p></td>
</tr>

<tr>
<td> &nbsp; </td>
<td> &nbsp; </td>
</tr>


<tr>
<td colspan = "2" align = "center">
<input class = "dugme_prihvati"  type="submit"  style = "width: 150px;" id = <?php echo  $zahtjevi[$i]['idZahteva'];  ?> value="Prihvati">
<input  class = "dugme_odbij" type="submit" style = "width: 150px;" id = <?php echo $zahtjevi[$i]['idZahteva']; ?> value="Odbij">
</td>
</tr>

</table>
</div>

<?php  }?> <!--end_else-->
<?php } ?>

</div> <!--end_container-->
<table>
<p>


</body>
</html>
