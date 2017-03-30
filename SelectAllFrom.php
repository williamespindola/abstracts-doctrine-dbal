<?php
/**
 * My project description
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
 * Select all from
 *
 * @category  PHP
 * @package   My\NameSpace\Database
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @version   Release: 0.0.0
 * @link 
 */
abstract class SelectAllFrom
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
     * Initializes new SelectAllProductFamily
     *
     * @param Doctrine\DBAL\Connection $connection DBAL Connection
     * @return void
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * TODO Implement Limit, Offiset and Order
     *
     * Run query
     *
     * @return Array Result data | empty array
     */
    public function run(): array
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $result = $queryBuilder->select($this->fields)
            ->from($this->table)
            ->execute()
            ->fetchAll();

        return $result ?? [];
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
    }
}