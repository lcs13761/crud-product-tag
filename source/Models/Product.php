<?php

namespace Source\Models;

use Source\Core\Database\Model;

class Product extends Model
{
    protected string $table = 'product';

    protected array $fillable = ['name'];

    public function get()
    {
        return $this->where('product_id', $this->id)->fetch(true);
    }

    public function tag()
    {
        return $this->toBelongsToMany("product_id", "tag_id", 'product_tag');
    }




}