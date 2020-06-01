<?php namespace App\Models;

use CodeIgniter\Model;

/**
* AdminModel – klasa za izvrsavanje upita nad tabelom admin
*
* @version 1.0
*/
class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'idKA';
    protected $returnType = 'array';

    /**
    * nadji_admina funkcija koja vraca niz od jednog admina koristi idAdmina
    *
    *@param int $idAdmina
    *
    * @return array
    */
    public function nadji_admina($idAdmina)
    {
        return $this->where('idKA', $idAdmina)->findAll();
    }


}//end_KorisnikModel
