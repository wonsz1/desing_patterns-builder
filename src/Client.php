<?php

declare(strict_types=1);

namespace Builder;

/**
 * Client code uses the builder object directly. A designated
 * Director class is not necessary in this case, because the client code needs
 * different queries almost every time, so the sequence of the construction
 * steps cannot be easily reused.
 */
class Client
{
    public function __construct(private SQLQueryBuilderInterface $queryBuilder)
    {
    }

    public function getUsers()
    {
        return $this->queryBuilder
            ->select('users', ['name', 'email', 'password'])
            ->where('age', '18', '>')
            ->where('age', '30', '<')
            ->limit(10, 20)
            ->getSQL();
    }
}