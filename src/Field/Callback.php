<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace PSX\Structor\Field;

use Closure;
use PSX\Structor\FieldInterface;

/**
 * Callback
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class Callback implements FieldInterface
{
    protected $field;
    protected $callback;

    public function __construct($field, Closure $callback)
    {
        $this->field    = $field;
        $this->callback = $callback;
    }

    public function getResult(array $context = null)
    {
        return call_user_func($this->callback, isset($context[$this->field]) ? $context[$this->field] : null, $context);
    }
}
