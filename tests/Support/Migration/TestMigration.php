<?php

namespace Support\Migration;

use PHPUnit\Framework\TestCase;
use Source\Core\Database\Connect;
use Source\Models\User;

class TestMigration extends TestCase
{
    
    public $table;
    public $values;

    public function testCreateTable(){
        $this->valueTableCreated('test');
        $valuesTable = implode(',',$this->values);
        $this->assertEquals('',$this->table . "(" . $valuesTable . $this->primaryKey() . ")" . $this->configBasic());



    }

    public function primaryKey(){
        return "PRIMARY KEY (`id`)";
    }

    public function valueTableCreated($table){

        $this->table = 'CREATE TABLE' . `$table`;
        $this->values = array(
                $this->id() . $this->unique(),
                $this->column('auth_id') . $this->string(),
                $this->column('photo') . $this->string(),
                $this->column('name') . $this->string() . $this->notNull(),
                $this->column('email') . $this->string() . $this->notNull(),
                $this->column('password') . $this->string() . $this->notNull(),
                $this->column('level') . $this->integer() . $this->default(1),
                $this->column('email_verified') . $this->string(),
                $this->column('email_verification_at') . $this->datetime(),
                $this->createAt(),
        );
    }

    public function configBasic(){
        $engine = 'ENGINE=InnoDB ';
        $autoIncrement = 'AUTO_INCREMENT=1 ';
        $charset = 'DEFAULT CHARSET=utf8mb4 ';
        $collate = 'COLLATE=utf8mb4_0900_ai_ci';
        return $engine . $autoIncrement . $charset . $collate;
    }

    public function createAt(){
        return "`created_at` " . $this->timestamp() . $this->notNull() . $this->default('CURRENT_TIMESTAMP');
    }

    public function updateAt(){
        return "`updated_at` " . $this->timestamp() . $this->notNull() . $this->default('CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP');
    }

    public function timestamp(){
        return 'timestamp';
    }

    public function datetime(){
        return 'datetime';
    }


    public function default($value = null){
        return 'DEFAULT ' . $value;
    }

    public function integer() {
        return 'INT ';
    }

    public function notNull(){
        return " NOT NULL ";
    }

    public function string($limit = 255){
        return "varchar(" . $limit . ")";
    }

    public function column($value){
        return "`$value` ";
    }

    public function id(){
        return "`id` bigint unsigned NOT NULL ";
    }

    public function unique(){
        return 'unique';
    }

    public function bigInt(){

    }


}