<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfessionCategory extends Model
{
    use HasFactory;

    protected $table = 'confession_categories';
    protected $guarded = [];

    public function confessions(){
        return $this->hasMany(Confession::class, 'category_id');
    }
}
