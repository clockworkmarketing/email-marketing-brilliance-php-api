<?php

namespace ClockworkMarketing\EmailMarketingBrilliance\Tests;

use ClockworkMarketing\EmailMarketingBrilliance\EmailMarketingBrilliance;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class EmailMarketingBrillianceTest extends TestCase
{
    /** @test */
    public function it_returns_valid_200_response()
    {
        $json = [
            'email_address' => 'example@clock-work.co.uk',
        ];
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => "application/json"], json_encode($json)),
        ]);

        $handlerStack = HandlerStack::create($mock);

        $emb = EmailMarketingBrilliance::setAuthDetails('VALID_KEY', 'VALID_KEY', [ 'handler' => $handlerStack ])->call('GET', '/users/details', ['email_address' => 'example@clock-work.co.uk']);


        $this->assertEquals(
            'example@clock-work.co.uk',
            $emb['response']['email_address']
        );
    }

    /** @test */
    public function it_returns_valid_401_response()
    {
        $json = [
            "code" => 401,
            "reason" => "API credentials are not valid",
        ];
        $mock = new MockHandler([
            new Response(401, ['Content-Type' => "application/json"], json_encode($json)),
        ]);

        $handlerStack = HandlerStack::create($mock);

        $emb = EmailMarketingBrilliance::setAuthDetails('INVALID_KEY', 'INVALID_KEY', [ 'handler' => $handlerStack ])->call('GET', '/users/details', ['email_address' => 'example@clock-work.co.uk']);

        $this->assertNotTrue($emb['valid']);

        $this->assertEquals(
            401,
            $emb['http_code']
        );
    }
}
