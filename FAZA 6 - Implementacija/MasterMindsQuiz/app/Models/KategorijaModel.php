<?php

namespace App\Models;

use CodeIgniter\Model;

/**
* KategorijaModel – klasa za izvrsavanje upita nad tabelom kategorija
*
* @version 1.0
*/
class KategorijaModel extends Model
{
    protected $table = 'kategorija';
    protected $primaryKey = 'idKategorije';
    protected $returnType = 'array';
    protected $allowedFields = ['idKategorije', "naziv"];


    /**
    * nadji_kategoriju funkcija koja vraca niz od jedne kategorije koristi idKategorije
    *
    *@param int $idKategorije
    *
    * @return Array
    */
      public function nadji_kategoriju($idKategorije)
      {
        return $this->where('idKategorije', $idKategorije)->findAll();
      }


      /**
      * kategorija_toString funkcija koja vraca naziv kategorije koristi idKategorije
      *
      *@param int $idKategorije
      *
      * @return String
      */
         public function kategorija_toString($idKategorije)
        {
        $k= $this->where('idKategorije', $idKategorije)->findAll();
        return $k[0]['naziv'];
        }
}
