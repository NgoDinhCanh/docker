<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'namecategory','describecategory','active','slug_category'

    ];
    protected $primaryKey = 'id';
    protected $table = 'categories';
    
    public function BookStory()
    {   
        # code...
        return $this->hasMany('App\Models\BookStory');
    }
}
