<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Check implements FilterInterface
{
    public function before(RequestInterface $request)
    {
     $uri = service('uri');
     if(($uri->getSegment(1) == "Admin") ||  ($uri->getSegment(1) == "admin") )
     {
       if((!session()->get('isLoggedIn')))
       return redirect()->to('/Home/index');
       else
        { //ulogovan je
        if (session()->get('tip_ulogovan') == 'moderator')
        return redirect()->to('/Moderator/index');
        else  if (session()->get('tip_ulogovan') == 'igrac')
        return redirect()->to('/Igrac/index');
        }
     }

     else if(($uri->getSegment(1) == "Moderator") ||  ($uri->getSegment(1) == "moderator") )
     {
       if((!session()->get('isLoggedIn')))
       return redirect()->to('/Home/index');
       else
        { //ulogovan je
        if (session()->get('tip_ulogovan') == 'admin')
        return redirect()->to('/Admin/index');
        else  if (session()->get('tip_ulogovan') == 'igrac')
        return redirect()->to('/Igrac/index');
        }
     }

     else if(($uri->getSegment(1) == "Igrac") ||  ($uri->getSegment(1) == "igrac") )
     {
       if((!session()->get('isLoggedIn')))
       return redirect()->to('/Home/index');
       else
        { //ulogovan je
        if (session()->get('tip_ulogovan') == 'admin')
        return redirect()->to('/Admin/index');
        else  if (session()->get('tip_ulogovan') == 'moderator')
        return redirect()->to('/Moderator/index');
        }
     }

     else if(($uri->getSegment(1) == "Home") ||  ($uri->getSegment(1) == "home") )
     {
       if(session()->get('isLoggedIn') && $uri->getSegment(2) != "odjava" )
       {
         if (session()->get('tip_ulogovan') == 'admin')
         return redirect()->to('/Admin/index');
         else  if (session()->get('tip_ulogovan') == 'moderator')
         return redirect()->to('/Moderator/index');
         else  if (session()->get('tip_ulogovan') == 'igrac')
         return redirect()->to('/Igrac/index');
       }
     }

     else if($uri->getSegment(1) == "Takmicenje")
     {
       if($uri->getSegment(2) == "gost")
       {
         if(session()->get('isLoggedIn'))
         {
          if (session()->get('tip_ulogovan') == 'admin')
          return redirect()->to('/Admin/index');
          else  if (session()->get('tip_ulogovan') == 'moderator')
          return redirect()->to('/Moderator/index');
          else  if (session()->get('tip_ulogovan') == 'igrac')
          return redirect()->to('/Igrac/index');
        }
      }

      else if (($uri->getSegment(2) == "izracunajPoene") || ($uri->getSegment(2) == "takmicenjePrikaz"))//ako nije drugi segmnet gost onda je u pitanju igrac
    {

      if(session()->get('isLoggedIn'))
      {
       if (session()->get('tip_ulogovan') == 'admin')
       return redirect()->to('/Admin/index');
       else  if (session()->get('tip_ulogovan') == 'moderator')
       return redirect()->to('/Moderator/index');
      }
      else {
/*****      da dodam odje da gost ne smije pozvat takmicenjeprikaz***********/
      }
      }//end_else
    }//takmicenje

     if($uri->getSegment(1) == "Trening")
    {

        if(session()->get('isLoggedIn'))
        {
         if (session()->get('tip_ulogovan') == 'admin')
         return redirect()->to('/Admin/index');
         else  if (session()->get('tip_ulogovan') == 'moderator')
         return redirect()->to('/Moderator/index');
        }
       else  return redirect()->to('/Home/index');


   }


    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {

    }
}
