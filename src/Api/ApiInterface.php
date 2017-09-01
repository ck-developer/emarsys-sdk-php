<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-sdk-client
 * @package   emarsys-sdk-php
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Api;

use Http\Client\HttpClient;
use Http\Message\RequestFactory;

/**
 * Interface ApiInterface.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
interface ApiInterface
{
    /**
     * @param HttpClient     $httpClient
     * @param RequestFactory $requestFactory
     */
    public function __construct(
        HttpClient $httpClient,
        RequestFactory $requestFactory
    );
}
