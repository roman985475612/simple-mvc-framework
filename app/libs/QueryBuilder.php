<?php

class QueryBuilder
{
    private $query;
    
    private static $instance;
    
    public function __construct()
    {
        $this->query = new \stdClass;
    }
    
    public static function insert(string $table, array $fields): string
    {
        static::$instance = new static;
        static::$instance->query->base = "INSERT INTO " . $table . " (";
        static::$instance->query->base .= implode(", ", $fields) . ") VALUES(";
        
        foreach ($fields as &$field) {
            $field = ":" . $field;
        }
        static::$instance->query->base .= implode(", ", $fields) . ")";
        
        return static::$instance->query->base;
    }
    
    public static function update(string $table, array $fields)
    {
        static::$instance = new static;
        static::$instance->query->base = "UPDATE " . $table . " SET";

        $cnt = count($fields);
        for ($i = 0; $i < $cnt; $i++) {
            static::$instance->query->base .= " " . $fields[$i] . " = :" . $fields[$i];
            if ($cnt > 1 && $i <= $cnt - 2) {
                static::$instance->query->base .= ",";
            }
        }
        
        static::$instance->query->base .= " WHERE id = :id";
        return static::$instance->query->base;
    }
    
    public static function delete(string $table)
    {
        static::$instance = new static;
        static::$instance->query->base = "DELETE FROM " . $table;
        static::$instance->query->base .= " WHERE id = :id";
        
        return static::$instance->query->base;
    }
            
    public static function select(array $fields): QueryBuilder
    {
        static::$instance = new static;
        static::$instance->query->base = "SELECT " . implode(", ", $fields);
        
        return static::$instance;
    }
    
    public function from(string $table): QueryBuilder
    {
        $this->query->base .= " FROM " . $table;
        
        return $this;
    }
    
    public function where(string $ar1, string $ar2 = '', string $ar3 = ''): QueryBuilder
    {
        if (func_num_args() == 1) {
           $this->query->where[] = 'id = ' . $ar1; 
        } elseif (func_num_args() == 2) {
            $this->query->where[] = $ar1 . ' = ' . $ar2;
        } elseif (func_num_args() == 3) {
            $this->query->where[] = $ar1 . ' ' . $ar2 . ' ' . $ar3;
        }
        
        return $this;
    }
    
    public function limit(int $start, int $offset): QueryBuilder
    {
        $this->query->limit = ' LIMIT ' . $start . ', ' . $offset;

        return $this;
    }
    
    public function join(string $table): QueryBuilder
    {
        $this->query->join = ' INNER JOIN ' . $table;
        
        return $this;
    }
    
    public function on(string $arg1, string $arg2): QueryBuilder
    {
        $this->query->on[] = $arg1 . ' = ' . $arg2;
        
        return $this;
    }
    
    public function orderBy(string $field, string $type = 'DESC'): QueryBuilder
    {
        $this->query->orderBy = ' ORDER BY ' . $field . ' ' . $type;
        
        return $this;
    }
    
    public function getQuery(): string
    {
        $sql = '';
        $sql .= $this->query->base;
        
        if (!empty($this->query->where)) {
            $sql .= " WHERE " . implode(" AND ", $this->query->where);
        }
        
        if (!empty($this->query->limit)) {
            $sql .= $this->query->limit;
        }
        
        if (!empty($this->query->join)) {
            $sql .= $this->query->join;
            $sql .= " ON " . implode(" AND ", $this->query->on);
        }
        
        if (!empty($this->query->orderBy)) {
            $sql .= $this->query->orderBy;
        }
        
        $sql .= ';';
        
        return $sql;
    }

}