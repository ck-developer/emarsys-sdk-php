<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-sdk-client
 * @package   emarsys-sdk-php
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Test;

use Http\Client\HttpClient;
use Http\Message\RequestFactory;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiTestCase.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class ApiTestCase extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $api;

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function mockHttpClient()
    {
        return $this->getMockBuilder(HttpClient::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function mockRequest()
    {
        return $this->getMockBuilder(RequestInterface::class)->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function mockResponse()
    {
        return $this->getMockBuilder(ResponseInterface::class)->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function mockPromise()
    {
        return $this->getMockBuilder(Promise::class)->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function mockRequestFactory()
    {
        return $this->getMockBuilder(RequestFactory::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * @param $class
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function mockApi($class)
    {
        $api = $this->getMockBuilder($class)
            ->setConstructorArgs(array(
                $this->mockHttpClient(),
                $this->mockRequestFactory(),
            ))
            ->setMethods(array('sendRequest', 'createRequest'))
            ->getMock();

        $api->expects($this->any())->method('createRequest')->willReturn($this->mockRequest());

        return $api;
    }

    protected function mockApiResponse()
    {
        $this->api->expects($this->any())->method('sendRequest')
            ->willReturn($this->mockResponse())
        ;
    }

    protected function mockApiAsyncResponse()
    {
        $this->api->expects($this->any())->method('sendAsyncRequest')
            ->willReturn($this->mockPromise())
        ;
    }
}
