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

use RuntimeException;
use Structor\Reference;

/**
 * DatabaseUtil
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class DatabaseUtil
{
    /**
     * Resolves prepared statment parameters agains a context
     *
     * @param array $parameters
     * @param array $context
     * @return array
     */
    public static function resolve(array $parameters, array $context = null)
    {
        $params = [];
        foreach ($parameters as $key => $value) {
            if ($value instanceof Reference) {
                $val = $value->getValue();
                if (isset($context[$val])) {
                    $params[$key] = $context[$val];
                } else {
                    throw new RuntimeException('Reference invalid context key "' . $val . '"');
                }
            } else {
                $params[$key] = $value;
            }
        }

        return $params;
    }
}
