<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchanged extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'code_id'];

    //Relacion uno a uno inversa

    public function code(){
        return $this->belongsTo(Code::class);
    }

    //Relacion uno a muchos inversa

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
