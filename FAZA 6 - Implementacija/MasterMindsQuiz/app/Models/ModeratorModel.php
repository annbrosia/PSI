<?php namespace App\Models;

use CodeIgniter\Model;

/**
* ModeratorModel – klasa za izvrsavanje upita nad tabelom moderator
*
* @version 1.0
*/
class ModeratorModel extends Model
{
    protected $table      = 'moderator';
    protected $primaryKey = 'idKM';
    protected $returnType = 'array';
    protected $allowedFields = ['idKM','idKatMod','biografija', 'ime','prezime','email'];


    /**
        * dohvati_moderatore funkcija za dohvatanje svih moderatora iz baze
        *
        * @return int
    */
    function dohvati_moderatore()
    {
      $this->select('*');
      $this->join('korisnik', 'moderator.idKM = korisnik.idKorisnika');
      $this->join('kategorija', 'moderator.idKatMod = kategorija.idKategorije');
      $this->where('obrisan =', '0');
      $query = $this->get();
      return $query->getResult();
    }//end_dohvati_moderatore


    /**
        * nadji_email funkcija koja pronalazi moderatora koristi $email
        *
        *@param int $email
        *@return array
    */
    public function nadji_email($email)
    {
        return $this->where('email', $email)->findAll();
    }


    /**
        * nadji_moderatora funkcija koja pronalazi moderatora koristi idModeratora
        *
        *@param int $idModeratora
        *@return array
    */
    public function nadji_moderatora($idModeratora)
    {
        return $this->where('idKM', $idModeratora)->findAll();
    }

    /**
        * nadji_idKategorije funkcija koja pronalazi id kategorije koristi idModeratora
        *
        *@param int $idModeratora
        *@return int
    */
    public function nadji_idKategorije($idModeratora)
    {
        $results = $this->where('idKM', $idModeratora)->findAll();
        return $results[0]['idKatMod'];
    }


}//end_ModeratorModel
