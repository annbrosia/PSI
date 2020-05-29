<?php namespace App\Models;

use CodeIgniter\Model;

/**
* KorisnikModel – klasa za izvrsavanje upita nad tabelom korisnik
*
* @version 1.0
*/
class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'idKA';
    protected $returnType = 'array';

    public function nadji_admina($idAdmina)
    {
        return $this->where('idKA', $idAdmina)->findAll();
    }


}//end_KorisnikModel
