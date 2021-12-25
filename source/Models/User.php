<?php 


namespace Source\Models;

use Source\Core\Database\Model;

class User extends Model 
{
    protected array $fillable = ["name","email","password"];
    protected string $table = "users";
    protected array $protected = ["id"];



}