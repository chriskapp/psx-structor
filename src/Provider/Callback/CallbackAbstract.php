<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace PSX\Structor\Provider\Callback;

use PSX\Structor\Provider\ParameterResolver;

/**
 * CallbackAbstract
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
abstract class CallbackAbstract
{
    protected $callback;
    protected $parameters;
    protected $definition;

    public function __construct($callback, array $parameters, array $definition)
    {
        $this->callback   = $callback;
        $this->parameters = $parameters;
        $this->definition = $definition;
    }

    public function getResult(array $context = null)
    {
        return call_user_func_array($this->callback, ParameterResolver::resolve($this->parameters, $context));
    }

    public function getDefinition()
    {
        return $this->definition;
    }
}
