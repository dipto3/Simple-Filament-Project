<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Employee extends Model implements HasMedia
{
    use SoftDeletes;
    use HasFactory,InteractsWithMedia;
    protected $guarded = [];

   public function country()
   {
        return $this->belongsTo(Country::class);
   }

   public function state()
   {
        return $this->belongsTo(State::class);
   }

   public function city()
   {
        return $this->belongsTo(City::class);
   }

   public function department()
   {
        return $this->belongsTo(Department::class);
   }
}
