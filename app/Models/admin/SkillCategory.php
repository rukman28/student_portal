<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|SkillCategory orderBy(string $column, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Model|static create(array $attributes = [])
 */


class SkillCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];
}
