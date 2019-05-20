<?php
namespace App\Controller\Api;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/user")
 */
class ApiUserController extends AbstractFOSRestController
{

    public function detail()
    {
        $user = $this->getUser();
        JsonResponse::create($user , Response::HTTP_OK);
    }

}
