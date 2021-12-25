<?php

namespace Source\Models;

use Source\Core\Database\Model;

class Tag extends Model
{
    protected string $table = 'tag';

    protected array $fillable = ['name'];

    public function get()
    {
        return $this->where('tag_id', $this->id)->fetch(true);
    }

    public function product()
    {
        return $this->toBelongsToMany("product_id", "tag_id", 'product_tag');
    }


    public function tagsMoreUsedForProductInNumberedList(): array{
        $tags = $this->all();
        $result = array();
        foreach ($tags as $tag) {
            $this->id = $tag->id;
            $result[$tag->name] = count($this->product()->get());
        }

        $valueBar['key'] = array_keys($result);
        $valueBar['value'] = array_values($result);
        return $valueBar;
    }

    public function tagsMoreUsedForProductInPercentage(): array{
        $tags = $this->all();
        $result = array();
        $allQts = 0;
        foreach ($tags as $tag) {
          if(!isset($result[$tag->name])) $result[$tag->name] = 0;
            $this->id = $tag->id;
            $qts = count($this->product()->get());
            $allQts += $qts;
            $result[$tag->name] += $qts;
        }

        foreach($result as $key => $value){
            $result[$key] = round(($value / $allQts) * 100);
        }
        $result['label'] = array_keys($result);
        $result['value'] = array_values($result);
        return $result;

    }
}