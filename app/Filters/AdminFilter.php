<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $user = service('auth')->getCurrentUser();

        if ($user) {
            if ($user->is_admin != 1) {
                $response = service('response');

                $response->setStatusCode(403);
                $response->setBody('You do not have permissions to access that resource');

                return $response;
            }
        } else {
            return redirect()->to("/login");
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
