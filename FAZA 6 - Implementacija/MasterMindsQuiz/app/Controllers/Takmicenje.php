<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\IgracModel;
use App\Models\ModeratorModel;
use App\Models\ZahtevModeratoraModel;
use App\Models\PitanjeModel;
use App\Models\RezultatModel;
use App\Models\PreporukaModel;
use App\Models\MotivacionaModel;

/**
 * Description of Takmicenje
 *
 * @author Ana
 */


 /**
 * Takmicenje – klasa za prikaz kviza, racunanje poena(ako nije gost) i prikaz rezultata
 *
 * @version 1.0
 */
class Takmicenje extends BaseController {

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

    /**
         * rezultati_bodovi funkcija koja prikazuje stranicu sa odgovorima
         *
         * @return View
    */
  public function rezultati_bodovi()
  {
   return $this->prikaz("prikaz_odgovora", []);
 }

 /**
      * niz_random_pitanja funkcija koja generise odredjen broj razlicitih pitanja
      *
      * @return Array
 */
    public function niz_random_pitanja()
    {
      $PitanjeModel = new PitanjeModel();
      $pitanja = $PitanjeModel->findAll(); //niz svih pitanja iz baze
      $ukupno = count($pitanja);
      $niz_odabran_flag = array();   //kad izaberemo neko pitanje stavimo na 1
      $niz_odabranih_pitanja = array(); //smjestamo pitanja koja smo odabrali;
      for($i=0; $i<$ukupno; $i++)
      {
          $niz_odabran_flag[$i]=0;
      }

      $cnt = 0;      //koliko smo ih uspjesno stavili
      if($ukupno >= 10) $max = 10;
      else $max = $ukupno;
      $_SESSION['maxTakmicenje'] = $max;
      while($cnt != $max) //sve dok ne odaberemo svih 10 pitanja
     {
       $i = rand(0,$ukupno-1);
       while($niz_odabran_flag[$i] == 1) //ako smo odabrali mjesto koje smo prethodno odabrali ponavljamo
       {
         $i = rand(0,$ukupno-1);
       }
        $niz_odabran_flag[$i] = 1;
        $niz_odabranih_pitanja[$cnt] = $pitanja[$i];
        $cnt++;
      }//end_while_cnt
      return   $niz_odabranih_pitanja;
    }//end_function


    /**
         * takmicenjePrikaz funkcija koja prikazuje kviz i prvo pitanje
         *
         * @return View
    */
    public function takmicenjePrikaz(){

            $provjera_datum = false;
            $_SESSION['vecigrodanas']=0;
            $datum = date("Y-m-d");
            $RezultatModel = new RezultatModel();
            $provjera_datum = $RezultatModel->postoji_li_datum($datum, $_SESSION['ulogovaniKorisnikId']);
            if($provjera_datum == -1)
            {
              $_SESSION['vecigrodanas'] = 1;
              return $this->prikaz("takmicenje", []);
            }

            $_SESSION['trenutnoIgra']='igrac';
            $_SESSION['maxTakmicenje']=0;
            $_SESSION['tacnoIgraca']=0;
            $_SESSION['cnt']=0;
            $_SESSION['serijeK1'] = 0;
            $_SESSION['muzikaK2'] = 0;
            $_SESSION['geografijaK3'] = 0;
            $_SESSION['naukeK4'] = 0;
            $_SESSION['filmoviK5'] = 0;
            $_SESSION['sportK6'] = 0;
            $_SESSION['istorijaK7'] = 0;
            $_SESSION['biologijaK8'] = 0;
            $_SESSION['umjetnostK9'] = 0;
            $_SESSION['poruka_preporuka'] = '';
            $_SESSION['kviz_end'] = 0;
            $MotivacionaModel = new MotivacionaModel();
            $_SESSION['motivaciona'] = $MotivacionaModel->dohvati_motivacionu_poruku();
            $_SESSION['pitanja'] = $this->niz_random_pitanja();


            if(sizeof($_SESSION['pitanja']) !=0)
            {
            $_SESSION['kategorija'] = $_SESSION['pitanja'][0]['idKat'];
            $_SESSION['tekst'] = $_SESSION['pitanja'][0]['tekstPitanja'];
            $_SESSION['tacan1'] = $_SESSION['pitanja'][0]['tacan'];
            $_SESSION['tacan'] = $_SESSION['pitanja'][0]['tacan'];
            $_SESSION['netacan1'] = $_SESSION['pitanja'][0]['netacan1'];
            $_SESSION['netacan2'] = $_SESSION['pitanja'][0]['netacan2'];
            $_SESSION['netacan3'] = $_SESSION['pitanja'][0]['netacan3'];
            return $this->prikaz("takmicenje", []);
            }
           else return $this->prikaz("igrac", []);
    }


    /**
         * gost funkcija koja prikazuje kviz za gosta i prvo pitanje
         *
         * @return View
    */
    public function gost(){
        $_SESSION['trenutnoIgra']='gost';
        $_SESSION['cntGostaTacno']=0;
        $_SESSION['vecigrodanas']=0;
        $_SESSION['cntGosta']=0;
        $_SESSION['pitanja'] = $this->niz_random_pitanja();
        $_SESSION['kviz_end'] = 0;
        $_SESSION['motivaciona'] = "";
        $_SESSION['poruka_preporuka'] = "";

        if(sizeof($_SESSION['pitanja']) !=0)
        {
        $_SESSION['tekst'] =  $_SESSION['pitanja'][0]['tekstPitanja'];
        $_SESSION['tacan1'] = $_SESSION['pitanja'][0]['tacan'];
        $_SESSION['tacan'] =  $_SESSION['pitanja'][0]['tacan'];
        $_SESSION['netacan1'] = $_SESSION['pitanja'][0]['netacan1'];
        $_SESSION['netacan2'] = $_SESSION['pitanja'][0]['netacan2'];
        $_SESSION['netacan3'] = $_SESSION['pitanja'][0]['netacan3'];
        return $this->prikaz("takmicenje", []);
        }
       else return $this->prikaz("gost", []);

      }


      /**
           * dohvatiPitanje funkcija koja redom dohvata pitanje iz vec generisanog
           * niza random pitanja i pamti ih u niz sesije
           *
           * @return void
      */
    public function dohvatiPitanje(){
       $pitanje = $_SESSION['pitanja'];
         //print_r($pitanje);
           $i = 0;
           if($_SESSION['trenutnoIgra']=='gost')
           $i = $_SESSION['cntGosta'];
           else if ($_SESSION['trenutnoIgra']=='igrac')
           {
           $i = $_SESSION['cnt'];
           $_SESSION['kategorija'] = $_SESSION['pitanja'][$i]['idKat'];
           }
            $_SESSION['tekst']=$pitanje[$i]['tekstPitanja'];
            $_SESSION['tacan']=$pitanje[$i]['tacan'];

            $k=rand(1,4);
            switch ($k){
                case 1:
                        $_SESSION['tacan1']=$pitanje[$i]['tacan'];
                        $_SESSION['netacan1']=$pitanje[$i]['netacan1'];
                        $_SESSION['netacan3']=$pitanje[$i]['netacan3'];
                        $_SESSION['netacan2']=$pitanje[$i]['netacan2'];
                        break;
                case 2:
                        $_SESSION['tacan1']=$pitanje[$i]['netacan1'];
                        $_SESSION['netacan1']=$pitanje[$i]['tacan'];
                        $_SESSION['netacan2']=$pitanje[$i]['netacan2'];
                        $_SESSION['netacan3']=$pitanje[$i]['netacan3'];
                        break;
                case 3:
                        $_SESSION['tacan1']=$pitanje[$i]['netacan1'];
                        $_SESSION['netacan1']=$pitanje[$i]['netacan2'];
                        $_SESSION['netacan2']=$pitanje[$i]['tacan'];
                        $_SESSION['netacan3']=$pitanje[$i]['netacan3'];
                        break;
                case 4:
                        $_SESSION['tacan1']=$pitanje[$i]['netacan1'];
                        $_SESSION['netacan1']=$pitanje[$i]['netacan2'];
                        $_SESSION['netacan2']=$pitanje[$i]['netacan3'];
                        $_SESSION['netacan3']=$pitanje[$i]['tacan'];
                        break;

            }
        }

        /**
             * izracunajPoene funkcija koja pamti poene za registrovanog igraca, ali ne i za
             * gosta, takodje kad korisnik/gost odradi sva pitanja, prikaze mu se stranica sa tacnim
              *i netacnim odgovorima, ako je reg. igrac, prikazu mu se i preporuke iz onih kategorija
              *na koje je dao netacan odgovor
             *
             * @return View
        */
        public function izracunajPoene(){
          if(!empty($_POST['izbor']))
          {
            $izabrano= $_POST['izbor'];
          }
            else
          {
              $izabrano = "";
          }
                      ////////////////////gost/////////////////////////////
            if ($_SESSION['trenutnoIgra']=='gost'){
                 $_SESSION['izabran_odgovor'][$_SESSION['cntGosta']] = $izabrano;
                      if($izabrano==$_SESSION['tacan']){
                          $_SESSION['cntGostaTacno']= $_SESSION['cntGostaTacno']+1;
                        }

                          $_SESSION['cntGosta']=$_SESSION['cntGosta']+1;
                          if($_SESSION['cntGosta']>=$_SESSION['maxTakmicenje']){
                             $_SESSION['kviz_end'] = 1;

                              //******************************ovde pop up o broju poena***************$_SESSION['cntGostaTacno']
                              return redirect()->to("rjesenja");
                          }
                          else {
                            $this->dohvatiPitanje();
                            return $this->prikaz("takmicenje", []);
                          }
                  }
                  //////////////////////////igrac////////////////////////////
            else{
                $_SESSION['izabran_odgovor'][$_SESSION['cnt']] = $izabrano;
                $db= \Config\Database::connect();
                $builder=$db->table("igrac");

            if($izabrano==$_SESSION['tacan'])
            {
                $_SESSION['tacnoIgraca']= $_SESSION['tacnoIgraca']+1;
                $builder->set('poeni', 'poeni+1', FALSE);
              //  $builder->set('poeniTrenutni', 'poeniTrenutni+1', FALSE);
                $builder->where('idKI', $_SESSION['ulogovaniKorisnikId']);
                $builder->update();
           }
           else {

               switch ($_SESSION['kategorija']){
                   case 1: $_SESSION['serijeK1'] = 1; break;
                   case 2: $_SESSION['muzikaK2'] = 1; break;
                   case 3: $_SESSION['geografijaK3'] = 1; break;
                   case 4: $_SESSION['naukeK4'] = 1; break;
                   case 5: $_SESSION['filmoviK5'] = 1; break;
                   case 6: $_SESSION['sportK6'] = 1; break;
                   case 7: $_SESSION['istorijaK7'] = 1; break;
                   case 8: $_SESSION['biologijaK8'] = 1; break;
                   case 9: $_SESSION['umjetnostK9'] = 1; break;
           }
         }
        //    print_r($_SESSION['izabran_odgovor']);
             $_SESSION['cnt']=$_SESSION['cnt']+1;
             if($_SESSION['cnt']>=$_SESSION['maxTakmicenje']) {
               $_SESSION['kviz_end'] = 1;
               $db=\Config\Database::connect();
               $builder=$db->table("rezultati");
                $data=[
               "poeni" => $_SESSION['tacnoIgraca'],
               "datum" => date("Y-m-d"),
               "idKRez"=> $_SESSION['ulogovaniKorisnikId']
               ];
               $builder->insert($data);

            $preporuka = "";
            $PreporukaModel = new PreporukaModel();
             if($_SESSION['serijeK1'] == 1 || $_SESSION['muzikaK2'] == 1
             || $_SESSION['geografijaK3'] == 1   || $_SESSION['naukeK4'] == 1 ||
             $_SESSION['filmoviK5'] == 1 || $_SESSION['sportK6'] == 1 ||  $_SESSION['istorijaK7'] || $_SESSION['biologijaK8'] == 1  ||
             $_SESSION['umjetnostK9'] == 1)
             $preporuka = "<u>Izgleda da ste na pitanja iz nekih oblasti dali pogresan odgovor. Preporucujemo vam sledece materijale: </u><br />";

             if($_SESSION['serijeK1'] == 1) $preporuka.="Serije: " . $PreporukaModel->nadji_preporuku(1) . "<br />";
             if($_SESSION['muzikaK2'] == 1) $preporuka.="Muzika: " . $PreporukaModel->nadji_preporuku(2)  . "<br />";
             if($_SESSION['geografijaK3'] == 1) $preporuka.=  "Geografija: " . $PreporukaModel->nadji_preporuku(3) . "<br />";
             if($_SESSION['naukeK4'] == 1) $preporuka.=  "Prirodne nauke: " .$PreporukaModel->nadji_preporuku(4) . "<br />";
             if($_SESSION['filmoviK5'] == 1) $preporuka.= "Filmovi: ". $PreporukaModel->nadji_preporuku(5) . "<br />";
             if($_SESSION['sportK6'] == 1) $preporuka.= "Sport: ". $PreporukaModel->nadji_preporuku(6) . "<br />";
             if($_SESSION['istorijaK7'] == 1) $preporuka.= "Istorija: " . $PreporukaModel->nadji_preporuku(7) . "<br />";
             if($_SESSION['biologijaK8'] == 1) $preporuka.= "Biologija: " . $PreporukaModel->nadji_preporuku(8) . "<br />";
             if($_SESSION['umjetnostK9'] == 1) $preporuka.= "Umjetnost: " .$PreporukaModel->nadji_preporuku(9) . "<br />";
            $_SESSION['poruka_preporuka'] = $preporuka;
            echo $preporuka;
        //              *********************** ovde se dodaje pop-up o broju poena*****************************
             /*  $db= \Config\Database::connect();
               $builder=$db->table("igrac");
               $builder->set('poeniTrenutni', '0', FALSE);
               $builder->where('idKI', $_SESSION['ulogovaniKorisnikId']);
               $builder->update(); */


               return redirect()->to("rjesenja");
           }
           else {
             $this->dohvatiPitanje();
             return $this->prikaz("takmicenje", []);
           }


       }///end_igrac
}//end_izracunajpoene





}
