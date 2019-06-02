<?php
namespace App\Contracts;

use App\Entity\Ticket;

interface ITicketRepository{
    public function createTicket(Ticket $ticket );

    public function assignTicket(Ticket $ticket , $asignee_id );

    public function closeTicket(Ticket $ticket, $status);

    public function countComments();
}
