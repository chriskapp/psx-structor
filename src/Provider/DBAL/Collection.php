<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace PSX\Structor\Provider\DBAL;

use PSX\Structor\Provider\ProviderCollectionInterface;
use PSX\Structor\Provider\DatabaseUtil;

/**
 * Collection
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class Collection extends DBALAbstract implements ProviderCollectionInterface
{
    public function getResult(array $context = null)
    {
        return $this->connection->fetchAll(
            $this->sql,
            DatabaseUtil::resolve($this->parameters, $context)
        );
    }
}
