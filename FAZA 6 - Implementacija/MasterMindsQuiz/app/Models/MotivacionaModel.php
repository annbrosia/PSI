<?php namespace App\Models;

use CodeIgniter\Model;

/**
* PreporukaModel – klasa za izvrsavanje upita nad tabelom preporuka
*
* @version 1.0
*/
class MotivacionaModel extends Model
{
    protected $table      = 'motivacionaporuka';
    protected $primaryKey = 'idPoruke';
    protected $returnType     = 'array';
    protected $allowedFields = ['idPoruke', 'tekst'];

function dohvati_motivacionu_poruku()
{
 $poruke = $this->findAll();
 $ukupno = count($poruke);
 if($ukupno == 0)
 return "";
 else if($ukupno == 1)
 return $poruke[0]['tekst'];
 else
 {
    $i = rand(0,$ukupno-1);
    return $poruke[$i]['tekst'];
 }

}


}//end_MotivacionaModel
