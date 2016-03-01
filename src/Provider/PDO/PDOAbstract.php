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
use Structor\Provider\DatabaseUtil;

/**
 * PDOAbstract
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
abstract class PDOAbstract
{
    protected $pdo;
    protected $sql;
    protected $parameters;
    protected $definition;
    protected $statment;

    public function __construct(PDO $pdo, $sql, array $parameters, array $definition)
    {
        $this->pdo        = $pdo;
        $this->sql        = $sql;
        $this->parameters = $parameters;
        $this->definition = $definition;
    }

    public function getDefinition()
    {
        return $this->definition;
    }

    protected function getStatment(array $context = null)
    {
        if ($this->statment === null) {
            $this->statment = $this->pdo->prepare($this->sql);
        }

        $this->statment->execute(DatabaseUtil::resolve($this->parameters, $context));

        return $this->statment;
    }
}
