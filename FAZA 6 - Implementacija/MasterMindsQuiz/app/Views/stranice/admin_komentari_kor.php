<!--Marija Lalic 0616/17-->
<!DOCTYPE html>
<html>
<head>
<title> Komentari Igraca </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
</head>

<script>



//funckija dohvata ukupan broj komentara u bazi
function ukupno_komentara()
{
var uk = 0;
$.ajax({
async: false,
url: "../../Admin/ukupno_komentara",
method: "post",
error: function(ts) { alert(ts.responseText) },
success: function(data)
{
uk =  data;
}
});
return uk;
}//end_ukupno_pitanja


//klikom na prikazi_vise_komentara prikazuje se jos komentara
$(document).ready(function(){
var uk_broj = ukupno_komentara();
var cnt = 5;
var ukupno;
$(document).on('click', '.prikazi_vise_komentara', function(){
ukupno = cnt + 5;
cnt = 0;
$.ajax({
url: "../../Admin/prikazi_vise_komentara",
method:"post",
dataType: "json",
data:{ukupno_kom:ukupno},
error: function(ts) { alert(ts.responseText) },
success: function(data) {
var html = '';
var i =0;
for (i in data)
{
cnt=cnt+1;
html+=    "<table style = 'background: rgba(000, 000, 000, 0.4); width: 100%;' ><tr align = 'center'>  <td >  <font color = 'white' size = '3px'>"+
"  <label id = 'moderator'>  " + data[i].username +" :  </label> </font>  </td></tr><tr align = 'center'>  <td>  <label id = 'komentar'> <font color = 'white' style = 'opacity: 2;'><i> "+ data[i].tekstKomentara +"</i> </font></label></td></tr> </table> <br /> <br /> <br />";
}
if(ukupno<uk_broj)
{
html+=    "<center> <button type='submit' class='prikazi_vise_komentara' id = 'hope' style = 'width: 300px; margin-bottom: 100px; visibility: visible'></span> Prikazi vise</button> </center>";
}
else
{
html+= "<center><table style = 'background: rgba(000, 000, 000, 0.4); width: 40%;> <tr> <td> &nbsp; &nbsp; </td></tr> <tr align = 'center'> <td> <font color = 'white' size = '3px'> <br /> <center>  <i> Nema vise komentara </i>   </center></font> </td> </tr><tr> <td> &nbsp; </td> </tr></table> </center> <br /> <br /> <br />";
}
$('#prikaz_komentara').html(html);

}
});
});
});

</script>



<body>
<div  style = "margin-top: 490px; margin-left: 100px; position: fixed">
        <a href="<?= site_url("Admin/index")?>"> Nazad</a>
</div>
<div class = "naslov_mastermind" style = "position: relative;  margin-top: 100px; font-size: 30px"> <h2> Komentari </h2></div>
<img src="<?php echo base_url('slike/pink.png') ?>" alt = "nope" class ="user" style = "z-index: -10; position: relative; margin-top: -30px;">

<div class="container" id = "prikaz_komentara" style = "margin-top: 60px; width: 60%;" >
<?php
$ukup = count($komentari); //ukup = ukupno pitanja u bazi
if($ukup <= 5)  $uk = $ukup; //uk = koliko pitanja zelimo da prikazemo
else $uk = 5;

for($i = 0; $i<$uk; $i++)
{
?>
<table  style = "background: rgba(000, 000, 000, 0.4); width: 100%;" >
<tr align = "center">
<td >
<font color = "white" size = "3px">  <label id = "moderator">
<?php echo"{$komentari[$i]->username}" ?> :  </label> </font>
</td>
</tr>
<tr align = "center">
<td>
<label id = "komentar"> <font color = "white" style = "opacity: 2;"><i> <?php echo "{$komentari[$i]->tekstKomentara}" ?></i> </font></label>
</td>
</tr>
</table>

<br /> <br /> <br />
<?php }
?>

<?php if($ukup<=5) {?>
<table style = 'background: rgba(000, 000, 000, 0.4); width: 100%;' > <tr> <td> &nbsp; </td></tr><tr align = 'center'> <td> <font color = 'white' size = '3px'> <b> Nema vise komentara </b> </font> </td> </tr><tr> <td> &nbsp; </td><tr>
</tr> </table> <br /> <br />

<?php } else if($ukup >5) {?>
<center>
<button type="submit" class="prikazi_vise_komentara" style = "width: 300px; margin-bottom: 100px; visibility: visible" ></span> Prikazi vise</button>
</center>
<?php } ?>


</div> <!--end_container-->
</body>
</html>
