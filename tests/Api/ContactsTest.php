<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-sdk-client
 * @package   emarsys-sdk-php
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Test\Api;

use Emarsys\Api\Contacts;
use Emarsys\Test\ApiTestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ContactsTest.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class ContactsTest extends ApiTestCase
{
    /**
     * @var Contacts
     */
    protected $api;

    protected function setUp()
    {
        $this->api = $this->mockApi(Contacts::class);
    }

    public function testListWithSuccess()
    {
        $this->mockApiResponse();

        $response = $this->api->create(array());

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
