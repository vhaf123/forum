<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'last_name', 'rut'];


    //Relacion uno a muchos

    public function exchangeds(){
        return $this->hasMany(Exchanged::class);
    }

    //Relacion muchos a muchos

    public function vouchers(){
        return $this->belongsToMany(Voucher::class, 'favorites');
    }
}
