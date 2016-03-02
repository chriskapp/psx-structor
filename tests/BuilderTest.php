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
 * BuilderTest
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class BuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $news = [[
            'id' => 1,
            'authorId' => 1,
            'title' => 'foo',
            'createDate' => '2016-03-01 00:00:00',
        ],[
            'id' => 2,
            'authorId' => 1,
            'title' => 'bar',
            'createDate' => '2016-03-01 00:00:00',
        ]];

        $author = [
            'id' => 1,
            'name' => 'Foo Bar',
            'uri' => 'http://phpsx.org',
        ];

        $definition = [
            'totalEntries' => 2,
            'entries' => new Map\Collection($news, [
                'id' => 'id',
                'title' => new Field\Callback('title', function($title){
                    return ucfirst($title);
                }),
                'isNew' => new Field\Value(true),
                'author' => new Map\Entity($author, [
                    'displayName' => 'name',
                    'uri' => 'uri',
                ]),
                'date' => new Field\DateTime('createDate'),
                'links' => [
                    'self' => new Field\Replace('http://foobar.com/news/{id}'),
                ]
            ])
        ];

        $expect = <<<JSON
{
    "totalEntries": 2,
    "entries": [
        {
            "id": 1,
            "title": "Foo",
            "isNew": true,
            "author": {
                "displayName": "Foo Bar",
                "uri": "http:\/\/phpsx.org"
            },
            "date": "2016-03-01T00:00:00+00:00",
            "links": {
                "self": "http:\/\/foobar.com\/news\/1"
            }
        },
        {
            "id": 2,
            "title": "Bar",
            "isNew": true,
            "author": {
                "displayName": "Foo Bar",
                "uri": "http:\/\/phpsx.org"
            },
            "date": "2016-03-01T00:00:00+00:00",
            "links": {
                "self": "http:\/\/foobar.com\/news\/2"
            }
        }
    ]
}
JSON;

        $builder = new Builder();
        $result  = json_encode($builder->build($definition), JSON_PRETTY_PRINT);

        $this->assertJsonStringEqualsJsonString($expect, $result, $result);
    }

    /**
     * @expectedException RuntimeException
     */
    public function testBuildUnknownFieldInContext()
    {
        $data = [
            'foo' => 'bar',
        ];

        $definition = [
            'fields' => new Map\Entity($data, [
                'test' => 'test'
            ]),
        ];

        $builder = new Builder();
        $builder->build($definition);
    }

    public function testBuildUnknownFieldWithoutContext()
    {
        $definition = [
            'foo' => 'bar',
        ];

        $builder = new Builder();
        $result  = $builder->build($definition);

        $this->assertEquals($definition, $result);
    }

    /**
     * @expectedException RuntimeException
     */
    public function testBuildInvalidCollectionResult()
    {
        $data = [
            'foo' => 'bar',
        ];

        $definition = [
            'fields' => new Map\Collection($data, [
                'test' => 'test'
            ]),
        ];

        $builder = new Builder();
        $builder->build($definition);
    }
}