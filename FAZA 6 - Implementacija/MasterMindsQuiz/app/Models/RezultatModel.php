<?php namespace App\Models;

use CodeIgniter\Model;

class RezultatModel extends Model
{
    protected $table      = 'rezultati';
    protected $primaryKey = 'idrezultati';
    protected $returnType     = 'array';
    protected $allowedFields = ['idrezultati','poeni','datum', 'idKRez'];

    public function nadji_rezultateigraca($idIgraca)
    {
        return $this->where('idKRez', $idIgraca)->findAll();
    } //ukupni poeni su u tabeli igrac

   public function reset_rezultati()
   {
      $query = $this->query("SELECT * FROM rezultati;");
      foreach ($query->getResultArray() as $row)
      {
        $this->delete($row['idrezultati']);
      }
   }

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
