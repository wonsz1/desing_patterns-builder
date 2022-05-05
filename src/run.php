<?php

declare(strict_types=1);

namespace Builder;

require_once __DIR__ . '/../vendor/autoload.php';

echo "Testing MySQL query builder:\n";

echo (new Client(new MysqlQueryBuilder()))->getUsers();