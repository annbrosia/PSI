<?php namespace App\Models;

use CodeIgniter\Model;

/**
* ZahtevModeratoraModel – klasa za izvrsavanje upita nad tabelom zahtevmoderatora
*
* @version 1.0
*/
class ZahtevModeratoraModel extends Model
{
    protected $table      = 'zahtevmoderatora';
    protected $primaryKey = 'idZahteva';
    protected $returnType     = 'array';
    protected $allowedFields = ['idZahteva','idKatZah','biografija', 'ime','prezime','email', 'username', 'password'];


    /**
       * obrisi_zahtjev funkcija za brisanje zahtjeva moderatora iz tabele
       *
       * @param int $id
       * @return void
    */
    function obrisi_zahtjev($id)
    {
    $this->where('idZahteva', $id);
    $this->delete();
   }//end_obrisi_zahtjev


    /**
          * dohvati_zahtjeve funkcija za dohvatanje svih zahtjeva moderatora iz tabele
          *
          * @return rows
    */
    function dohvati_zahtjeve()
    {
      $this->select('*');
      $this->join('kategorija', 'kategorija.idKategorije = zahtevmoderatora.idKatZah');
      return $this->findAll();
    }//end_dohvati_zahtjeve


}//end_ZahtevModeratoraModel
