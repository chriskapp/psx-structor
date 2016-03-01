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
use Structor\Provider\ProviderEntityInterface;

/**
 * Entity
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class Entity extends PDOAbstract implements ProviderEntityInterface
{
    public function getResult(array $context = null)
    {
        return $this->getStatment($context)->fetch(PDO::FETCH_ASSOC);
    }
}
