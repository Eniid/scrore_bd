<?php

namespace Match; 

function all(\PDO $connection): array
{
    $matchesRequest = 'SELECT * FROM matches ORDER BY date ASC';
    $pdoSt = $connection->query($matchesRequest);

    return $pdoSt->fetchAll();
}

function find(\PDO $connection, string $id): stdClass
{
    $matchRequest = 'SELECT * FROM match WHERE id = :id';
    $pdoSt = $connection->prepare($matchRequest);
    $pdoSt->execute([':id' => $id]);

    return $pdoSt->fetch();
}

function allWithTeams(\PDO $connection): array
{
    $matchinfoRequest = 'SELECT * FROM match JOIN result on match.id = result.match_id JOIN teams on p.team_id = teams.id ORDER BY match.id';
    $pdoSt = $connection->query($matchinfoRequest);

    return $pdoSt->fetchAll();
}

