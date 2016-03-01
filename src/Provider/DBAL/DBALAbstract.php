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

/**
 * DBALAbstract
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
abstract class DBALAbstract
{
    protected $connection;
    protected $sql;
    protected $parameters;
    protected $definition;
    protected $statment;

    public function __construct(Connection $connection, $sql, array $parameters, array $definition)
    {
        $this->connection = $connection;
        $this->sql        = $sql;
        $this->parameters = $parameters;
        $this->definition = $definition;
    }

    public function getDefinition()
    {
        return $this->definition;
    }
}
