<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    // Table Name
    protected $table = 'clubs';
    //Primary Key
    public $primarykey = 'id';
    //Timestamps
    public $timestamps = true;
    //Category
    protected $fillable = ['category_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
}
