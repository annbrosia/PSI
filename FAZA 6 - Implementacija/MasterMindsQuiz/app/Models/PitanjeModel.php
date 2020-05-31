<?php namespace App\Models;

use CodeIgniter\Model;

/**
* PitanjeModel – klasa za izvrsavanje upita nad tabelom pitanje
*
* @version 1.0
*/
class PitanjeModel extends Model
{
    protected $table      = 'pitanje';
    protected $primaryKey = 'idPitanja';
    protected $returnType = 'array';
    protected $allowedFields = ['idPitanja','tekstPitanja','tacan', 'netacan1','netacan2','netacan3','nivo','idKP','idKat'];


        /**
          * nadji_poslednjiId funkcija za trazenje najveceg id-a pitanja
          *
          * @return int
         */
    public function nadji_poslednjiId()
    {
          $this->selectMax('idPitanja');
          $query = $this->get();
          $row = $query->getRow();
          if($row!==null)
          {
           return $row->idPitanja;
          }
          else return 0;
        }

    public function nadji_pitanja($idModeratora)
    {
         return $this->where('idKP',$idModeratora)->findAll();
    }

    public function izbrisipitanje($tekst)
    {
     $pitanje=$this->where('tekstPitanja',$tekst)->find();
     $this->delete($pitanje['idPitanja']);
    }



  /**
       * dohvati_pitanja funkcija za dohvatanje odredjenog broja pitanja iz baze
       *
       * @param int $ukupno
       * @return rows
  */
  function get_pitanja($ukupno,$id)
  {
    if($ukupno!= 0 and $ukupno > 0)
    {
    $this->select('*');
    $this->where('idKP',$id);
    $query = $this->get($ukupno);
    return $query->getResult();
    }
    return null;
  }//end_dohvati_pitanja



    /**
          * obrisi_pitanje funkcija za brisanje pitanja iz baze
          *
          * @param int $id
          * @return void
    */
      function obrisi_pitanje($id)
      {
       $this->where('idPitanja', $id);
       $this->delete();
     }//end_obrisi_pitanje


     /**
           * dohvati_pitanja funkcija za dohvatanje odredjenog broja pitanja iz baze
           *
           * @param int $ukupno
           * @return rows
     */
      function dohvati_pitanja($ukupno)
      {
        $niz = [];
        if(($ukupno!=0 and $ukupno>0) || ($ukupno ==-1))
        {
        $this->select('*');
        $this->join('kategorija', 'pitanje.idKat = kategorija.idKategorije');
        $this->join('korisnik', 'pitanje.idKP = korisnik.idKorisnika');
        if($ukupno > -1) $query = $this->get($ukupno);
        else $query = $this->get();
        return $query->getResult();
        }
        return $niz;
      }//end_dohvati_pitanja
}//end_PitanjaModel
