<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'namebookstory','descriptionbookstory','categories_id','slug_bookstory','imgaebookstory','active'

    ];
    protected $primaryKey = 'id';
    protected $table = 'bookstory';
}
