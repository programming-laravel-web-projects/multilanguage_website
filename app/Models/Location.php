<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $fillable = [
        'name',
        'is_active',               
    ];

    public function locationsettings(): HasMany
    {
        return $this->hasMany(LocationSetting::class,'location_id');
    }
}
