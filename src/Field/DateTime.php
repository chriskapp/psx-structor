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
 * DateTime
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class DateTime extends TransformFieldAbstract
{
    protected function transform($value)
    {
        if (!$value instanceof \DateTime) {
            $value = new \DateTime((string) $value);
        }

        return $value->format(\DateTime::RFC3339);
    }
}
