<?php namespace App\Models;

use CodeIgniter\Model;

/**
* KorisnikModel – klasa za izvrsavanje upita nad tabelom korisnik
*
* @version 1.0
*/
class KorisnikModel extends Model
{
    protected $table      = 'korisnik';
    protected $primaryKey = 'idKorisnika';
    protected $returnType     = 'array';
    protected $allowedFields = ['idKorisnika', 'username','password','uloga','aktivan'];


    /**
      * max_korisnik_id funkcija za trazenje najveceg id-a korisnika
      *
      * @return int
     */
     function max_korisnik_id()
     {
      $this->selectMax('idKorisnika');
      $query = $this->get();
      $row = $query->getRow();
      if($row!==null)
      {
       return $row->idKorisnika;
      }
      else return 0;
    }//end_max_korisnik_id



    /**
        * obrisi_moderatora funkcija za brisanje moderatora iz tabele korisnik
        *
        *@param int $id
        *@return void
    */
    function obrisi_moderatora($id)
    {
     $sql = "UPDATE korisnik SET obrisan = ? WHERE idKorisnika = ?";
     $this->query($sql, [1, $id]);
     }//end_obrisi_moderatora


     public function nadji_korisnika($idKorisnika)
     {
         return $this->where('idKorisnika', $idKorisnika)->findAll();
     }
     public function nadji_niz($najbolji)
     {
         $usernames=Array();
         $i=0;
         foreach ($najbolji as $igrac)
         {
            $usernames[$i]=$this->nadji_korisnika($igrac['idKI'])[0]['username'];
            $i++;
         }

         return $usernames;
     }

     public function nadji_username($username)
     {
         return $this->where('username', $username)->findAll();
     }

     public function nadji_password($password)
     {
         return $this->where('password', $password)->findAll();
     }
     public function postavi_tokanpassword($tokan, $id){
         $data = ['password'=> $tokan];
         $this->update($id, $data);
     }
     public function updatepassword($password1,$tokan){
         $data = ['password'=> $password1];
         $useri= $this->nadji_password($tokan);
         $this->update($useri[0]['idKorisnika'], $data);

     }



}//end_KorisnikModel
