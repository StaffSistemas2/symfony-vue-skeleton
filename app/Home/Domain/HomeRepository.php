<?php

namespace MexQ\Home\Domain;

use MexQ\Shared\Infrastructure\Persistence\Database;

class HomeRepository extends Database
{
  public function test()
  {
    $stmt = $this->db->query("SELECT GETDATE() as 'database_date'");
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }
}
