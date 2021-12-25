<?php

namespace Source\Support\Migration;


class MethodType implements  IMethodType
{

    /**
     * @return string
     */
    public function id(): string
    {
      return "`id` INT unsigned AUTO_INCREMENT PRIMARY KEY";
    }

    /**
     * @return string
     */
    public function bigInt($value): string
    {
      return  `$value` . ' bigint ';
    }

    /**
     * @param $value
     * @param $limit
     * @return string
     */
    public function string($value, $limit = 255): string
    {
        return "`$value` varchar($limit)";
    }

    /**
     * @param $value
     * @return string
     */
    public function integer($value): string
    {
       return "`$value` INT";
    }

    /**
     * @return string
     */
    public function unique(): string
    {
       return ' unique ';
    }

    /**
     * @return string
     */
    public function float($value): string
    {
        return "`$value` FLOAT";
    }

    /**
     * @param $value
     * @return string
     */
    public function datetime($value): string
    {
       return "`$value` datetime";
    }

    /**
     * @param $value
     * @return string
     */
    public function timestamp($value): string
    {
       return "`$value` timestamp";
    }

    /**
     * @return string
     */
    public function notNull(): string
    {
       return ' NOT NULL';
    }

    /**
     * @param $value
     * @return string
     */
    public function default($value): string
    {
       return 'DEFAULT ' . $value;
    }

    /**
     * @return string
     */
    public function createAt(): string
    {
      return "`create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP";
    }

    /**
     * @return string
     */
    public function updateAt(): string
    {
        return "`update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
    }
}