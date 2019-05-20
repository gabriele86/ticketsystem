<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserApiControllerTest extends WebTestCase
{
    protected function setUp() {
        exec("the restore command line");
    }

    public function testUserRegisterEndpoint()
    {
        $client = static::createClient();

        $data = "{
\"username\":\"testuser_".rand()."\",
\"email\":\"gabriele.bassi@".rand()."\",
\"password\":\"gabtestf\"
}";

        $request = $client->request('POST', 'http://127.0.0.1:8000/api/auth/register', array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            $data );

        $this->assertSame(201, $client->getResponse()->getStatusCode());
    }
}
