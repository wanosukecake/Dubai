<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();
        // 保存時user_idをログインユーザーに設定
        self::saving(function($post) {
            $post->user_id = Auth::id();
        });
    }
}
