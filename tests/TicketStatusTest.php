<?php

namespace App\Tests;

use App\Entity\Ticket;
use PHPUnit\Framework\TestCase;
use App\Enum\TicketStatusEnum;


class TicketStatusTest extends TestCase
{
    public function testStatusCreato()
    {
        $string = "Creato";


        $this->assertEquals($string , TicketStatusEnum::getStatusName(1));




    }

    public function testStatusPresoInCarico()
    {
        $string = "Preso in carico";

        $this->assertEquals($string , TicketStatusEnum::getStatusName(2));
    }

    public function testStatusPresoChiuso()
    {
        $string = "Chiuso";

        $this->assertEquals($string , TicketStatusEnum::getStatusName(3));
    }
}
