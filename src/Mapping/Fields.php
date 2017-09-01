<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-sdk-client
 * @package   emarsys-sdk-php
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Mapping;

use Emarsys\Exception\Mapping\NotFoundFieldException;

/**
 * Class Fields.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class Fields
{
    /**
     * @var array
     */
    private $mapping = array();

    /**
     * @var array
     */
    private $systemFields = array();

    /**
     * Fields constructor.
     */
    public function __construct()
    {
        $this->systemFields = require __DIR__.'/../../config/fields.php';
    }

    /**
     * @param array $mapping
     */
    public function addMapping(array $mapping)
    {
        $this->mapping = array_merge($this->mapping, $mapping);
    }

    /**
     * @param $nameOrId
     *
     * @return string|int
     */
    public function find($nameOrId)
    {
        if (is_string($nameOrId)) {
            return $this->findByName($nameOrId);
        }

        if (is_int($nameOrId)) {
            return $this->findById($nameOrId);
        }
    }

    /**
     * @param $name
     *
     * @return int
     */
    public function findByName($name)
    {
        if (array_key_exists($name, $this->systemFields)) {
            return $this->systemFields[$name];
        }

        if (array_key_exists($name, $this->mapping)) {
            return $this->mapping[$name];
        }

        throw new NotFoundFieldException($name);
    }

    /**
     * @param int $id
     *
     * @return string
     */
    public function findById($id)
    {
    }
}
