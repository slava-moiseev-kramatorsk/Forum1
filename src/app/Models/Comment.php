<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comment'
    ];
    public function forum(){
        return $this->belongsTo(Forum::class);
    }
    public function reply(){
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
