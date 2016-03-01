<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace Structor\Provider\DBAL;

use Doctrine\DBAL\Connection;
use Structor\Provider\DatabaseFactoryInterface;

/**
 * Factory
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class Factory implements DatabaseFactoryInterface
{
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function newCollection($sql, array $parameters, array $definition)
    {
        return new Collection($this->connection, $sql, $parameters, $definition);
    }

    public function newEntity($sql, array $parameters, array $definition)
    {
        return new Entity($this->connection, $sql, $parameters, $definition);
    }
}
