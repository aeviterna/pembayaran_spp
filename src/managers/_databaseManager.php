<?php


class DatabaseManager
{
    /**
     * MySQLi connection
     *
     * @var mysqli $connection
     */
    private mysqli $connection;

    /**
     * Constructor for the DatabaseManager class
     */
    public function __construct()
    {
        require_once dirname(__FILE__) . '/../utilities/_databaseConnection.php';

        $database = new DatabaseConnection();
        $this->connection = $database->connect();
    }

    /**
     * Create a new record
     *
     * @param string $table
     * @param string $fields
     * @param string $values
     * @return int|string
     */
    public function create(string $table, string $fields, string $values): int|string
    {
        $query = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $fields, $values);
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        if ($stmt->execute()) {
            return $stmt->insert_id;
        } else {
            return $stmt->error;
        }
    }

    /**
     * Read a record
     *
     * @param string $table
     * @param string $columns
     * @param string|null $where
     * @return bool|mysqli_result|string
     */
    public function read(string $table, string $columns = '*', string $where = null): bool|mysqli_result|string
    {
        $query = sprintf("SELECT %s FROM %s", $columns, $table);
        if ($where != null)
            $query .= " WHERE $where";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        if ($stmt->execute()) {
            return $stmt->get_result();
        } else {
            return $stmt->error;
        }
    }

    /**
     * Update a record
     *
     * @param string $table
     * @param string $set
     * @param string $where
     * @return bool|string
     */
    public function update(string $table, string $set, string $where): bool|string
    {
        $query = sprintf("UPDATE %s SET %s WHERE %s", $table, $set, $where);
        $stmt = $this->connection->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            return $stmt->error;
        }
    }

    /**
     * Delete a record
     *
     * @param string $table
     * @param string $where
     * @return bool|string
     */
    public function delete(string $table, string $where): bool|string
    {
        $query = sprintf("DELETE FROM %s WHERE %s", $table, $where);
        $stmt = $this->connection->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            return $stmt->error;
        }
    }
}