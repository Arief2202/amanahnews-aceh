<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    
    public function post(){
        return $this->belongsTo(post::class, 'post_id', 'id');
    }
    public function tagname(){
        return $this->belongsTo(tagname::class);
    }
}
