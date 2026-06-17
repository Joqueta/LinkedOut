<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    // Factory 
    use HasFactory;

    // Relations
    public function Posts(): HasMany
    {
        return $this->hasMany(Company::class);
    }
    public function company_fail(): HasMany
    {

        return $this->hasMany(Company_fail::class);
    }
}
