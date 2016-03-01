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
 * DbTestCase
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
abstract class DbTestCase extends \PHPUnit_Extensions_Database_TestCase
{
    protected static $con;

    protected $connection;

    public function getConnection()
    {
        global $connection;

        if (self::$con === null) {
            self::$con = getConnection();
        }

        if ($this->connection === null) {
            $this->connection = self::$con;
        }

        return $this->createDefaultDBConnection($this->connection->getWrappedConnection(), 'structor');
    }

    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(__DIR__ . '/fixture.xml');
    }
}
