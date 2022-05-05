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

            echo "<alert><script>setTimeout(\"location.href = '/Consultation';\",1),swal('Accès refusé, vous n\'avez pas les droits necéssaire') </script>";    
            
       
                
           
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {


    }
}