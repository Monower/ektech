<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $fillable=[
        'designation',
        'user_id'
    ];

    public function form(){
        return $this->belongsTo(Formdata::class,'id');
    }
}
