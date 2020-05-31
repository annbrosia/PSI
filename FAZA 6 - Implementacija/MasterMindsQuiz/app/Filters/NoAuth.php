<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class NoAuth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
      if(session()->get('isLoggedIn'))
      {
        if(session()->get('tip_ulogovan') == 'admin')
        return redirect()->to('Admin/index');
        else if(session()->get('tip_ulogovan') == 'moderator')
        return redirect()->to('Moderator/index');
        else if(session()->get('tip_ulogovan') == 'igrac')
        return redirect()->to('Igrac/home');
      }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {

    }
}
