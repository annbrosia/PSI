<!--Marija Lalic 0616/17-->
<!DOCTYPE html>
<html>
<head>
<title> Pitanja Moderatora </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
</head>

<script>

//funkcija za dohvatanje broja pitanja koja postoje u bazi
function ukupno_pitanjaa()
{
var uk = 0;
$.ajax({
async: false,
url: "../../Admin/ukupno_pitanja",
method: "post",
error: function(ts) { alert(ts.responseText) },
success: function(data)
{
uk =  data;
}
});
return uk;
}//end_ukupno_pitanja


//funkcija koja omogucava da se klikom na dugme prikazi_vise prikazuje jos pitanja
$(document).ready(function(){
var uk_broj = ukupno_pitanjaa();
if(uk_broj>5)
{
cnt = 5;
flag_dugme = "prikazi_vise";
}
else
{
cnt = uk_broj;
flag_dugme = "nema_vise";
}
var ukupno = 2;
var count = 2;
if(uk_broj%2 ==0) paran = 1;
$(document).on('click', '.prikazi_vise', function(){
ukupno = cnt + 5;
cnt = 0;
$.ajax({
url: "../../Admin/prikazi_vise_pitanja",
method:"post",
dataType: "json",
data:{ukupno:ukupno},
error: function(ts) { alert(ts.responseText) },
success: function(data) {
var html = '';
var i =0;
for (i in data)
{
cnt=cnt+1;
html+= "<table style = 'background: rgba(000, 000, 000, 0.4); width: 100%;' ><tr align = 'center'>  <td colspan = '4'>  <font color = 'white' size = '3px'>  <label id = 'moderator'> <label id = 'broj'> <font size='6px'> " + cnt +". </font></label><i>" + data[i].username + "</i> (<label id = 'kategorija'><i>" + data[i].naziv + "</i></label>): </label> </u></font>  </td></tr> <tr align = 'center'>"+
"<td>  <label id = 'pitanje'> <font color = 'white' style = 'opacity: 2;'><i> " + data[i].tekstPitanja + "</i> </font></label>  </td>   </tr>      <tr><td> <div class='form-group has-success has-feedback'>"+
"<input type='text' class='form-control' id='tacan_odg' style ='color: green;' value= '" + data[i].tacan + "'  disabled>  <span class='glyphicon glyphicon-ok form-control-feedback'></span>  </div>    </td>  </tr>  <tr>    <td>      <div class='form-group has-error has-feedback'>         <input type='text' class='form-control' id='pogresan_odg1' style ='color: red; opacity: 0.4' value= '" + data[i].netacan1 +  "' disabled> "+
"<span class='glyphicon glyphicon-remove form-control-feedback'></span> </div>  </td> "+
"</tr>  <tr>    <td>   <div class='form-group has-error has-feedback' >   <input type='text' class='form-control' id='pogresan_odg2' style ='color: red; opacity: 0.4'  value= '" + data[i].netacan2 + "' disabled>  <span class='glyphicon glyphicon-remove form-control-feedback'></span>      </div>    </td>  </tr>  <tr>    <td>      <div class='form-group has-error has-feedback'>  "+
"<input type='text' class='form-control' id='pogresan_odg3' style ='color: red; opacity: 0.4'  value= '" + data[i].netacan3 + "'  disabled>        <span class='glyphicon glyphicon-remove form-control-feedback'></span>      </div>    </td>  </tr>  <tr>    <td  colspan = '4'>    <center>      <button type='submit' class='dugme_obrisi' id =  "+ data[i].idPitanja +"></span> Obrisi</button>    </center>    </td>  </tr> </table> <br /> <br /> <br /> ";
}
if(ukupno<uk_broj)
{
html+=    "<center> <button type='submit' class='prikazi_vise' id = 'hope' style = 'width: 300px; margin-bottom: 100px; visibility: visible'></span> Prikazi vise</button> </center>";
flag_dugme = "prikazi_vise";
}
else
{
html+= "<table style = 'background: rgba(000, 000, 000, 0.4); width: 100%;' > <tr> <td> &nbsp; </td></tr><tr align = 'center'> <td> <font color = 'white' size = '3px'> <b> Nema vise pitanja </b> </font> </td> </tr><tr> <td> &nbsp; </td> </table> <br /> <br /> <br />";
flag_dugme = "nema_vise";
}
$('#prikaz_pitanja').html(html);
}
});
});


//funkcija koja omogucava da se klikom na dugme obrisi_pitanje pitanje obrise iz baze
//potom se ispisu pitanja ponovo(bez tog)
$(document).on('click', '.dugme_obrisi', function(){
cnt--;
uk_broj--;
var pit_id = $(this).attr("id");
$.ajax({
url: "../../Admin/obrisi_pitanje",
method:"post",
dataType: "json",
data:{pit_id:pit_id, ukupno_broj: cnt},
error: function(ts) { alert(ts.responseText) },
success: function(data) {
var html = '';
var i =0;
var cnt1 = 0;
for (i in data)
{
cnt1=cnt1+1;
html+= "<table style = 'background: rgba(000, 000, 000, 0.4); width: 100%;' ><tr align = 'center'>  <td colspan = '4'>  <font color = 'white' size = '3px'>  <label id = 'moderator'> <label id = 'broj'> <font size='6px'> " + cnt1 +". </font></label><i>" + data[i].username + "</i> (<label id = 'kategorija'><i>" + data[i].naziv + "</i></label>): </label> </u></font>  </td></tr> <tr align = 'center'>"+
"<td>  <label id = 'pitanje'> <font color = 'white' style = 'opacity: 2;'><i> " + data[i].tekstPitanja + "</i> </font></label>  </td>   </tr>      <tr><td> <div class='form-group has-success has-feedback'>"+
"<input type='text' class='form-control' id='tacan_odg' style ='color: green;' value= '" + data[i].tacan + "'  disabled>  <span class='glyphicon glyphicon-ok form-control-feedback'></span>  </div>    </td>  </tr>  <tr>    <td>      <div class='form-group has-error has-feedback'>         <input type='text' class='form-control' id='pogresan_odg1' style ='color: red; opacity: 0.4' value= '" + data[i].netacan1 +  "' disabled> "+
"<span class='glyphicon glyphicon-remove form-control-feedback'></span> </div>  </td> "+
"</tr>  <tr>    <td>   <div class='form-group has-error has-feedback' >   <input type='text' class='form-control' id='pogresan_odg2' style ='color: red; opacity: 0.4'  value= '" + data[i].netacan2 + "' disabled>  <span class='glyphicon glyphicon-remove form-control-feedback'></span>      </div>    </td>  </tr>  <tr>    <td>      <div class='form-group has-error has-feedback'>  "+
"<input type='text' class='form-control' id='pogresan_odg3' style ='color: red; opacity: 0.4'  value= '" + data[i].netacan3 + "'  disabled>        <span class='glyphicon glyphicon-remove form-control-feedback'></span>      </div>    </td>  </tr>  <tr>    <td  colspan = '4'>    <center>      <button type='submit' class='dugme_obrisi' id =  "+ data[i].idPitanja +"></span> Obrisi</button>    </center>    </td>  </tr> </table> <br /> <br /> <br /> ";
}
if(flag_dugme == "prikazi_vise")
{
html+=    "<center> <button type='submit' class='prikazi_vise' id = 'hope' style = 'width: 300px; margin-bottom: 100px; visibility: visible'></span> Prikazi vise</button> </center>";
}
else  if(flag_dugme == "nema_vise")
{
html+= "<table style = 'background: rgba(000, 000, 000, 0.4); width: 100%;' > <tr> <td> &nbsp; </td></tr><tr align = 'center'> <td> <font color = 'white' size = '3px'> <b> Nema vise pitanja </b> </font> </td> </tr><tr> <td> &nbsp; </td> </table> <br /> <br /> <br />";
}
$('#prikaz_pitanja').html(html);
}
});
});
});//end_prikazi_vise

</script>



<body>
<div  style = "margin-top: 490px; margin-left: 100px; position: fixed">
        <a href="<?= site_url("Admin/index")?>"> Nazad</a>
</div>
<div class = "naslov_mastermind" style = "position: relative;  margin-top: 100px; font-size: 30px"> <h2> Pitanja </h2></div>
<img src="<?php echo base_url('slike/pink.png') ?>" alt = "nope" class ="user" style = "z-index: -10; position: relative; margin-top: -30px;">

<div class="container" id = "prikaz_pitanja" style = "margin-top: 60px; width: 60%;" >
<?php
$ukup = sizeof($pitanja); //ukup = ukupno pitanja u bazi
if($ukup <= 5)  $uk = $ukup; //uk = koliko pitanja zelimo da prikazemo
else $uk = 5;

for($i = 0; $i<$uk; $i++)
{
?>
<table  style = "background: rgba(000, 000, 000, 0.4); width: 100%;" >
<tr align = "center">
<td >
<font color = "white" size = "3px">  <label id = "moderator"> <label id = "broj"> <font size="6px"> <?php $inc = $i+1; echo "$inc." ?></font></label>
<i> <?php echo"{$pitanja[$i]->username}" ?> </i> (<label id = "kategorija"><i> <?php echo"{$pitanja[$i]->naziv}" ?> </i></label>): </label> </font>
</td>
</tr>
<tr align = "center">
<td>
<label id = "pitanje"> <font color = "white" style = "opacity: 2;"><i> <?php echo "{$pitanja[$i]->tekstPitanja}" ?></i> </font></label>
</td>
</tr>


<tr>
<td>
<div class="form-group has-success has-feedback">
<input type="text" class="form-control" id="tacan_odg" style ="color: green;" value= '<?php echo $pitanja[$i]->tacan; ?>' disabled>
<span class="glyphicon glyphicon-ok form-control-feedback"></span>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group has-error has-feedback">
<input type="text" class="form-control" id="pogresan_odg1" style ="color: red; opacity: 0.4" value= "<?php echo $pitanja[$i]->netacan1 ?>" disabled>
<span class="glyphicon glyphicon-remove form-control-feedback"></span>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group has-error has-feedback" >
<input type="text" class="form-control" id="pogresan_odg2" style ="color: red; opacity: 0.4"   value= "<?php echo $pitanja[$i]->netacan2 ?>" disabled>
<span class="glyphicon glyphicon-remove form-control-feedback"></span>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group has-error has-feedback">
<input type="text" class="form-control" id="pogresan_odg3" style ="color: red; opacity: 0.4"   value= "<?php echo $pitanja[$i]->netacan3 ?>" disabled>
<span class="glyphicon glyphicon-remove form-control-feedback"></span>
</div>

</td>
</tr>

<tr>
<td  colspan = "4">
<center>
<button type="submit" class="dugme_obrisi" id = <?php echo "{$pitanja[$i]->idPitanja}" ?>  ></span> Obrisi</button>
</center>
</td>
</tr>
</table>

<br /> <br /> <br />
<?php }
?>

<?php if($ukup<=5) {?>
<table style = 'background: rgba(000, 000, 000, 0.4); width: 100%;' > <tr> <td> &nbsp; </td></tr><tr align = 'center'> <td> <font color = 'white' size = '3px'> <b> Nema vise pitanja </b> </font> </td> </tr><tr> <td> &nbsp; </td><tr>
</tr> </table> <br /> <br />

<?php } else if($ukup >5) {?>
<center>
<button type="submit" class="prikazi_vise" style = "width: 300px; margin-bottom: 100px; visibility: visible" ></span> Prikazi vise</button>
</center>
<?php } ?>


</div> <!--end_container-->
</body>
</html>
