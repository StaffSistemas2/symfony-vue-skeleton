<?php

namespace MexQ\Shared\Infrastructure\Persistence;

class Database
{
  public $db;

  public function __construct()
  {
    $this->connect();
  }

  private function connect()
  {
    $serverName = $_SERVER['DB_HOST'];
    $database = $_SERVER['DB_DATABASE'];
    $uid = $_SERVER['DB_USERNAME'];
    $pwd = $_SERVER['DB_PASSWORD'];

    try {
      if (isset($_SERVER['DB_DRIVER']) && $_SERVER['DB_DRIVER'] == 'odbc') {
        // Work with PDO OBDC
        $this->db = new \PDO("odbc:Driver={SQL Native Client};Server=$serverName;Database=$database;Uid=$uid;Pwd=$pwd;");
        // $this->db = new \PDO("odbc:Driver={ODBC Driver 17 for SQL Server};Server=$serverName;Database=$database;Uid=$uid;Pwd=$pwd;");
      } elseif (isset($_SERVER['DB_DRIVER']) && $_SERVER['DB_DRIVER'] == 'sqlsrv') {
        // Work with PDO SQLSRV
        $this->db = new \PDO(
          "sqlsrv:server=$serverName;Database=$database",
          $uid,
          $pwd
        );
      }
    } catch (\PDOException $e) {
      echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    }
  }
}
