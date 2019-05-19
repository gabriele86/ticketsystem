<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ApiTicketController extends AbstractController
{
    /**
     * @Route("/api/ticket", name="api_ticket_index")
     */
    public function index()
    {
        return $this->render('ticket_api/index.html.twig', [
            'controller_name' => 'ApiTicketController',
        ]);
    }
}
