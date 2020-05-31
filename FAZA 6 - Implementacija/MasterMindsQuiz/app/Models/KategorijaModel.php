<?php

namespace App\Models;

use CodeIgniter\Model;

class KategorijaModel extends Model
{
    protected $table = 'kategorija';
    protected $primaryKey = 'idKategorije';
    protected $returnType = 'array';
    protected $allowedFields = ['idKategorije', "naziv"];

      public function nadji_kategoriju($idKategorije)
      {
        return $this->where('idKategorije', $idKategorije)->findAll();
      }

         public function kategorija_toString($idKategorije)
        {
        $k= $this->where('idKategorije', $idKategorije)->findAll();
        return $k[0]['naziv'];
        }
}
