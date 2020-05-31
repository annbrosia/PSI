<?php

namespace App\Controllers;

use App\Models\RezultatModel;
use App\Models\IgracModel;
use App\Models\ModeratorModel;
use App\Models\KorisnikModel;
use App\Models\KomentarModel;

class Igrac extends BaseController {

    protected function prikaz($page, $data) {
        $data['controller'] = 'Igrac';
        $data['korisnik'] = $this->session->get('igrac'); // ko je korisnik
        echo view("stranice/$page", $data);
    }

///////////////////////////////////////////////////////////////POCETNA/////////
    public function home() {
        $this->prikaz("igrac", []);
    }

    public function index() {
        $this->prikaz("igrac", []);
    }



    ///////////////////////////////////////////ISTORIJA REZULTATA///////////////
    public function istorijaRezultata() {
        $rModel = new RezultatModel();
        $igrac = $this->session->get('igrac');
        $rezultati = $rModel->nadji_rezultateigraca($igrac['idKI']);
        $this->prikaz("mod_istorijarezultata", ['rezultati' => $rezultati]);
    }

    ////////////////////////////////////////////RANG LISTA//////////////////////
    public function rang() {
        $iModel = new IgracModel();
        $najbolji = $iModel->najbolji();
        $kModel=new KorisnikModel();
        $usernames= $kModel->nadji_niz($najbolji);
        $this->prikaz("mod_ranglista", ['najbolji' => $najbolji,
                               'usernames'=> $usernames]);

        }
// razlikuje se od odjave admina i moderatora pa zato nije Home/odjava
        public function odjava()
        {

          if (isset($_POST["komentar"])){
          $komentar = $_POST["komentar"];
          $kModel= new KomentarModel();
          $kModel->insert([
              'idKomentara' => ($kModel->nadji_poslednjiId() + 1),
              'idKKom' => $this->session->get('igrac')['idKI'],
              'tekstKomentara' => $komentar
          ]);
        }
          $db= \Config\Database::connect();
          $builder=$db->table("korisnik");
          $builder->set('aktivan', '0', FALSE);
          $builder->where('username', $_SESSION['ulogovaniKorisnik']);
          $builder->update();
          $_SESSION['ulogovaniKorisnik']="";
          $_SESSION['isLoggedIn']="0";
          $_SESSION['tip_ulogovan']="";
          $_SESSION['admin']="";
          $_SESSION['moderator']="";
          $_SESSION['tip_ulogovan']="";
          return redirect()->to("index");
        }

}
