<?php

declare(strict_types=1);

namespace Builder;

/**
 * Builder interface
 */
interface SQLQueryBuilderInterface
{
    public function select(string $table, array $fields): SQLQueryBuilderInterface;

    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilderInterface;

    public function limit(int $rows, ?int $offset = null): SQLQueryBuilderInterface;

    // other sql methods

    public function getSQL(): string;
}