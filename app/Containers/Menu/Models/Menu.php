<?php

namespace App\Containers\Menu\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, NodeTrait;

    public $table = 'menu';

    protected $fillable = [
        'name',
        'url',
        'parent_id',
        '_lft',
        '_rgt'
    ];
}
