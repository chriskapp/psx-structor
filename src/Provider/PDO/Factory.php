<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace Structor\Provider\PDO;

use PDO;
use Structor\Provider\DatabaseFactoryInterface;

/**
 * Factory
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class Factory implements DatabaseFactoryInterface
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function newCollection($sql, array $parameters, array $definition)
    {
        return new Collection($this->pdo, $sql, $parameters, $definition);
    }

    public function newEntity($sql, array $parameters, array $definition)
    {
        return new Entity($this->pdo, $sql, $parameters, $definition);
    }
}
