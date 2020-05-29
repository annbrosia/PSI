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

/**
 * Description of Takmicenje
 *
 * @author Ana
 */
class Takmicenje extends BaseController {
    
    public function prikaz($page,$data){
        $data['controller']='Home';
        echo view("stranice/$page",$data);
    }
    
    public function takmicenjePrikaz(){
            $_SESSION['trenutnoIgra']='igrac';
            $_SESSION['tacnoIgraca']=0;
            $_SESSION['cnt']=1;
            $this->dohvatiPitanje();
            return $this->prikaz("takmicenje", []);   
    }
     public function takmicenjePrikazDrugi(){
         if($_SESSION['trenutnoIgra']=='gost'){
             $_SESSION['cntGosta']=$_SESSION['cntGosta']+1;
             if($_SESSION['cntGosta']==11){
                 //******************************ovde pop up o broju poena***************$_SESSION['cntGostaTacno']
                  return $this->prikaz("gost", []); 
             }
              $this->dohvatiPitanje();
              return $this->prikaz("takmicenje", []);
         }
         else{
              $_SESSION['cnt']=$_SESSION['cnt']+1;
            if($_SESSION['cnt']==11) {
                $db=\Config\Database::connect();
                $builder=$db->table("rezultati");
               
                
                 $data=[
                     
                "poeni" => $_SESSION['tacnoIgraca'],
                "datum" => date("Y-m-d"),
                "idKRez"=> $_SESSION['ulogovaniKorisnikId']
                
                ];
                 echo "<script>console.log('Data: " . $data["poeni"] . "' );</script>";
                 //echo "<script>console.log('Data: " . $data["datum"] . "' );</script>";
                 echo "<script>console.log('Data: " . $data["idKRez"] . "' );</script>";
                
                 $builder->insert($data);
                $_POST['tacnoIgraca']=0;
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
             
	}
        
    public function dohvatiPitanje(){
            $id=rand(1,140);
            $pitanjeModel=new PitanjeModel();
            $pitanje=$pitanjeModel->where("idPitanja",$id)->findAll();
            $_SESSION['tekst']=$pitanje[0]['tekstPitanja'];
            $_SESSION['tacan']=$pitanje[0]['tacan'];
            $k=rand(1,4);
            switch ($k){
                case 1: 
                        $_SESSION['tacan1']=$pitanje[0]['tacan'];
                        $_SESSION['netacan1']=$pitanje[0]['netacan1'];
                        $_SESSION['netacan2']=$pitanje[0]['netacan2'];
                        $_SESSION['netacan3']=$pitanje[0]['netacan3'];
                        break;
                case 2: 
                        $_SESSION['tacan1']=$pitanje[0]['netacan1'];
                        $_SESSION['netacan1']=$pitanje[0]['tacan'];
                        $_SESSION['netacan2']=$pitanje[0]['netacan2'];
                        $_SESSION['netacan3']=$pitanje[0]['netacan3'];
                        break;
                case 3: 
                        $_SESSION['tacan1']=$pitanje[0]['netacan1'];
                        $_SESSION['netacan1']=$pitanje[0]['netacan2'];
                        $_SESSION['netacan2']=$pitanje[0]['tacan'];
                        $_SESSION['netacan3']=$pitanje[0]['netacan3'];
                        break;
                case 4: 
                        $_SESSION['tacan1']=$pitanje[0]['netacan1'];
                        $_SESSION['netacan1']=$pitanje[0]['netacan2'];
                        $_SESSION['netacan2']=$pitanje[0]['netacan3'];
                        $_SESSION['netacan3']=$pitanje[0]['tacan'];
                        break;

            }
            
                        
        }
        public function izracunajPoene(){
            if ($_SESSION['trenutnoIgra']=='gost'){
                 $izabrano= $_POST['izbor'];
                  if($izabrano==$_SESSION['tacan']){
                      $_SESSION['cntGostaTacno']= $_SESSION['cntGostaTacno']+1;
                  }
                   $this->takmicenjePrikazDrugi();
            }
            else{
                $izabrano= $_POST['izbor'];
            $db= \Config\Database::connect();
            $builder=$db->table("igrac");
            
            if($izabrano==$_SESSION['tacan']){
                $_SESSION['tacnoIgraca']= $_SESSION['tacnoIgraca']+1;
                $builder->set('poeni', 'poeni+1', FALSE);
                $builder->set('poeniTrenutni', 'poeniTrenutni+1', FALSE);
                $builder->where('idKI', $_SESSION['ulogovaniKorisnikId']);
                $builder->update(); 
            }
            
            $this->takmicenjePrikazDrugi();
                
            }
            
            
            
        }
        
        public function gost(){
            $_SESSION['trenutnoIgra']='gost';
            $_SESSION['cntGosta']=1;
            $_SESSION['cntGostaTacno']=0;
            $this->dohvatiPitanje();
            return $this->prikaz("takmicenje", []);
            
        }
                
        
        
}
