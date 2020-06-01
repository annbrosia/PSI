<?php namespace App\Models;

use CodeIgniter\Model;

/**
* MotivacionaModel – klasa za izvrsavanje upita nad tabelom motivacionaporuka
*
* @version 1.0
*/
class MotivacionaModel extends Model
{
    protected $table      = 'motivacionaporuka';
    protected $primaryKey = 'idPoruke';
    protected $returnType     = 'array';
    protected $allowedFields = ['idPoruke', 'tekst'];


    /**
        * dohvati_motivacionu_poruku funkcija koja vraca random motivacionu poruku iz baze
        *
        *@return string
    */
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
