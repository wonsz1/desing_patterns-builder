<?php

declare(strict_types=1);

namespace Builder;

/**
 * Concrete Builder
 * 
 * While Postgres is very similar to Mysql, it still has several differences.
 * Among other things, PostgreSQL has slightly different LIMIT syntax.
 */
class PostgresQueryBuilder extends MysqlQueryBuilder
{
    public function limit(int $rows, ?int $offset = null): SQLQueryBuilderInterface
    {
        if($this->query->type !== 'select') {
            throw new \Exception('LIMIT can only be added to SELECT');
        }
        $this->query->limit = " LIMIT $rows"; 

        if($offset) {
            $this->query->limit .= " OFFSET $offset"; 
        }

        return $this;
    }
}