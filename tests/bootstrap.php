<?php

require(__DIR__ . '/../vendor/autoload.php');

// create the database schema if not available
function setupDatabase() {
    $config     = new Doctrine\DBAL\Configuration();
    $connection = Doctrine\DBAL\DriverManager::getConnection(['url' => 'sqlite::memory:'], $config);
    $fromSchema = $connection->getSchemaManager()->createSchema();

    $toSchema = PSX\Structor\TestSchema::getSchema();
    $queries  = $fromSchema->getMigrateToSql($toSchema, $connection->getDatabasePlatform());

    foreach ($queries as $query) {
        $connection->query($query);
    }

    return $connection;
}

function getConnection() {
    static $connection;

    if ($connection === null) {
        $connection = setupDatabase();
    }

    return $connection;
}
