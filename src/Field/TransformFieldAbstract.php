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
 * TransformFieldAbstract
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
abstract class TransformFieldAbstract implements FieldInterface
{
    protected $field;

    public function __construct($field)
    {
        $this->field = $field;
    }

    public function getResult(array $context = null)
    {
        if (isset($context[$this->field])) {
            return $this->transform($context[$this->field]);
        } else {
            return null;
        }
    }

    abstract protected function transform($value);
}
