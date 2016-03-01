<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace PSX\Structor;

/**
 * ProviderTestCase
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
abstract class ProviderTestCase extends DbTestCase
{
    public function testBuild()
    {
        $builder = new Builder();
        $result  = json_encode($builder->build($this->getDefinition()), JSON_PRETTY_PRINT);

        $expect = <<<JSON
{
    "totalEntries": 2,
    "entries": [
        {
            "id": 1,
            "title": "foo",
            "author": {
                "displayName": "Foo Bar",
                "uri": "http:\/\/phpsx.org"
            }
        },
        {
            "id": 2,
            "title": "bar",
            "author": {
                "displayName": "Foo Bar",
                "uri": "http:\/\/phpsx.org"
            }
        }
    ]
}
JSON;

        $this->assertJsonStringEqualsJsonString($expect, $result, $result);
    }

    abstract protected function getDefinition();
}