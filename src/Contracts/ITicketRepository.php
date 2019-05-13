<?php
namespace App\Contracts;

interface ITicketRepository{
    public function createTicket();

    public function assignTicket();

    public function closeTicket();

    public function countComments();
}
