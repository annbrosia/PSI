<?php namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\IgracModel;
use App\Models\ModeratorModel;
use App\Models\ZahtevModeratoraModel;
use App\Models\PitanjeModel;
use App\Models\AdminModel;


class Home extends BaseController{

      	public function index(){
            return $this->prikaz("login", []);
	      }

        public function regIg(){
            return $this->prikaz("registracijaIgraca", []);
      	}

        public function regMod(){
            return $this->prikaz("registracijaModeratora", []);
      	}

        public function gost(){
            return $this->prikaz("gost", []);
	      }


        public function prikaz($page,$data){
            $data['controller']='Home';
            echo view("stranice/$page",$data);
        }
        //na ovaj nacin kontroler prosledjuje podatke view-u
        //uradi se raspakivanje i za svaki kljuc se pravi promenljiva





        public function odjava(){

              $db= \Config\Database::connect();
              $builder=$db->table("korisnik");
              $builder->set('aktivan', '0', FALSE);
              $builder->where('username', $_SESSION['ulogovaniKorisnik']);
              $builder->update();
              $_SESSION['ulogovaniKorisnik']="";
              return $this->prikaz("login", []);
        }



        public function submit(){
            $_SESSION['user']="";
            $_SESSION['lozinka']="";


            $korisnikModel=new KorisnikModel();
            $igracModel=new IgracModel();
            $user=$this->request->getVar("korIme");//vraca ono sto smo uneli
            $korisnik=$korisnikModel->where("username",$user)->findAll();
          /*  $idIgraca=$korisnik[0]['idKorisnika'];
            $korisnikIgrac=$igracModel->where("idKI",$idIgraca)->findAll();*/

            if($korisnik==null){
                $_SESSION['greskaPor']="Ne postoji korisnik sa ovim username-om!";
                return $this->prikaz("login",[]);
            }
            else{
                if ($korisnik[0]['obrisan']==1){
                  return $this->prikaz("login",[]);
                }
                //tacan username, ispitujemo lozinku
                $lozinkaMi=$this->request->getVar("lozinka");
                $lozinkaBaza=$korisnik[0]['password'];
                if($lozinkaBaza!=$lozinkaMi){
                    $_SESSION['lozinka']="Uneli ste pogresnu lozinku, pokusajte ponovo.";
                    $_SESSION['user']=$user;
                    return $this->prikaz("login",[]);
                }
                else{
                    //tacan username,tacna lozinka,ispitujemo ulogu
                    $ulogaBaza=$korisnik[0]['uloga'];
                    $_SESSION['ulogovaniKorisnik']=$korisnik[0]['username'];
                    $_SESSION['ulogovaniKorisnikId']=$korisnik[0]['idKorisnika'];
                    $this->updateAktivan($korisnik[0]);

                    if($ulogaBaza=="moderator")
                    {
                      $mModel = new ModeratorModel();
                      $m = $mModel->nadji_moderatora($korisnik[0]['idKorisnika']);
                      $this->session->set('moderator', $m[0]);
                      $this->session->set('tip_ulogovan', 'moderator');
                      return $this->prikaz ("moderator", []);
                    }
                    else if($ulogaBaza=="admin")
                    {
                      $aModel = new AdminModel();
                      $a = $aModel->nadji_admina($korisnik[0]['idKorisnika']);
                      $this->session->set('admin', $a[0]);
                      $this->session->set('tip_ulogovan', 'admin');
                      return $this->prikaz ("administrator", []);
                    }
                    else
                    {
                      $iModel = new IgracModel();
                      $i = $iModel->nadji_igraca($korisnik[0]['idKorisnika']);
                      $this->session->set('igrac', $i[0]);
                      $this->session->set('tip_ulogovan', 'igrac');
                      return $this->prikaz("igrac", []);
                  }//end_else
                }
            }




        }
        public function updateAktivan($korisnik){
             $db= \Config\Database::connect();
              $builder=$db->table("korisnik");


                $builder->set('aktivan', '1', FALSE);
                $builder->where('username', $korisnik['username']);
                $builder->update();





        }
        public function ubaciUBazuKorisnik($data){

            $db= \Config\Database::connect();
            $builder=$db->table("korisnik");
            $builder->insert($data);
        }
         public function ubaciUBazuIgrac($data){

            $db= \Config\Database::connect();
            $builder=$db->table("igrac");
            $builder->insert($data);
        }


         public function ubaciUBazuZahtevModeratora($data){

            $db= \Config\Database::connect();
            $builder=$db->table("zahtevmoderatora");
            $builder->insert($data);
        }


         public function registrujModeratora(){


            $dataKorisnik=[
                "username" => $_POST["reg_mod_username"],
                "password" => $_POST["reg_mod_lozinka"],
                "uloga" => "moderator",
                "aktivan"=> 0
              ];

               $dataZahtevModerator=[
                "ime" => $_POST["reg_mod_ime"],
                "prezime" => $_POST["reg_mod_prezime"],
                "email" => $_POST["reg_mod_email"],
                "biografija"=>$_POST["reg_mod_biografija"],
                "username"=>$_POST["reg_mod_username"],
                "password"=>$_POST["reg_mod_lozinka"],
                "idKatZah"=>$_POST["opcija"]
                ];



            $korisnikModel=new KorisnikModel();
            $zahtevmoderatoraModel=new ZahtevModeratoraModel();
            $username=$_POST["reg_mod_username"];
            $usernameBaza=$korisnikModel->where("username",$username)->findAll();
            $usernameBazaZahtev=$zahtevmoderatoraModel->where("username",$username)->findAll();

            if($usernameBaza!=null || $usernameBazaZahtev!=null ){
                $_SESSION['usernamePoruka']="Korisnicko ime vec postoji!";
                $_SESSION['ime2']=$_POST["reg_mod_ime"];
                $_SESSION['prezime2']=$_POST["reg_mod_prezime"];
                $moderatorModel=new \App\Models\ModeratorModel();
                $email=$_POST["reg_mod_email"];
                $emailBaza= $moderatorModel->where("email",$email)->findAll();
                $emailBazaZahtev= $zahtevmoderatoraModel->where("email",$email)->findAll();
                if($emailBaza!=null ||  $emailBazaZahtev!=null){
                  $_SESSION['emailPoruka']="Vec postoji nalog sa ovim email-om!";
                }
                else {
                  $_SESSION['email2']=$_POST["reg_mod_email"];
                }
                $_SESSION['biografija']=$_POST["reg_mod_biografija"];
                $_SESSION['opcija']=$_POST["opcija"];
                return $this->prikaz("registracijaModeratora",[]);
            }else{

                $moderatorModel=new \App\Models\ModeratorModel();
                $email=$_POST["reg_mod_email"];
                $emailBaza= $moderatorModel->where("email",$email)->findAll();
                $emailBazaZahtev= $zahtevmoderatoraModel->where("email",$email)->findAll();
                if($emailBaza!=null ||  $emailBazaZahtev!=null){
                    $_SESSION['username2']=$_POST["reg_mod_username"];
                    $_SESSION['ime2']=$_POST["reg_mod_ime"];
                    $_SESSION['prezime2']=$_POST["reg_mod_prezime"];
                    $_SESSION['biografija']=$_POST["reg_mod_biografija"];
                    $_SESSION['opcija']=$_POST["opcija"];
                    $_SESSION['emailPoruka']="Vec postoji nalog sa ovim email-om!";
                    return $this->prikaz("registracijaModeratora",[]);
                }else{

                $this->ubaciUBazuZahtevModeratora($dataZahtevModerator);
                 return $this->prikaz("login", []);
                }
            }



        }




        public function registrujIgraca(){
            //return $this->prikaz("login", []);

            $dataKorisnik=[
                "username" => $_POST["reg_username"],
                "password" => $_POST["reg_lozinka"],
                "uloga" => "igrac",
                "aktivan"=> 0

                ];


            $dataIgrac=[

                "ime" => $_POST["reg_ime"],
                "prezime" => $_POST["reg_prezime"],
                "email" => $_POST["reg_email"],
                "poeni" => 0,
                "poeniTrenutni"=>0,
                "blokirani"=> 0
                ];

            $korisnikModel=new KorisnikModel();
            $username=$_POST["reg_username"];
            $usernameBaza=$korisnikModel->where("username",$username)->findAll();

            if($usernameBaza!=null){
                $_SESSION['username']="Korisnicko ime vec postoji!";
                $_SESSION['ime1']=$_POST["reg_ime"];
                $_SESSION['prezime1']=$_POST["reg_prezime"];
                $igracModel=new \App\Models\IgracModel();
                $email=$_POST["reg_email"];
                $emailBaza= $igracModel->where("email",$email)->findAll();
                if($emailBaza!=null){
                  $_SESSION['email']="Vec postoji nalog sa ovim email-om!";
                }
                else {
                  $_SESSION['email1']=$_POST["reg_email"];
                }
                return $this->prikaz("registracijaIgraca",[]);
            }else{
                $igracModel=new \App\Models\IgracModel();
                $email=$_POST["reg_email"];
                $emailBaza= $igracModel->where("email",$email)->findAll();
                if($emailBaza!=null){
                    $_SESSION['username1']=$_POST["reg_username"];
                    $_SESSION['ime1']=$_POST["reg_ime"];
                    $_SESSION['prezime1']=$_POST["reg_prezime"];
                    $_SESSION['email']="Vec postoji nalog sa ovim email-om!";
                    return $this->prikaz("registracijaIgraca",[]);
                }else{
                    $this->ubaciUBazuKorisnik($dataKorisnik);
                    $korisnikPomocni=$korisnikModel->where("username",$_POST["reg_username"])->findAll();
                      $id=$korisnikPomocni[0]['idKorisnika'];

                    $dataIgrac["idKI"]=$id;
                $this->ubaciUBazuIgrac($dataIgrac);
                 return $this->prikaz("login", []);
                }
            }



        }

	//--------------------------------------------------------------------

}
