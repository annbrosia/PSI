<!--Marija Lalic 0616/17-->

<!DOCTYPE html>
<html>
<head>
<title> Ukloni Korisnika </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
</head>

<script>

//funkcija za pretragu i prikaz podataka korisnika
$(document).ready(function(){
$('#pretraga').keyup(function(){
var txt = $(this).val();
if(txt != '')
{
$.ajax({
url: "../../Admin/pretraga_korisnika",
method:"post",
dataType: "json",
data:{search: txt},
error: function(ts) { alert(ts.responseText) },
success: function(data) {
var i = 0;
var html = '';
html += "<div class = 'table-responsive'><table class='table table-bordered' style = 'background: rgba(000, 000, 000, 0.4); color: white; font-weight: bold'>  <tr> <th> Username </th><th> Ime </th><th> Prezime </th><th> Email </th><th> Poeni </th> <th>&nbsp;  </th></tr>";
for(i in data)
{
html += "<tr> <td>" + data[i].username + "</td><td>"+ data[i].ime + "</td><td>" + data[i].prezime + "</td><td>" + data[i].email + "</td><td>" +  data[i].poeni +  "</td>  <td>" +
"<input class = 'dugme_obrisi2'  type='submit' value='Ukloni'  style = 'color: black; opacity: 0.6;' id = " + data[i].idKI + "> </td></tr>";
}
html+= "</table></div>";
$('#result').html(html);
}//end_success
});//end_ajax
}
else
{
$('#result').html('');
}//end_else

});
});

//klikom na dugme_obrisi2 brise se dati igrac
$(document).on('click', '.dugme_obrisi2', function(){
var kor_id_del = $(this).attr("id");
var tekst = $('#pretraga').val();
$.ajax({
url: "../../Admin/delete_igrac",
method:"post",
dataType: "json",
data:{kor_id_del:kor_id_del, search: tekst},
error: function(ts) { alert(ts.responseText) },
success: function(data) {
var i = 0;
var html = '';
html += "<div class = 'table-responsive'><table class='table table-bordered' style = 'background: rgba(000, 000, 000, 0.4); color: white; font-weight: bold'>  <tr> <th> Username </th><th> Ime </th><th> Prezime </th><th> Email </th><th> Poeni </th> <th>&nbsp;  </th></tr>";
for(i in data)
{
html += "<tr> <td>" + data[i].username + "</td><td>"+ data[i].ime + "</td><td>" + data[i].prezime + "</td><td>" + data[i].email + "</td><td>" +  data[i].poeni +  "</td>  <td>" +
"<input class = 'dugme_obrisi2'  type='submit' value='Ukloni'  style = 'color: black; opacity: 0.6;' id = " + data[i].idKI + "> </td></tr>";
}
html+= "</table></div>";
$('#result').html(html);
}
});
});//end_delete_moderator

</script>


<body>
<div  style = "margin-top: 490px; margin-left: 63px; position: fixed">
        <a href="<?= site_url("Admin/index")?>"> Nazad</a>
</div>
<div class = "naslov_mastermind" style = "position: relative;  margin-top: 100px; font-size: 30px"> <h2> Pretraga </h2></div>
<img src="<?php echo base_url('slike/pink.png') ?>" alt = "nope" class ="user" style = "z-index: -10; position: relative; margin-top: -30px;">

<div class="container" id = "prikaz_korisnika" style = "margin-top: 60px; width: 80%;" >
<div class="form-group" style = "background: rgba(000, 000, 000, 0.4); width: 100%; margin-top: -60px; " >
<label style = "color: white; font-weight: bold;"><span class="glyphicon glyphicon-user"></span> Korisnicko ime:</label>
<input type="text" id = "pretraga" name = "pretraga" class = "form-control" style = "background: transparent; color: white;" id="usrname" placeholder="Unesite korisnicko ime">
</div>

<div id="result">
</div>

<br /> <br /> <br />

</div> <!--end_container-->
</body>
</html>
