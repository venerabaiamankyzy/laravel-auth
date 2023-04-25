<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'text', 'link'];

    public function getAbstract($max = 50) {
        return substr($this->text, 0, $max). "...";
    }
}