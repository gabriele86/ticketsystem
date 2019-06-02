<?php


namespace App\Services;


use App\Entity\Ticket;
use App\Entity\User;
use App\Repository\TicketRepository;

final class TicketService
{
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function update(Ticket $ticket) : void
    {

    }


    public function create(Ticket $ticket, User $owner) : ?Ticket
    {
        $ticket->setCreatedAt(new \DateTime("now"));
        $ticket->setUpdatedAt(new \DateTime("now"));
        $ticket->setOwner($owner);
        $ticket->setStatus(1);


        try {
            //dd($ticket);
            $this->ticketRepository->createTicket($ticket);
            return $ticket;
        } catch (\Throwable $th) {
            
        }
        

    }

}