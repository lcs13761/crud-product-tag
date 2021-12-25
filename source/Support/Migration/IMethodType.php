<?php

namespace Source\Support\Migration;

interface IMethodType
{
        public function id():string;
        public function bigInt($value):string;
        public function string($value,$limit = 255):string;
        public function integer($value):string;
        public function unique():string;
        public function float($value):string;
        public function datetime($value):string;
        public function timestamp($value):string;
        public function notNull():string;
        public function default($value):string;
        public function createAt():string;
        public function updateAt():string;
}