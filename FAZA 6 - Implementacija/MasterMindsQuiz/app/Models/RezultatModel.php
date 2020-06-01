<?php namespace App\Models;

use CodeIgniter\Model;


/**
* RezultatModel – klasa za izvrsavanje upita nad tabelom rezultati
*
* @version 1.0
*/
class RezultatModel extends Model
{
    protected $table      = 'rezultati';
    protected $primaryKey = 'idrezultati';
    protected $returnType     = 'array';
    protected $allowedFields = ['idrezultati','poeni','datum', 'idKRez'];

    /**
          * nadji_rezultateigraca funkcija za dohvatanja rezultata igraca koristi $idIgraca
          *@param int $idIgraca
          *
          * @return array
    */
    public function nadji_rezultateigraca($idIgraca)
    {
        return $this->where('idKRez', $idIgraca)->findAll();
    } //ukupni poeni su u tabeli igrac


    /**
          * reset_rezultati funkcija za resetovanje rezultata svih igraca
          *
          * @return void
    */

   public function reset_rezultati()
   {
      $query = $this->query("SELECT * FROM rezultati;");
      foreach ($query->getResultArray() as $row)
      {
        $this->delete($row['idrezultati']);
      }
   }

   /**
         * postoji_li_datum funkcija koja provjerava da li postoji trazeni datum trazenog igraca
         * u tabeli rezultati koristi datum i id
         *
         *@param date $datum
         *@param int $id
         *@return int
   */

   public function postoji_li_datum($datum, $id)
   {
     $this->where('idKRez', $id);
     $this->where('datum', $datum);
     $query = $this->get();
     $row = $query->getRow();
     if(isset($row))
     {
      return -1;
     }
     else return 1;
   }
}//
