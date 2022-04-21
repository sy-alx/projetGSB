<?php

namespace App\Filters;

use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class ApiAuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $customPhpSessionId = $request->getHeaderLine('X-Api-Key') ? $request->getHeaderLine('X-Api-Key') : NULL;
        if($customPhpSessionId) {
           session_id($customPhpSessionId);
        }
        if (!session()->get('isLoggedIn'))
        {
            return Services::response()->setStatusCode(403);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}