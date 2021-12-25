<?php

namespace Source\Support\Migration;

use Exception;
use Source\Core\Database\Connect;

class Schema
{

//    /**
//     * @throws Exception
//     */
//    public static function create(string $table, $callback)
//    {
//        $createTable = "CREATE TABLE `$table`";
//        $arrayValues = implode(',',$callback);
//        $bodyTable = "(". $arrayValues .")" . self::config();
//        $created = $createTable . $bodyTable;
//
//        self::migrationTable($created);
//    }
//
//    public static function queryCreateTable(string $table){
//        var_dump($table);
//        self::migrationTable($table);
//    }
//
//    /**
//     * @throws Exception
//     */
//    private static function migrationTable(string $tableCreated){
//      try{
//          $stmt = Connect::getInstance()->prepare($tableCreated);
//          $stmt->execute();
//      }catch(Exception $e){
//          throw new Exception($e->getMessage());
//      }
//
//    }
//
//    private static function config(){
//        $engine = ' ENGINE=InnoDB ';
//        $autIncrement  = 'AUTO_INCREMENT=1 ';
//        $charset = 'DEFAULT CHARSET=utf8mb4 ';
//        $collate = 'COLLATE=utf8mb4_0900_ai_ci;';
//        return $engine . $autIncrement . $charset . $collate;
//    }
}