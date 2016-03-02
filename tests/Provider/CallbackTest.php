<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace PSX\Structor\Provider;

use PSX\Structor\ProviderTestCase;
use PSX\Structor\Reference;

/**
 * CallbackTest
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class CallbackTest extends ProviderTestCase
{
    protected $authorId;

    protected function getDefinition()
    {
        $this->authorId = 0;

        return [
            'totalEntries' => 2,
            'entries' => new Callback\Collection([$this, 'dataNews'], [], [
                'id' => 'id',
                'title' => 'title',
                'author' => new Callback\Entity([$this, 'dataAuthor'], [new Reference('authorId'), 'bar'], [
                    'displayName' => 'name',
                    'uri' => 'uri',
                ]),
            ])
        ];
    }

    public function dataNews()
    {
        return [[
            'id' => 1,
            'authorId' => 1,
            'title' => 'foo',
            'createDate' => '2016-03-01 00:00:00',
        ], [
            'id' => 2,
            'authorId' => 2,
            'title' => 'bar',
            'createDate' => '2016-03-01 00:00:00',
        ]];
    }

    public function dataAuthor($authorId, $foo)
    {
        $this->authorId++;
        $this->assertEquals($this->authorId, $authorId);
        $this->assertEquals('bar', $foo);

        return [
            'name' => 'Foo Bar',
            'uri' => 'http://phpsx.org'
        ];
    }
}
