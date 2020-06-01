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
    protected $allowedFields = ['idKorisnika', 'username','password','uloga'];


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



     /**
         * nadji_korisnika funkcija koja pronalazi korisnika koristi idKorisnika
         *
         *@param int $idKorisnika
         *@return array
     */
     public function nadji_korisnika($idKorisnika)
     {
         return $this->where('idKorisnika', $idKorisnika)->findAll();
     }

     /**
         * nadji_niz funkcija koja vraca niz korisnickih imena koristi niz najboljih korisnika
         *
         *@param array $najbolji
         *@return array
     */
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

     /**
         * nadji_username funkcija koja pronalazi korisnika koristi username
         *
         *@param string $username
         *@return array
     */
     public function nadji_username($username)
     {
         return $this->where('username', $username)->findAll();
     }


          /**
              * nadji_password funkcija koja pronalazi korisnika koristi  pasvord
              *
              *@param string $password
              *@return array
          */
     public function nadji_password($password)
     {
         return $this->where('password', $password)->findAll();
     }

           /**
          * postavi_tokanpassword funkcija koja postavlja token koristi tokan i id
          *
         *@param int $tokan
         *@param int $id
        *@return void
      */
     public function postavi_tokanpassword($tokan, $id){
         $data = ['password'=> $tokan];
         $this->update($id, $data);
     }


/**
 * updatepassword funkcija koja azurira pasvord koristi password1 i tokan
 *@param string $password1
 *@param string $tokan
 *@return void
*/
     public function updatepassword($password1,$tokan){
         $data = ['password'=> $password1];
         $useri= $this->nadji_password($tokan);
         $this->update($useri[0]['idKorisnika'], $data);
     }



}//end_KorisnikModel
