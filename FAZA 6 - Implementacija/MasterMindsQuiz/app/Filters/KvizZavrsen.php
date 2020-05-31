<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class KvizZavrsen implements FilterInterface
{
    public function before(RequestInterface $request)
    {

             if(session()->get('isLoggedIn'))
             {
               if(session()->get('tip_ulogovan') == 'admin')
               return redirect()->back();
               else if(session()->get('tip_ulogovan') == 'moderator')
               return redirect()->back();
               else if((session()->get('tip_ulogovan') == 'igrac') && (session()->get('kviz_end') == 0))
               return redirect()->back();
             }
             else
             {
                if(session()->get('kviz_end') == 0)
                return redirect()->back();
             }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {

    }
}
