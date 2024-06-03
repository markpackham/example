<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Job extends Model
{
   use HasFactory;

   protected $table = 'job_listings';

   // Whitelist
   //protected $fillable = ['employer_id', 'title', 'salary'];

   // Setting this to an empty array means you don't need to guard anything
   // any sort of variables can be added to the database (a blacklist with zero)
   protected $guarded = [];

   public function employer()
   {
      return $this->belongsTo(Employer::class);
   }

   public function tags()
   {
      // Make sure we don't end up using Laravel's default job_id intended fro the jobs table
      // we want job_listings
      return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
   }
}