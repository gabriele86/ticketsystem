<?php
namespace App\Controller\Api;
use App\Services\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use App\Form\UserType;
/**
 * @Route("/auth")
 */
class ApiAuthController extends AbstractFOSRestController
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @Route("/register", name="api_auth_register",  methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $data = json_decode(
            $request->getContent(),
            true
        );

        $form = $this->createForm(UserType::class, new User());

        $form->submit($data);


        $this->userService->saveOrUpdate($form->getData());

        return JsonResponse::create($form->getData(),Response::HTTP_CREATED);


    }
}
