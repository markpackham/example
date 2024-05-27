<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function jobs(){
        // Make sure we don't end up using Laravel's default job_id intended fro the jobs table
        // we want job_listings
        return $this->belongsToMany(Job::class, relatedPivotKey:"job_listing_id");
    }
}

