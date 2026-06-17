<?php

namespace App\Models;

use App\Enums\SkillsCategory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $casts = ['category' => SkillsCategory::class];
}
