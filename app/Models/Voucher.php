<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Atributos
    public function getCheckAttribute(){
        return $this->customers->contains(session('customer')->id);
    }

    public function getContadorAttribute(){
        
        if($this->codes()->where('customer_id', session('customer')->id)->count()){
            return true;
        }else{

            if(!$this->url && $this->codes()->where('customer_id', null)->count()){
                return true;
            }elseif ($this->url) {
                return true;
            }else{
                return false;
            }
        }
        
    }

    //Query Scopes

    public function scopeBrand($query, $brand_id){
        if($brand_id){
            return $query->where('brand_id', $brand_id);
        }
    }

    protected $casts = [
        'expiration_date' => 'datetime:Y-m-d',
    ];


    //Relacion uno a uno

    public function video(){
        return $this->hasOne(Video::class);
    }

    public function exchanged(){
        return $this->hasOne(Exchanged::class);
    }

    //Relacion uno a muchos

    public function codes(){
        return $this->hasMany(Code::class);
    }


    //Relacion uno a muchos inversa

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    //Relacion muchos a muchos

    public function customers(){
        return $this->belongsToMany(Customer::class,'favorites');
    }
}
