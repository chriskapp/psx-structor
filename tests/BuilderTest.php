<?php
/*
 * This file is part of the Structor package.
 *
 * (c) Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file 
 * that was distributed with this source code.
 */

namespace Structor;

use Structor\Provider\Map;

/**
 * BuilderTest
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class BuilderTest extends DbTestCase
{
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

    public function testBuildInvalidEntityResult()
    {
        $data = [];

        $definition = [
            'fields' => new Map\Entity($data, [
                'test' => 'test'
            ]),
        ];

        $builder = new Builder();
        $builder->build($definition);
    }
}