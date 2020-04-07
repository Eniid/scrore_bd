<?php
function all(PDO $connection): array
{
    $teamsRequest = 'SELECT * FROM teams ORDER BY name ASC';
    $pdoSt = $connection->query($teamsRequest);

    return $pdoSt->fetchAll();
}

function find(PDO $connection, string $id): stdClass
{
    $teamRequest = 'SELECT * FROM users WHERE id = :id';
    $pdoSt = $connection->prepare($teamRequest);
    $pdoSt->execute([':id' => $id]);

    return $pdoSt->fetch();
}