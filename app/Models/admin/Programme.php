<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property int $level
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|Programme orderBy(string $column, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Model|static create(array $attributes = [])
 */

class Programme extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'level', 'description'];
}
