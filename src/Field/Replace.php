<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace Structor\Field;

use Structor\FieldInterface;

/**
 * Replace
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class Replace extends Value
{
    public function getResult(array $context = null)
    {
        $value = $this->value;

        if ($context !== null) {
            foreach ($context as $key => $val) {
                $value = str_replace('{' . $key . '}', $val, $value);
            }
        }

        return $value;
    }
}
