<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formdata extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable=[
        'name',
        'email',
        'age',
        'address'
    ];

    public function desig(){
        return $this->hasOne(Designation::class,'user_id');
    }
    
}
