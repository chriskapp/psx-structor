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

use PSX\Structor\Provider\Map;

/**
 * FieldTest
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class FieldTest extends DbTestCase
{
    public function testFields()
    {
        $data = [
            'boolean' => '1',
            'callback' => 'foo',
            'dateTime' => '2016-03-01 00:00:00',
            'float' => '1.4',
            'integer' => '2',
        ];

        $definition = [
            'fields' => new Map\Entity($data, [
                'boolean' => new Field\Boolean('boolean'),
                'callback' => new Field\Callback('callback', function($value){
                    return ucfirst($value);
                }),
                'dateTime' => new Field\DateTime('dateTime'),
                'float' => new Field\Float('float'),
                'integer' => new Field\Integer('integer'),
                'replace' => new Field\Replace('http://foobar.com/entry/{integer}'),
                'value' => new Field\Value('bar'),
            ]),
        ];

        $builder = new Builder();
        $result  = json_encode($builder->build($definition), JSON_PRETTY_PRINT);

        $expect = <<<JSON
{
    "fields": {
        "boolean": true,
        "callback": "Foo",
        "dateTime": "2016-03-01T00:00:00+01:00",
        "float": 1.4,
        "integer": 2,
        "replace": "http:\/\/foobar.com\/entry\/2",
        "value": "bar"
    }
}
JSON;

        $this->assertJsonStringEqualsJsonString($expect, $result, $result);
    }
}