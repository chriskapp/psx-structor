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

use Doctrine\DBAL\Schema\Schema;

/**
 * TestSchema
 *
 * @author Christoph Kappestein <christoph.kappestein@gmail.com>
 */
class TestSchema
{
    public static function getSchema()
    {
        $schema = new Schema();

        self::addNews($schema);
        self::addAuthor($schema);

        return $schema;
    }

    protected static function addNews(Schema $schema)
    {
        $table = $schema->createTable('news');
        $table->addColumn('id', 'integer', array('length' => 10, 'autoincrement' => true));
        $table->addColumn('authorId', 'integer', array('length' => 10));
        $table->addColumn('title', 'string', array('length' => 32));
        $table->addColumn('createDate', 'datetime');
        $table->setPrimaryKey(array('id'));
    }

    protected static function addAuthor(Schema $schema)
    {
        $table = $schema->createTable('author');
        $table->addColumn('id', 'string', array('length' => 32));
        $table->addColumn('name', 'string');
        $table->addColumn('uri', 'string');
        $table->setPrimaryKey(array('id'));
    }
}
