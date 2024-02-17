<?php

namespace Core\Loader;

use Core\Helpers\DatabaseHelper;
use Requtize\QueryBuilder\Connection;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilderFactory;
use Requtize\QueryBuilder\ConnectionAdapters\PdoBridge;
use PDO;

class Model
{
    public static function db()
    {

        $dbConfigs= DatabaseHelper::config('database','mysql');
        $dns="mysql:host={$dbConfigs['db_host']};";
        $dns.= "port={$dbConfigs['db_port']};";
        $dns.="dbname={$dbConfigs['db_name']};";
        $dns.= "charset={$dbConfigs['db_charset']}";
        $pdo= new PDO($dns, $dbConfigs['db_user'], $dbConfigs['db_password']);
        $conn = new Connection(new PdoBridge($pdo));
        return new QueryBuilderFactory($conn);
    }
}