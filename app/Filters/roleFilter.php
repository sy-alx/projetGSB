<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class roleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    { 
        if (!(session()->get('role') == 3))
        {
            return redirect()
                ->to('/profil');
           
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}