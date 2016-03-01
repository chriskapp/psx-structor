<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace PSX\Structor\Provider\Map;

/**
 * MapAbstract
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
abstract class MapAbstract
{
    protected $result;
    protected $definition;

    public function __construct(array $result, array $definition)
    {
        $this->result     = $result;
        $this->definition = $definition;
    }

    public function getResult(array $context = null)
    {
        return $this->result;
    }

    public function getDefinition()
    {
        return $this->definition;
    }
}
