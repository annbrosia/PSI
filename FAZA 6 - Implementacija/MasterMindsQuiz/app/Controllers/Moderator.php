<?php
namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\PitanjeModel;
use App\Models\IgracModel;
use App\Models\ModeratorModel;
use App\Config\Email;
use App\Models\KategorijaModel;

/**
* Moderator – klasa za aktivnosti moderatora
*
* @version 1.0
*/
class Moderator extends BaseController {

  /**
  			* prikaz funkcija za prikaz stranica koristi stranicu i podatke koje na njoj treba prikazati
  			*
  			* @param String $page
  			* @param Array $data
  			*
  			* @return View
  */
   protected function prikaz($page, $data) {
        $data['controller'] = 'Moderator';
        $data['korisnik'] = $this->session->get('moderator'); // ko je korisnik
        echo view("stranice/$page", $data);
    }

///////////////////////////////////////////////////////////////POCETNA/////////
/**
     * home funkcija koja prikazuju moderatorsku pocetnu stranicu
     *
     * @return View
*/
    public function home() {
        $this->prikaz("moderator", []);
    }


    /**
         * index funkcija koja prikazuju moderatorsku pocetnu stranicu
         *
         * @return View
    */
    public function index() {
        $this->prikaz("moderator", []);
    }

///////////////////////////////////////////ODJAVA///////////////////////////////
   /*public function odjava()
   {
       parent::odjava();
   }*/
    //////////////////////////////////////////////DODAJ PITANJE////////////////

    /**
         * dodajpitanje funkcija koja prikazuju stranicu za dodavanje pitanja
         *
         * @return View
    */
    public function dodajpitanje() {
        $this->prikaz("mod_dodajpitanje", []);
    }


    /**
         * dodajnovo funkcija za dodavanje novog pitanja i validaciju unijetih podataka
         *
         * @return View
    */
    public function dodajnovo() {
        $rules = ['tekstP' => 'required|min_length[10]|max_length[255]',
            'tacan' => 'required|max_length[45]',
            'netacan1' => 'required|max_length[45]',
            'netacan2' => 'required|max_length[45]',
            'netacan3' => 'required|max_length[45]'
        ];

        $errors = [
            'tekstP' => ['required' => 'Unesite pitanje',
                'max_length' => "Unesite krace pitanje",
                'min_length' => "Unesite duze pitanje"
            ],
            'tacan' => ['required' => "Unesite tacan odgovor",
                'max_length' => "Unesite kraci odgovor"],
            'netacan1' => ['required' => "Unesite netacan odgovor",
                'max_length' => "Unesite kraci odgovor"],
            'netacan2' => ['required' => "Unesite netacan odgovor",
                'max_length' => "Unesite kraci odgovor"],
            'netacan3' => ['required' => "Unesite netacan odgovor",
                'max_length' => "Unesite kraci odgovor"]
        ];
        if (!$this->validate($rules, $errors)) {
            return $this->prikaz('mod_dodajpitanje',
                            ['errors' => $this->validator->getErrors()]);
        } else {

            if (isset($_POST['tekstP']) &&
                    isset($_POST['tacan']) &&
                    isset($_POST['netacan1']) &&
                    isset($_POST['netacan2']) &&
                    isset($_POST['netacan3'])
            ) {
                $pitanje = $_POST['tekstP'];
                $tacan = $_POST['tacan'];
                $netacan1 = $_POST['netacan1'];
                $netacan2 = $_POST['netacan2'];
                $netacan3 = $_POST['netacan3'];
                $moderatorModel = new ModeratorModel();
                $pitanjeModel = new PitanjeModel();
                $idModeratora = $this->session->get('moderator')['idKM'];
                $pitanjeModel->insert([
                    'tekstPitanja' => $pitanje,
                    'tacan' => $tacan,
                    'netacan1' => $netacan1,
                    'netacan2' => $netacan2,
                    'netacan3' => $netacan3,
                    'idPitanja' => ($pitanjeModel->nadji_poslednjiId() + 1),
                    'idKP' => $idModeratora,
                    'idKat' => ($moderatorModel->nadji_idKategorije($idModeratora))
                ]);
                  return $this->prikaz('mod_dodajpitanje',
                            ['notification' => "Pitanje je dodato!"]);
            }
        }
    }

////////////////////////////////////////////////////////IZBRISI PITANJE/////////
/**
     * izbrisipitanje funkcija za brisanje postojeceg pitanja
     *
     * @return View
*/
    public function izbrisipitanje() {
    $idModeratora = $this->session->get('moderator')['idKM'];
     $pModel= new PitanjeModel();
     $mModel= new ModeratorModel();
     $kModel= new KategorijaModel();
     $pitanja=$pModel->nadji_pitanja($idModeratora);
     $idKat= $mModel->nadji_idKategorije($idModeratora);
     $kat=$kModel->kategorija_toString($idKat);
     $this->prikaz("mod_obrisipitanje", ['pitanja'=>$pitanja,
                                      'kategorija'=>$kat] );
    }


    /**
			* ukupno_pitanja funkcija za dohvatanje ukuonog broja pitanja
			*
			* @return int
*/
public function ukupno_pitanja()
{
      $idModeratora = $this->session->get('moderator')['idKM'];
     $pModel= new PitanjeModel();
     $pitanja=$pModel->nadji_pitanja($idModeratora);
     $broj = count($pitanja);
	echo $broj;
}//end_ukupno_pitanja

/**
			* prikazi_vise_pitanja funkcija za dohvatanje odredjenog broja pitanja
			*
			* @return json
*/
public function prikazi_vise_pitanja()
{
	if(isset($_POST['ukupno']))
	{
	$ukupno = $_POST['ukupno'];
     $pModel= new PitanjeModel();

      $idModeratora = $this->session->get('moderator')['idKM'];
     $pitanja=$pModel->get_pitanja($ukupno,$idModeratora);
       echo json_encode($pitanja);
  }
}//end_prikazi_vise_pitanja

/**
			* obrisi_pitanje funkcija za brisanje pitanja i vracanje odredjenog broja pitanja(bez tog)
			*
			* @return json
*/
public function obrisi_pitanje()
{
	if(isset($_POST['pit_id']))
	{
	$id = $_POST['pit_id'];
	$ukupno = $_POST['ukupno_broj'];

   $pModel= new PitanjeModel();
   $pModel->obrisi_pitanje($id);

   $idModeratora = $this->session->get('moderator')['idKM'];
   $pitanja=$pModel->get_pitanja($ukupno,$idModeratora);

    echo json_encode($pitanja);
  }
}//end_obrisi_pitanje

////////////////////////////////////////////RANG LISTA//////////////////////
/**
    * rang funkcija za prikaz najbolje plasiranih igraca
    *
    *
    * @return View
*/
public function rang() {
    $iModel = new IgracModel();
    $najbolji = $iModel->najbolji();
    $kModel=new KorisnikModel();
    $usernames= $kModel->nadji_niz($najbolji);
    $this->prikaz("mod_ranglista", ['najbolji' => $najbolji,
                           'usernames'=> $usernames]);

    }


}
