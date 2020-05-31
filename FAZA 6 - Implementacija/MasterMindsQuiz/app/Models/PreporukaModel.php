<?php namespace App\Models;

use CodeIgniter\Model;

/**
* PreporukaModel – klasa za izvrsavanje upita nad tabelom preporuka
*
* @version 1.0
*/
class PreporukaModel extends Model
{
    protected $table      = 'preporuka';
    protected $primaryKey = 'idPreporuke';
    protected $returnType     = 'array';
    protected $allowedFields = ['idPreporuke', 'tekst', 'idKatP'];

function dohvati_preporuke()
{
    $this->select('*');
    $this->join('kategorija', 'preporuka.idKatP = kategorija.idKategorije');
    $query = $this->get();
    return $query->getResult();
}

function nadji_preporuku($idKat)
{
  $results = $this->where('idKatP', $idKat)->findAll();
  if($results)
  return $results[0]['tekst'];
  else return "";
}


}//end_KorisnikModel
