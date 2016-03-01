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

/**
 * Number
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class Number extends TransformFieldAbstract
{
    protected function transform($value)
    {
        return (float) $value;
    }
}
