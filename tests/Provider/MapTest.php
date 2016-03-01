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

/**
 * MapTest
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class MapTest extends ProviderTestCase
{
    protected function getDefinition()
    {
        $news = [[
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

        $author = [
            'name' => 'Foo Bar',
            'uri' => 'http://phpsx.org'
        ];

        return [
            'totalEntries' => 2,
            'entries' => new Map\Collection($news, [
                'id' => 'id',
                'title' => 'title',
                'author' => new Map\Entity($author, [
                    'displayName' => 'name',
                    'uri' => 'uri',
                ]),
            ])
        ];
    }
}
