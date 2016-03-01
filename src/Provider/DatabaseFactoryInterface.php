<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace Structor\Provider;

/**
 * Factory interface for database provider
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
interface DatabaseFactoryInterface
{
    /**
     * Returns a new collection instance
     *
     * @param string $sql
     * @param array $parameters
     * @param array $definition
     * @return ProviderCollectionInterface
     */
    public function newCollection($sql, array $parameters, array $definition);

    /**
     * Returns a new entity instance
     *
     * @param string $sql
     * @param array $parameters
     * @param array $definition
     * @return ProviderEntityInterface
     */
    public function newEntity($sql, array $parameters, array $definition);
}
