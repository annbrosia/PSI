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
class Trening extends BaseController{
     public function dohvatiPitanjeTrening($svaPitanja){
            //echo "<script>console.log('Sva pitanja: " . $svaPitanja[$r] . "' );</script>";
            $r=rand(0,19);
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
        public function treningPrikaz($id) {
            echo "<script>console.log('Id: " . $id . "' );</script>";
            $_SESSION['nnn']=$id;
            echo "<script>console.log('id u trening prikaz:: " . $_SESSION['nnn']. "' );</script>";
            $_SESSION['cntTrening']=1;
            //dohvatanje pitanja iz odredjene kategorije
            $pitanjeModel=new PitanjeModel();
            $svaPitanja=$pitanjeModel->where("idKat",$id)->findAll();
            $this->dohvatiPitanjeTrening($svaPitanja);
            return $this->prikaz("trening", []);
            
            
        }
        public function treningPrikazDrugi($id) {
            $_SESSION['cntTrening']=$_SESSION['cntTrening']+1;
            echo "<script>console.log('cnt: " . $_SESSION['cntTrening'] . "' );</script>";
            if($_SESSION['cntTrening']==11) {
                echo "<script>console.log('11' );</script>";
//                *********************** ovde se dodaje pop-up o broju poena*****************************
                $db= \Config\Database::connect();
                $builder=$db->table("igrac");
                $builder->set('poeniTrenutni', '0', FALSE);
                $builder->where('idKI', $_SESSION['ulogovaniKorisnikId']);
                $builder->update(); 
                return $this->prikaz("igrac", []); 
            }
            $pitanjeModel=new PitanjeModel();
            $svaPitanja=$pitanjeModel->where("idKat",$id)->findAll();
            $this->dohvatiPitanjeTrening($svaPitanja);
            return $this->prikaz("trening", []);   
        }
        public function takmicenjePrikazDrugi(){
            $_SESSION['cnt']=$_SESSION['cnt']+1;
            if($_SESSION['cnt']==11) {
                
//                *********************** ovde se dodaje pop-up o broju poena*****************************
                $db= \Config\Database::connect();
                $builder=$db->table("igrac");
                $builder->set('poeniTrenutni', '0', FALSE);
                $builder->where('idKI', $_SESSION['ulogovaniKorisnikId']);
                $builder->update(); 
                return $this->prikaz("igrac", []); 
            }
            $this->dohvatiPitanje();
            return $this->prikaz("takmicenje", []);   
	}
        public function izracunajPoeneTrening(){
            $izabrano= $_POST['izbor'];
            $db= \Config\Database::connect();
            $builder=$db->table("igrac");
            
            if($izabrano==$_SESSION['tacanTrening']){
                
                $builder->set('poeniTrenutni', 'poeniTrenutni+1', FALSE);
                $builder->where('idKI', $_SESSION['ulogovaniKorisnikId']);
                $builder->update(); 
            }
            echo "<script>console.log('id u izracunaj:: " . $_SESSION['nnn']. "' );</script>";
            $this->treningPrikazDrugi($_SESSION['nnn']);
            
            
        }
        public function prikaz($page,$data){
            $data['controller']='Home';
            echo view("stranice/$page",$data);
        }
}
