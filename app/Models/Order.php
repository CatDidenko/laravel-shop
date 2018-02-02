<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Order extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['status'];
    //protected $hidden = ['count'];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function products()
    {
      return $this->belongsToMany('App\Models\Product')->withPivot('count');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getCountAttribute()
    {
        $counts = [];

        foreach($this->products as $product)
        {
            $counts[] = $product->pivot->count;
        }

        return $counts;

        //return $count = $product->pivot->count;
    }

    public function getTotalAttribute()
    {
        $prices = [];
        
        foreach($this->products as $product)
        {
            $prices[] = $product->pivot->count * $product->price;
        }

        return array_sum($prices);
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
