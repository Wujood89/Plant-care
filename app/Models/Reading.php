<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    use HasFactory;

    protected $fillable = ['sensor_name', 'value'];

    public function record()
    {
        return $this->hasOne(Record::class);
    }
}