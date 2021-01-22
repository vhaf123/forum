<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relacion uno a muchos

    public function brands(){
        return $this->hasMany(Brand::class);
    }

    //Relacion Has Many Through

    public function vouchers(){
        return $this->hasManyThrough(Voucher::class, Brand::class);
    }
}
