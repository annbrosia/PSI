<?php namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\IgracModel;
use App\Models\ModeratorModel;
use App\Models\ZahtevModeratoraModel;
use App\Models\PitanjeModel;
use App\Models\AdminModel;


/**
* Home – klasa za aktivnosti na pocetnoj stranici
*
* @version 1.0
*/
class Home extends BaseController{

  /**
       * index funkcija koja prikazuje stranicu za logovanje
       *
       * @return View
  */
      	public function index(){
          $_SESSION['poruka_preporuka'] = '';
          $_SESSION['motivaciona'] = '';
          $_SESSION['kviz_end'] = 0;
          $_SESSION['vecigrodanas'] = 0;
            return $this->prikaz("login", []);
	      }

        /**
             * regIg funkcija koja prikazuje stranicu za registraciju igraca
             *
             * @return View
        */
        public function regIg(){
            return $this->prikaz("registracijaIgraca", []);
      	}

        /**
             * regMod funkcija koja prikazuje stranicu za registraciju moderatora
             *
             * @return View
        */
        public function regMod(){
            return $this->prikaz("registracijaModeratora", []);
      	}


        /**
             * gost funkcija koja prikazuje stranicu za gosta
             *
             * @return View
        */
        public function gost(){
          $_SESSION['kviz_end'] = 0;
            return $this->prikaz("gost", []);
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
            $_SESSION['vecigrodanas'] = 0;
            echo view("stranice/$page",$data);
        }
        //na ovaj nacin kontroler prosledjuje podatke view-u
        //uradi se raspakivanje i za svaki kljuc se pravi promenljiva



  /**
        * odjava funkcija za odjavljivanje prijavljenih korisnika
        *
        *
        * @return View
  */

  public function odjava()
  {
    $db= \Config\Database::connect();
    $builder=$db->table("korisnik");
  //  $builder->set('aktivan', '0', FALSE);
    $builder->where('username', $_SESSION['ulogovaniKorisnik']);
    $builder->update();
    $_SESSION['ulogovaniKorisnik']="";
    $_SESSION['isLoggedIn']="0";
    $_SESSION['tip_ulogovan']="";
    $_SESSION['admin']="";
    $_SESSION['moderator']="";
    $_SESSION['tip_ulogovan']="";
    $_SESSION['kviz_end'] = 0;
    $_SESSION['poruka_preporuka'] = '';
    $_SESSION['motivaciona'] = '';

    return redirect()->to("index");
  }



  /**
        * submit funkcija za validiranje podataka koje korisnik unosi i na osnovu kojih
        * provjerava da li takav korisnik postoji u bazi sa nekom ulogom
        *
        *
        * @return View
  */
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
                    $_SESSION['isLoggedIn']=1; //ulogovan je

                  //  $this->updateAktivan($korisnik[0]);

                    if($ulogaBaza=="moderator")
                    {
                      $mModel = new ModeratorModel();
                      $m = $mModel->nadji_moderatora($korisnik[0]['idKorisnika']);
                      $this->session->set('moderator', $m[0]);
                      $this->session->set('tip_ulogovan', 'moderator');
                      $_SESSION['kviz_end'] = 0;
                      return $this->prikaz ("moderator", []);
                    }
                    else if($ulogaBaza=="admin")
                    {
                      $aModel = new AdminModel();
                      $a = $aModel->nadji_admina($korisnik[0]['idKorisnika']);
                      $this->session->set('admin', $a[0]);
                      $this->session->set('tip_ulogovan', 'admin');
                      $_SESSION['kviz_end'] = 0;
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
        /*public function updateAktivan($korisnik){
             $db= \Config\Database::connect();
              $builder=$db->table("korisnik");


                $builder->set('aktivan', '1', FALSE);
                $builder->where('username', $korisnik['username']);
                $builder->update();
        }
        */


        /**
              * ubaciUBazuKorisnik funkcija za ubacivanje novog korisnika u tabelu korisnik koristi
              * niz podataka data koje sadrze informacije o novom korisniku
              *
              * @param Array $data
              *
              * @return void
        */
        public function ubaciUBazuKorisnik($data){

            $db= \Config\Database::connect();
            $builder=$db->table("korisnik");
            $builder->insert($data);
        }

        /**
              * ubaciUBazuIgrac funkcija za ubacivanje novog igraca u tabelu igrac koristi
              * niz podataka data koje sadrze inforamcije o novom igracu
              *
              * @param Array $data
              *
              * @return void
        */
         public function ubaciUBazuIgrac($data){

            $db= \Config\Database::connect();
            $builder=$db->table("igrac");
            $builder->insert($data);
        }


        /**
              * ubaciUBazuZahtevModeratora funkcija za ubacivanje novog zahtjeva u tabelu zahtjevmoderatora koristi
              * niz podataka data koje sadrze inforamcije o novom zahtjevu
              *
              * @param Array $data
              *
              * @return void
        */
         public function ubaciUBazuZahtevModeratora($data){

            $db= \Config\Database::connect();
            $builder=$db->table("zahtevmoderatora");
            $builder->insert($data);
        }


        /**
            * registrujModeratora funkcija za registrovanje novog moderatora
            * i validaciju unijetih podataka
            *
            *
            * @return View
        */
         public function registrujModeratora()
         {
             $rules = ['reg_mod_username' => 'max_length[45]',
               'reg_mod_lozinka' => 'max_length[45]',
               'reg_mod_ime' => 'alpha|max_length[45]',
               'reg_mod_prezime' => 'alpha|max_length[45]',
               'reg_mod_biografija' => 'max_length[256]'

           ];

           $errors = [
               'reg_mod_username' => ['max_length' => "Unesite kraci username"],
               'reg_mod_lozinka' => ['max_length' => "Unesite kracu lozinku"],
               'reg_mod_ime' => ['alpha' => "Ime sadrzi specijalne karaktera",
                                  'max_length' => "Ime sadrzi specijalne karaktera"],
               'reg_mod_prezime' => ['alpha' => "Prezime sadrzi specijalne karaktera"
                                    ,'max_length' => "Prezime sadrzi previse karaktera"],
               'reg_mod_biografija' => ['max_length' => "Unesite kracu biografiju"]
           ];
           if (!$this->validate($rules, $errors)) {
               return $this->prikaz('registracijaModeratora',[
                 'username_errors'=>$this->validator->getError('reg_mod_username'),
                 'ime_errors'=>$this->validator->getError('reg_mod_ime'),
                 'prezime_errors'=>$this->validator->getError('reg_mod_prezime'),
                 'lozinka_errors'=>$this->validator->getError('reg_mod_lozinka'),
                 'biografija_errors'=>$this->validator->getError('reg_mod_biografija')
               ]);
           } else {

            $dataKorisnik=[
                "username" => $_POST["reg_mod_username"],
                "password" => $_POST["reg_mod_lozinka"],
                "uloga" => "moderator",
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


            $moderatorModel=new ModeratorModel();
            $zahtevmoderatoraModel=new ZahtevModeratoraModel();
            $igracModel=new IgracModel();

            $moderatori= $moderatorModel->nadji_email($_POST["reg_mod_email"]);
            if (!empty($moderatori))  {   $_SESSION['emailPoruka']="Vec postoji nalog sa ovim email-om!"; return $this->prikaz('registracijaModeratora',[]); }


            $zmod= $zahtevmoderatoraModel->nadji_email($_POST["reg_mod_email"]);
            if (!empty($zmod))  {   $_SESSION['emailPoruka']="Vec postoji nalog sa ovim email-om!"; return $this->prikaz('registracijaModeratora',[]); }


            $i= $igracModel->nadji_email($_POST["reg_mod_email"]);
            if (!empty($i))  {   $_SESSION['emailPoruka']="Vec postoji nalog sa ovim email-om!"; return $this->prikaz('registracijaModeratora',[]); }

            $korisnikModel=new KorisnikModel();
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
        }

        /**
            * registrujIgraca funkcija za registrovanje novog igraca
            * i validaciju unijetih podataka
            *
            *
            * @return View
        */
        public function registrujIgraca(){
          $rules = ['reg_username' => 'max_length[45]',
            'reg_lozinka' => 'max_length[45]',
            'reg_ime' => 'alpha|max_length[45]',
            'reg_prezime' => 'alpha|max_length[45]',
        ];

        $errors = [
            'reg_username' => ['max_length' => "Unesite kraci username"],
            'reg_lozinka' => ['max_length' => "Unesite kracu lozinku"],
            'reg_ime' => ['alpha' => "Ime sadrzi specijalne karaktera",
                               'max_length' => "Ime sadrzi previse karaktera"],
            'reg_prezime' => ['alpha' => "Prezime sadrzi specijalne karaktera"
                                 ,'max_length' => "Prezime sadrzi previse karaktera"]
        ];
        if (!$this->validate($rules, $errors)) {
            return $this->prikaz('registracijaIgraca',[
              'username_errors'=>$this->validator->getError('reg_username'),
              'ime_errors'=>$this->validator->getError('reg_ime'),
              'prezime_errors'=>$this->validator->getError('reg_prezime'),
              'lozinka_errors'=>$this->validator->getError('reg_lozinka'),
            ]);
        } else {

            $dataKorisnik=[
                "username" => $_POST["reg_username"],
                "password" => $_POST["reg_lozinka"],
                "uloga" => "igrac",

                ];


            $dataIgrac=[

                "ime" => $_POST["reg_ime"],
                "prezime" => $_POST["reg_prezime"],
                "email" => $_POST["reg_email"],
                "poeni" => 0,
                "blokirani"=> 0
                ];

                $moderatorModel=new ModeratorModel();
                $zahtevmoderatoraModel=new ZahtevModeratoraModel();
                $igracModel=new IgracModel();

                $moderatori= $moderatorModel->nadji_email($_POST["reg_email"]);
                if (!empty($moderatori))  {   $_SESSION['email']="Vec postoji nalog sa ovim email-om!"; return $this->prikaz('registracijaIgraca',[]); }


                $zmod= $zahtevmoderatoraModel->nadji_email($_POST["reg_email"]);
                if (!empty($zmod))  {   $_SESSION['email']="Vec postoji nalog sa ovim email-om!"; return $this->prikaz('registracijaIgraca',[]); }


                $i= $igracModel->nadji_email($_POST["reg_email"]);
                if (!empty($i))  {   $_SESSION['email']="Vec postoji nalog sa ovim email-om!"; return $this->prikaz('registracijaIgraca',[]); }



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

}


            //////////////////////////////////////////ZABORAVLJENA LOZINKA//////////////
            /**
                * zaboravljenalozinka funkcija za prikaz stranice za zaboravljenu lozinku
                *
                *
                * @return View
            */
            public function zaboravljenalozinka() {
                $this->prikaz("mod_zaboravljenalozinka", []);
            }


            /**
                * emailSubmit funkcija za slanje mejla za resetovanje lozinke koristi
                *adresu, temu, poruku i email korisnika
                *
                *@param $address
                *@param $subject
                *@param $message
                *@param $korisnik
                * @return View
            */
            public function emailSubmit($address, $subject, $message, $korisnik) {
        $headers = "Reply-To: MasterMinds Oceans4 masterminds.kviz@gmail.com\r\n";
        	 $headers .= "Return-Path: MasterMinds Oceans4 masterminds.kviz@gmail.com\r\n";
        	 $headers .= "From:  masterminds.kviz@gmail.com" ."\r\n" ;
        	 $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

                if (mail($address, $subject, $message, $headers)) {

                 $this->prikaz("mod_zaboravljenalozinka", ['notification'=>"{$korisnik['ime']} provjerite email"]);
                 } else {
                           $this->prikaz("mod_zaboravljenalozinka", ['errors'=>" {$korisnik['ime']} nije poslat email"]);
                }
            }


            /**
                * reset funkcija koja se poziva tek kad korisnik klikne na link u mejlu
                *i prikaze se stranice za resetovanje lozinke
                *
                * @return View
            */
            public function reset() { //ulazi se sa mejla
               $data['tokan'] = $_GET['tokan'];
               $_SESSION['tokan']=$data['tokan'];
                $this->prikaz("mod_novalozinka", []);
            }

            /**
                * resetLink funkcija za formiranje  linka za korisnika koji zeli da promijeni
                *lozinku i njegovo slanje na mejl
                *
                *
                * @return View
            */
            public function resetLink() {
                $email = $_POST['email'];
                $moderatorModel = new ModeratorModel();
                $moderatori = $moderatorModel->nadji_email($email);
                if (!empty($moderatori)) {
                    $tokan = rand(1000, 9999);
                        $kModel=new KorisnikModel();
                        $kModel->postavi_tokanpassword($tokan, $moderatori[0]['idKM']);
                        $message = "Molimo Vas da kliknete na ". base_url('Home/reset?tokan='). $tokan. " za promjenu lozinke. ";
                       $this->emailSubmit($email, 'Promjena lozinke', $message,$moderatori[0]);

                } else {
                    $igracModel = new IgracModel();
                    $igraci = $igracModel->nadji_email($email);
                    if (!empty($igraci)) {
                    if ($igraci[0]['blokirani'] == 0){
                         $tokan = rand(1000, 9999);
                        $kModel=new KorisnikModel();
                        $kModel->postavi_tokanpassword($tokan, $igraci[0]['idKI']);
                       $message = "Molimo Vas da kliknete na ". base_url('Home/reset?tokan='). $tokan. " za promjenu lozinke. ";
                    $this->emailSubmit($email, 'Promjena lozinke', $message, $igraci[0]);
                  }else{ $this->prikaz("mod_zaboravljenalozinka", ['errors'=>"Vi ste blokiran igrac"]);}

                    } else {
                           $this->prikaz("mod_zaboravljenalozinka", ['errors'=>"Netacan email"]);
                    }
                }
            }

            /**
                * zapamtinovulozinku funkcija za pamcenje nove lozinke
                *
                *
                * @return View
            */

            public function zapamtinovulozinku(){
                $tokan=$_SESSION['tokan'];
                $password1=$_POST['password1'];
                $password2=$_POST['password2'];

                if ($password1 != $password2)
                {
                 $this->prikaz("mod_novalozinka", ['errors'=>"Lozinke se ne poklapaju"]);
                }
                else{
                    $kModel= new KorisnikModel();
                    $kModel->updatepassword($password1,$tokan);
                $this->prikaz("login", []);

                }
            }

}
