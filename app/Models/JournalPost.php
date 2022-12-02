<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalPost extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author_id',
    ];
    use HasFactory;
}
