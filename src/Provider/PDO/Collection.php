<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace PSX\Structor\Provider\PDO;

use PDO;
use PSX\Structor\Provider\ProviderCollectionInterface;

/**
 * Collection
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class Collection extends PDOAbstract implements ProviderCollectionInterface
{
    public function getResult(array $context = null)
    {
        return $this->getStatment($context)->fetchAll(PDO::FETCH_ASSOC);
    }
}
