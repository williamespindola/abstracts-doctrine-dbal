<?php
/**
 * This file is part of PIM API project.
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   My\NameSpace\Database
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @link      link
 */

namespace My\NameSpace\Database;

use Doctrine\DBAL\Connection;

/**
 * Select one by
 *
 * @category  PHP
 * @package   My\NameSpace\Database
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @version   Release: 0.0.0
 * @link 
 */
abstract class SelectOneBy
{
    /**
     * @var Doctrine\DBAL\Connection $connection DBAL Connection
     */
    private $connection;

    /**
     * @var String $table Table name
     */
    private $table;

    /**
     * @var String $fields Fields names
     */
    private $fields;

    /**
     * @var String $where Where condition
     */
    private $where;

    /**
     * @var QueryBuilder
     */
    private $query;

    /**
     * Initializes new SelectAllProductFamily
     *
     * @param Doctrine\DBAL\Connection $connection DBAL Connection
     * @return void
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->query = $this->connection->createQueryBuilder();
    }

    /**
     * Run query
     *
     * @return Array Result data | empty array
     */
    public function runner()
    {
        $result = $this->query->execute()->fetch();

        return (!$result)
            ? []
            : $result;
    }

    /**
     * Set table name
     *
     * @param String $table Table name
     *
     * @return void
     */
    public function setTable(String $table)
    {
        $this->table = $table;
        $this->query->from($table);
    }

    /**
     * Get table name
     *
     * @return String Table name
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * Get fields
     *
     * @return String fiels
     */
    public function getFields(): string
    {
        return $this->fields;
    }

    /**
     * Set fields for select
     *
     * @param String $fields Fields
     *
     * @return void
     */
    public function setFields(String $fields)
    {
        $this->fields = $fields;
        $this->query->select($fields);
    }

    /**
     * Set where for condition
     *
     * @param String $fields Fields
     *
     * @return void
     */
    public function setWhere(String $where)
    {
        $this->where = $where;
        $this->query->where($this->where);
    }

    /**
     * Set parameter for query
     *
     * @param Array $param Params for where condition
     *
     * @return void
     */
    public function setParameter(array $param)
    {
        $this->query->setParameter($param['field'], $param['param']);
    }
}