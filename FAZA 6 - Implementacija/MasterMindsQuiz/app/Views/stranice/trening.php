<html>
    <head>
        
        <title>Trening</title>
        <style>
            @import "https://fonts.googleapis.com/css?family=Trade+Winds&display=swap";


            body {
              background-image: url("<?php echo base_url('slike/kosmos.jpg')?>");
              z-index: -1;
                background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: 100% 100%;
            }

            h2{
                text-align: center;

            }
            body{
                background-color:white;
            }
            #dugme{
                margin-left: 380px;
            }
            a{
                font-size: 15px;
                    color: white;
                    font-family: 'Trade Winds', cursive;

            }

            a:hover{
                font-size: large;
                    color: white;

            }
            a:active{
                    color:white;
            }
            .nasa{
                margin-left: 100px;
            }
            .linkovi{
                font-size: 40px;


            }
            a.linkovi:hover{
                font-size:49px ;
                    -webkit-animation: glow 1s ease-in-out infinite alternate;
              -moz-animation: glow 1s ease-in-out infinite alternate;
              animation: glow 1s ease-in-out infinite alternate;
            }
             #par1{
                padding: 0cm;
             }



             .modal-header, h4, .close {
                background-color: #5cb85c;
                color:white !important;
                text-align: center;
                font-size: 30px;
              }
              .modal-footer {
                background-color: #f9f9f9;
              }

              .logofront{
                      z-index: 10;
              }

              .bijelip{
                      color: white;
              }


            /*logovanje*/


            .loginBox
            {
                    position:absolute;
                    top:50%;
                    left:50%;
                    transform: translate(-50%, -50%);
                    width:350px;
                    height:500px;
                    padding:80px 40px;
                    box-sizing: border-box;
                    background:rgba(0,0,0,0.5);
            }


            .naslov_mastermind h2
            {
                    margin:0;
                    padding:0 0 20px;
                    color: white;
                    text-align:center;
                    -webkit-animation: glow 0.9s ease-in-out infinite alternate;
              -moz-animation: glow 0.9s ease-in-out infinite alternate;
              animation: glow 0.9s ease-in-out infinite alternate;
              font-family: 'Trade Winds', cursive;
            }



            .loginBox p
            {
                    padding:0;
                    margin:0;
                    font-weight:bold;
                    color:#fff;
                    font-family: sans-serif;
            }



            .loginBox input
            {

                    width:100%;
                            margin-bottom: 20px;

            }
            .loginBox input[type="text"], .loginBox input[type="password"]
            {
                    border: none;
                    border-bottom: 1px solid #fff;
                    background: transparent;
                    outline:none;
                    height:40px;
                    color:#fff;
                    font-size: 16px;

            }

            td
            {
                    padding: 3px;
            }


            .loginBox input[type="submit"]
            {
                    outline:none;
                    height: 40px;
                    font-size:16px;
                color: white;
                font-weight: bold;
                    font-family: sans-serif;
                    cursor:pointer;
                    border-radius:20px;
                background-color: #b000e6;
                border: 10px solid transparent;
                      font-family: 'Trade Winds', cursive;


            }



            .loginBox input[type="submit"]:hover
            {
                     background-color: #ceffd0;
                -webkit-animation: breathing 1s infinite;
                        animation: breathing 1s infinite;
                -webkit-box-shadow: 0px 0px 17px 0px #b000e6;
                        box-shadow: 0px 0px 18px 0px #483080;
                        box-shadow: 0px 0px 19px 0px #c74dff;

                                    color: b000e6;

            }


            .loginBox a
            {
                    color: #fff;
                    font-size:14px;
                    font-weight:bold;
                font-family:sans-serif;

            }


            .words_login p
            {
                    color: #fff;
                    font-size:14px;
                    font-weight:bold;

            }
            ::placeholder
            {
                    color:rgba(255,255,255,0.5);
            }


            .user
            {
                    width:100px;
                    height:100px;
                    overflow:hidden;
                    position:absolute;
                    top:calc(-100px/2);
                    left:calc(50% - 50px);
                    border-radius:50%;

            }




            /*kraj logovanje*/



            /*registracija*/

            .regBox
            {
                    margin-top: 30px;
                    position:absolute;
                    top:50%;
                    left:50%;
                    transform: translate(-50%, -50%);
                    width:600px;
                    height:580px;
                    padding:80px 40px;
                    box-sizing: border-box;
                    background:rgba(0,0,0,0.5);
            }


            .naslov_mastermind h2
            {
                    margin:0;
                    padding:0 0 20px;
                    color: white;
                    text-align:center;
                    -webkit-animation: glow 0.9s ease-in-out infinite alternate;
              -moz-animation: glow 0.9s ease-in-out infinite alternate;
              animation: glow 0.9s ease-in-out infinite alternate;
              font-family: 'Trade Winds', cursive;
            }



            .regBox p
            {
                    padding:0;
                    margin:0;
                    font-weight:bold;
                    color:#fff;
                    font-family: sans-serif;
            }



            .regBox input
            {
                    width:100%;
                    margin-bottom: 20px;
            }
            .regBox input[type="text"], .regBox input[type="password"]
            {
                    border: none;
                    border-bottom: 1px solid #fff;
                    background: transparent;
                    outline:none;
                    height:40px;
                    color:#fff;
                    font-size: 16px;
            }



            .regBox input[type="submit"]
            {
                    outline:none;
                    height: 40px;
                    font-size:16px;
                color: white;
                font-weight: bold;
                    font-family: sans-serif;
                    cursor:pointer;
                    border-radius:20px;
                background-color: #b000e6;
                border: 10px solid transparent;
                    font-family: 'Trade Winds', cursive;


            }
            .opcija{

                    color:rgba(255,255,255,0.5);
                    background-color: #b000e6;
            }


            .regBox input[type="submit"]:hover
            {
                     background-color: #ceffd0;
                -webkit-animation: breathing 1s infinite;
                        animation: breathing 1s infinite;
                -webkit-box-shadow: 0px 0px 17px 0px #b000e6;
                        box-shadow: 0px 0px 18px 0px #483080;
                        box-shadow: 0px 0px 19px 0px #c74dff;

                                    color: b000e6;

            }


            .regBox a
            {
                    color: #fff;
                    font-size:14px;
                    font-weight:bold;
                font-family:sans-serif;

            }

            ::placeholder
            {
                    color:rgba(255,255,255,0.5);
            }

            /*kraj registracija*/


            /*registracija moderatora*/

            .regBoxRM
            {
                    margin-top: 146px;
                position:absolute;
                    top:50%;
                    left:50%;
                    transform: translate(-50%, -50%);
                    width:600px;
                    height:809px;
                    padding:80px 40px;
                    box-sizing: border-box;
                    background:rgba(0,0,0,0.5);

            }

            textarea{
                    border-bottom: 1px solid #fff;
                    background: transparent;
                    color: rgba(255,255,255,0.5);
                    resize: none;
            }

            .regBoxRM select
            {
                    border: none;
                    border-bottom: 1px solid #fff;
                    background: transparent;
                    outline:none;
                    height:40px;
                    color:rgba(255,255,255,0.5);
                    font-size: 16px;
                margin-bottom: 20px;
                width: 100%;
            }

            .regBoxRM p
            {
                    padding:0;
                    margin:0;
                    font-weight:bold;
                    color:#fff;
                    font-family: sans-serif;
            }



            .regBoxRM input
            {
                    width:100%;
                    margin-bottom: 20px;
            }

            .regBoxRM input[type="text"], .regBoxRM input[type="password"]
            {
                    border: none;
                    border-bottom: 1px solid #fff;
                    background: transparent;
                    outline:none;
                    height:40px;
                    color:#fff;
                    font-size: 16px;
            }



            .regBoxRM input[type="submit"]
            {
                    outline:none;
                    height: 40px;
                    font-size:16px;
                color: white;
                font-weight: bold;
                    font-family: sans-serif;
                    cursor:pointer;
                    border-radius:20px;
                background-color: #b000e6;
                border: 10px solid transparent;
                    font-family: 'Trade Winds', cursive;
                    width: 400px;



            }
            .opcija{

                    color:rgba(255,255,255,0.5);
                    background-color: #b000e6;
            }


            .regBoxRM input[type="submit"]:hover
            {
                     background-color: #ceffd0;
                -webkit-animation: breathing 1s infinite;
                        animation: breathing 1s infinite;
                -webkit-box-shadow: 0px 0px 17px 0px #b000e6;
                        box-shadow: 0px 0px 18px 0px #483080;
                        box-shadow: 0px 0px 19px 0px #c74dff;

                                    color: b000e6;

            }


            .regBoxRM a
            {
                    color: #fff;
                    font-size:14px;
                    font-weight:bold;
                font-family:sans-serif;

            }

            ::placeholder
            {
                    color:rgba(255,255,255,0.5);
            }

            /*kraj registracija moderatora*/

            @-webkit-keyframes glow {
              from {
                text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #b000e6, 0 0 40px #483080, 0 0 50px #824dff, 0 0 60px #e60073, 0 0 70px #824dff;
              }

              to {
                text-shadow: 0 0 20px #fff, 0 0 30px #c74dff, 0 0 40px #c74dff, 0 0 50px #c74dff, 0 0 60px #ff4da6, 0 0 70px #c74dff, 0 0 150px #483080;
              }
            }  
            /*drugiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii*/
            
            
            body{
                margin:0;
                padding:0;
            }
            section{
                height: 100vh;
                background: #000;
                overflow: hidden;

            }
            section::before{
                content: '';
                position: absolute;
                top:0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to right, #f00,#f00,#0f0,#0ff,#ff0,#0ff);
                mix-blend-mode: color;
                pointer-events: none;
            }
            video{
                object-fit: cover;
            }
            h1{
                margin: 0;
                padding: 0;
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 100%;
                text-align: center;
                color: #fff;
                font-size: 5em;
                font-family:sans-serif;
                text-transform: uppercase;
            }
            h1 span{
                display: inline-block;
                animation: animate 1s linear forwards;
            }
            @keyframes animate{
                0%{
                    opacity: 0;
                    transform: rotateY(90deg);
                    filter: blur(10px)
                }
                100%{
                    opacity: 1;
                    transform: rotateY(0deg);
                    filter:blur(0)
                }
            }
            h1 span:nth-child(1){
                color:#186aa0;
                opacity: 0;
                animation-delay: 2s;
            }
            h1 span:nth-child(2){
                opacity: 0;
                animation-delay: 2.5s;
            }
            h1 span:nth-child(3){
                opacity: 0;
                animation-delay: 2.75s;
            }
            h1 span:nth-child(4){
                opacity: 0;
                animation-delay: 3s;
            }
            h1 span:nth-child(5){
                color:#186aa0;
                opacity: 0;
                animation-delay: 3.5s;
            }
            h1 span:nth-child(6){
                opacity: 0;
                animation-delay: 3.75s;
            }
            h1 span:nth-child(7){
                opacity: 0;
                animation-delay: 4s;
            }
            h1 span:nth-child(8){
                opacity: 0;
                animation-delay: 4.5s;
            }
            h1 span:nth-child(9){
                opacity: 0;
                animation-delay: 4.75s;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
    </head>
    <body>
        <div class='container'>
            <form name="treningForma" method="post" action="<?= site_url("Trening/izracunajPoeneTrening")?>">
                        <div class='row'>
                            <div class='col-sm-3'>
                                <p id='par1'>Ulogovan gost</p>
                                <br>
                                <br>
                                <br>

                                <img src="<?php echo base_url('slike/logo.png')?>" width='125%' >
                            </div>
                            <div class='col-sm-8 text-center '>
                                              <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <h2 style="color:white;">
                                            <?php if(!empty($_SESSION['tekstTrening'])) 
                                                echo $_SESSION['tekstTrening']; 
                                            ?>
                                </h2><BR>

                                <div class='row'>
                                    <div class='col-sm-4' style = "color: white;">

                                        <div class="radio">	  <input type="radio" name="izbor" value="<?php echo $_SESSION['tacan1Trening']; ?>" style="font-size:20px" style='color:white;'>  
                                            <?php if(!empty($_SESSION['tacan1Trening'])) 
                                                echo $_SESSION['tacan1Trening']; 
                                            ?>
                                            <br>
                                        </div>
                                    </div>
                                    <div class='col-sm-8' style = "color: white;">

                                        <div class="radio">  <input type="radio" name="izbor" value="<?php echo $_SESSION['netacan1Trening']; ?>" style="font-size:20px" style='color:white;'>  
                                            <?php if(!empty($_SESSION['netacan1Trening'])) 
                                                echo $_SESSION['netacan1Trening']; 
                                            ?>
                                            <BR>   
                                        </div>
                                    </div>

                                </div>


                                <br>
                                <br>

                                <div class='row'>
                                    <div class='col-sm-4' style = "color: white;">

                                        <div class="radio"> <input type="radio" name="izbor" value="<?php echo $_SESSION['netacan2Trening']; ?>" style="font-size:20px"  style='color:white;'>  

                                            <?php if(!empty($_SESSION['netacan2Trening'])) 
                                                echo $_SESSION['netacan2Trening']; 
                                            ?>
                                            <BR> 


                                        </div>
                                    </div>
                                    <div class='col-sm-8' style = "color: white;">

                                        <div class="radio"> <input type="radio" name="izbor" value="<?php echo $_SESSION['netacan3Trening']; ?>" style="font-size:20px"  style='color:white;'>  

                                            <?php if(!empty($_SESSION['netacan3Trening'])) 
                                                echo $_SESSION['netacan3Trening']; 
                                            ?>
                                            <BR>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class='row'>
                                    <div class='col-sm-9 text-right '>

                                        <button type= "submit " class= " btn btn-secondary"> Dalje</button>
                                    </div>

                                </div>

                            </div>
                    </div>
            </form>
        </div>
    </body>
</html>