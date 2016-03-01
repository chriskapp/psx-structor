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

use PSX\Structor\FieldInterface;

/**
 * Value
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class Value implements FieldInterface
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getResult(array $context = null)
    {
        return $this->value;
    }
}
