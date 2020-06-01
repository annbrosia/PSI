<!-- Ana Blazic,Ana Saponjic -->
<html>
    <head>
        <title> Master Minds</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/stil.css'); ?>">
    </head>


    <body>
        <div class="loginBox">
            <img class="user" src="<?php echo base_url('slike/pink.png')?>">
            <div class = "naslov_mastermind"> <h2> Master Minds </h2></div>
            <form name="loginForma" method="post" action="<?= site_url("Home/submit")?>">
                <input type="text"  value="<?php if(!empty($_SESSION['user'])) echo $_SESSION['user']; $_SESSION['user']=""; ?>" name = "korIme" placeholder="Korisnicko ime" required>
                <p style="font-size:11px">

                            <?php if(!empty($_SESSION['greskaPor']))
                               echo $_SESSION['greskaPor'];
                                $_SESSION['greskaPor']="";
                            ?>


                        </p>
                        <br/>
                <input type="password"  name = "lozinka" placeholder="Lozinka" required>
                 <p style="font-size:11px">
                    <?php if(!empty($_SESSION['lozinka']))
                       echo $_SESSION['lozinka'];
                       $_SESSION['lozinka']="";
                    ?></p>
<br />
                <input type="submit" name = "dugme" value="Uloguj se">

                <div class = 'words_login'>
                  <i>
                    <p>Zaboravili ste lozinku?   <a href="<?= base_url('Home/zaboravljenalozinka');?>">  Lozinka </a></p>
                    <p> Nemate nalog?  <a href="<?= site_url("Home/regIg")?>"> Registracija igraca</a> </p>
                    <p> Zelite biti moderator?   <a href="<?= site_url("Home/regMod")?>"> Registracija moderatora</a>  </p>
                  </i>
                </div>
                <br />


            </form>
            <div class = 'words_login'>
                &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <a href ="<?= site_url("Home/gost")?>">Nastavi kao gost</a>
            </div>
        </div>
    </body>
</html>
