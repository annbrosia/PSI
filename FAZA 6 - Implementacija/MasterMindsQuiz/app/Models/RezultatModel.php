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

}
