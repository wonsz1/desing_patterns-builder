<?php

declare(strict_types=1);

namespace Builder;

/**
 * Concrete Builder
 */
class MysqlQueryBuilder implements SQLQueryBuilderInterface
{
    protected $query;

    protected function reset(): void
    {
        $this->query = new \stdClass();
    }

    public function select(string $table, array $fields): SQLQueryBuilderInterface
    {
        $this->reset();
        $this->query->base = 'SELECT ' . implode(", ", $fields) . ' FROM ' . $table;
        $this->query->type = 'select';

        return $this;
    }

    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilderInterface
    {
        if(!in_array($this->query->type, ['select', 'update', 'delete'])) {
            throw new \Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
        }
        $this->query->where[] = "$field $operator '$value'";

        return $this;
    }

    public function limit(int $rows, ?int $offset = null): SQLQueryBuilderInterface
    {
        if($this->query->type !== 'select') {
            throw new \Exception('LIMIT can only be added to SELECT');
        }
        $this->query->limit = " LIMIT $rows";

        if($offset) {
            $this->query->limit .= ", $offset";
        }

        return $this;
    }

    public function getSQL(): string
    {
        $query = $this->query;
        $sql = $query->base;

        if(!empty($query->where)) {
            $sql .= ' WHERE ' . implode(' AND ', $query->where);
        }

        if(isset($query->limit)) {
            $sql .= $query->limit;
        }

        return $sql . ";";
    }
}