<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ClienteTeste extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function shouldReturnOk()
    {
        $this->client->request('GET', 'inicio');
    }
}
