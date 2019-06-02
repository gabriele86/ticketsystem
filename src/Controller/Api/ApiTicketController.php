<?php

namespace App\Controller\Api;


use App\Entity\Ticket;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Services\TicketService;
use App\Form\TicketType;

/**
 * @Route("/ticket")
 * Class ApiTicketController
 * @package App\Controller\Api
 */
class ApiTicketController extends AbstractFOSRestController
{
    private $ticketService;
    public function __construct(TicketService $ticketService )
    {
        $this->ticketService = $ticketService;
    }


    /**
     * @Route("/create", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request) : JsonResponse
    {
        $data = json_decode(
            $request->getContent(),
            true
        );
        //$ticket = new Ticket();
        $user = $this->get('security.token_storage')->getToken()->getUser();



        $form = $this->createForm(TicketType::class, new Ticket());


        $form->submit($data);



        $result = $this->ticketService->create($form->getData(), $user);

        return JsonResponse::create($data,Response::HTTP_CREATED);
    }




}
