<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\IgracModel;
use App\Models\ModeratorModel;
use App\Models\ZahtevModeratoraModel;
use App\Models\PitanjeModel;

/**
 * Description of Trening
 *
 * @author Ana
 */


 /**
 * Trening – klasa za prikaz kviza iz odredjene kategorije i prikaz rezultata na kraju
 *
 * @version 1.0
 */
class Trening extends BaseController{
  /**
       * dohvatiPitanjeTrening funkcija koja redom dohvata pitanje iz vec generisanog
       * niza random pitanja i pamti ih u niz sesije
       *
       * @return void
  */
     public function dohvatiPitanjeTrening(){
       $svaPitanja = $_SESSION['pitanjaTrening'];
       $r = $_SESSION['cntTrening'];

            //echo "<script>console.log('Rand: " . $r . "' );</script>";
            //echo "<script>console.log('Sva pitanja:: " . $svaPitanja[$r]['tekstPitanja']. "' );</script>";
            $_SESSION['tekstTrening']=$svaPitanja[$r]['tekstPitanja'];
            $_SESSION['tacanTrening']=$svaPitanja[$r]['tacan'];
            $k=rand(1,4);
            switch ($k){
                case 1:
                        $_SESSION['tacan1Trening']=$svaPitanja[$r]['tacan'];
                        $_SESSION['netacan1Trening']=$svaPitanja[$r]['netacan1'];
                        $_SESSION['netacan2Trening']=$svaPitanja[$r]['netacan2'];
                        $_SESSION['netacan3Trening']=$svaPitanja[$r]['netacan3'];
                        break;
                case 2:
                        $_SESSION['tacan1Trening']=$svaPitanja[$r]['netacan1'];
                        $_SESSION['netacan1Trening']=$svaPitanja[$r]['tacan'];
                        $_SESSION['netacan2Trening']=$svaPitanja[$r]['netacan2'];
                        $_SESSION['netacan3Trening']=$svaPitanja[$r]['netacan3'];
                        break;
                case 3:
                        $_SESSION['tacan1Trening']=$svaPitanja[$r]['netacan1'];
                        $_SESSION['netacan1Trening']=$svaPitanja[$r]['netacan2'];
                        $_SESSION['netacan2Trening']=$svaPitanja[$r]['tacan'];
                        $_SESSION['netacan3Trening']=$svaPitanja[$r]['netacan3'];
                        break;
                case 4:
                        $_SESSION['tacan1Trening']=$svaPitanja[$r]['netacan1'];
                        $_SESSION['netacan1Trening']=$svaPitanja[$r]['netacan2'];
                        $_SESSION['netacan2Trening']=$svaPitanja[$r]['netacan3'];
                        $_SESSION['netacan3Trening']=$svaPitanja[$r]['tacan'];
                        break;

            }
        }

        /**
             * niz_random_pitanja_trening funkcija koja generise odredjen broj razlicitih pitanja
             *
             * @return Array
        */
        public function niz_random_pitanja_trening($id)
        {
          $pitanjeModel=new PitanjeModel();
          $svaPitanja=$pitanjeModel->where("idKat",$id)->findAll();
          $ukupno = count($svaPitanja);
          $niz_odabran_flag = array();   //kad izaberemo neko pitanje stavimo na 1
          $niz_odabranih_pitanja = array(); //smjestamo pitanja koja smo odabrali;
          for($i=0; $i<$ukupno; $i++)
          {
              $niz_odabran_flag[$i]=0;
          }

          $cnt = 0;      //koliko smo ih uspjesno stavili
          if( $ukupno >= 10)
          $max = 10;              //moze da se desi da u bazi imamo manje od 10 pitanja, posto pitanja mogu da se brisu
          else
          $max = $ukupno;
          $_SESSION['maxTrening'] = $max;
          while($cnt != $max) //sve dok ne odaberemo svih 10 pitanja
         {
           $i = rand(0,$ukupno-1);
           while($niz_odabran_flag[$i] == 1) //ako smo odabrali mjesto koje smo prethodno odabrali ponavljamo
           {
             $i = rand(0,$ukupno-1);
           }
            $niz_odabran_flag[$i] = 1;
            $niz_odabranih_pitanja[$cnt] = $svaPitanja[$i];
            $cnt++;
          }//end_while_cnt
          return   $niz_odabranih_pitanja;
        }//end_function

        /**
             * treningPrikaz funkcija koja prikazuje kviz iz izabrane kategorije i prvo pitanje
             *
             * @return View
        */
        public function treningPrikaz($id) {
            $_SESSION['nnn']=$id;
            $_SESSION['maxTrening'] = 0;
            $_SESSION['pitanjaTrening'] = $this->niz_random_pitanja_trening($id);
            $_SESSION['cntTreningTacno'] = 0;
            $_SESSION['cntTrening']=0;
            $_SESSION['kviz_end'] = 0;

  if(sizeof($_SESSION['pitanjaTrening']) !=0)
  {
            $_SESSION['tekstTrening'] = $_SESSION['pitanjaTrening'][0]['tekstPitanja'];
            $_SESSION['tacan1Trening'] = $_SESSION['pitanjaTrening'][0]['tacan'];
            $_SESSION['tacanTrening'] = $_SESSION['pitanjaTrening'][0]['tacan'];
            $_SESSION['netacan1Trening'] = $_SESSION['pitanjaTrening'][0]['netacan1'];
            $_SESSION['netacan2Trening'] = $_SESSION['pitanjaTrening'][0]['netacan2'];
            $_SESSION['netacan3Trening'] = $_SESSION['pitanjaTrening'][0]['netacan3'];
            return $this->prikaz("trening", []);
   }
   else  return $this->prikaz("igrac", []); //ako nema nijedno pitanje vratimo ga na njegovu pocetnu

        }

        /**
              * izracunajPoeneTrening funkcija koja racuna poene ostvarene na kvizu bez njihovog pamcenja
              *takodje kad korisnik odradi sva pitanja, prikaze mu se stranica sa tacnim
              *i netacnim odgovorima
               *
              * @return View
        */

        public function izracunajPoeneTrening(){
          if(!empty($_POST['izbor']))
          {
            $izabrano= $_POST['izbor'];
          }
            else
          {
              $izabrano = "";
          }
            /*$db= \Config\Database::connect();
            $builder=$db->table("igrac");*/
            $_SESSION['izabran_odgovor_trening'][$_SESSION['cntTrening']] = $izabrano;

                   if($izabrano==$_SESSION['tacanTrening']){
                       $_SESSION['cntTreningTacno']= $_SESSION['cntTreningTacno']+1;
                     }

                       $_SESSION['cntTrening']=$_SESSION['cntTrening']+1;
                       if($_SESSION['cntTrening']>=$_SESSION['maxTrening']){
                         $_SESSION['kviz_end'] = 1;

                           //******************************ovde pop up o broju poena***************$_SESSION['cntGostaTacno']
                           return redirect()->to("rjesenja");
                       }
                       else {
                         $this->dohvatiPitanjeTrening();
                         return $this->prikaz("trening", []);
                       }
            }



              /**
                    * rezultati_bodovi_trening funkcija za prikaz rezultata sa treninga
                    * @return View
              */

            public function rezultati_bodovi_trening()
            {
               return $this->prikaz("prikaz_odgovora_trening", []);
            }


              /**
                    * prikaz funkcija za prikaz stranica koristi stranicu i podatke koje na njoj treba prikazati
                    *
                    * @param String $page
                    * @param Array $data
                    *
                    * @return View
              */
          public function prikaz($page,$data){
            $data['controller']='Home';
             echo view("stranice/$page",$data);
          }

}//end_controller
