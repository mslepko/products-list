<?php namespace App\Model;


class MySQLWrapper
{
    protected $server;
    protected $user;
    protected $password;
    protected $db;

    protected $extras;

    /**
     * @var \mysqli
     */
    protected $dbConn;

    protected $results;
    protected static $TPL_SELECT_QUERY = 'SELECT __FIELDS__ FROM __TABLES__ __WHERE__ __GROUP__ __ORDER__ __LIMIT__';

    public function __construct($credentials)
    {   
        if (!is_array($credentials)) {
            throw new \Exception('No Database Credentials provided.');
        }
        $this->init($credentials);
        $this->connect();
    }

    protected function init($credentials)
    {
        foreach (array('server', 'user', 'password', 'db')
                as $required) {
            if (array_key_exists($required, $credentials)) {
                $this->$required = $credentials[$required];
                unset($credentials[$required]);
            } else {
                throw new \Exception('Missing Required Database Credentials:' . $required);
            }

            if (count($credentials)) {
                $this->extras = $credentials;
            }
        }

        $this->connect();
    }

    protected function connect()
    {
        if (!$this->dbConn = new \mysqli($this->server, $this->user, $this->password, $this->db)) {
            throw new \Exception($this->dbConn->connect_errno . ': ' . $this->dbConn->connect_error);
        }
        if (!empty($this->extras['charset'])) {
            if (!$this->dbConn->set_charset($this->extras['charset'])) {
                error_log('Error loading character set: ' . $this->extras['charset'] . ' Error: ' . $this->dbConn->error);
            } else {
                error_log('Current character set: ' . $this->dbConn->character_set_name());
            }
        }

        return $this;
    }
    public function fetchAll($table, $where = null)
    {
        if (!empty($where)) {
            $where = $this->buildWhereClause($where);

        }
        $sql = $this->select($table, '*', $where);

        $this->execute($sql);

        $rows = array();
        while ($row = $this->result->fetch_assoc()) {
                $rows[] = $row;
        }
        $this->result->data_seek(0);

        return $rows;
    }

    public function fetchRow($table, $where = null)
    {   
        if (!empty($where)) {
            $where = $this->buildWhereClause($where);

        }
        $sql = $this->select($table, '*', $where);
        $this->execute($sql);
        
        return $this->result->fetch_object();

    }

    private function select($table, $fields = '*', $where = null, $groupBy = null, $orderBy = null, $limit = null) {
        $query = array(
            '__FIELDS__' => $fields,
            '__TABLES__' => $table,
            '__WHERE__' => $where,
            '__GROUP__' => $groupBy,
            '__ORDER__' => $orderBy,
            '__LIMIT__' => $limit
        );

        return $this->buildQuery(self::$TPL_SELECT_QUERY, $query);

    }
    
    private function buildQuery($type, $components)
    {
        foreach ($components as $key=>$value) {
            $type = str_replace($key, $value, $type);
        }

        return $type;
    }

    private function execute($sql)
    {
        $sql = trim($sql);
        error_log($sql);

        if ($this->result = $this->dbConn->query($sql)) {
            if (strtoupper(substr($sql, 0, 6)) == 'INSERT') {
                return $this->dbConn->insert_id;
            }

            return $this->dbConn->affected_rows;
        }
        throw new \Exception($sql . ' -- ' . $this->getMySQLError());
    }

    private function buildWhereClause($whereArray) 
    {
        if (empty($whereArray)) {
            return '';
        }
        $whereClauses = array();
        foreach ($whereArray as $field => $value) {
            if ($value == 'IS NULL') {
                $whereClauses[] = $field . " IS NULL ";
            } else {
                $whereClauses[] = $field . " = '" . $this->dbConn->real_escape_string($value) . "'";
            }
        }

        return (!empty($whereClauses)) ? ' WHERE ' . implode(' AND ', $whereClauses) : 'WHERE 1 = 0';
    }
}
