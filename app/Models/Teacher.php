<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    protected static function boot()
    {
        parent::boot();
        // 保存時user_idをログインユーザーに設定
        self::saving(function($post) {
            $post->user_id = Auth::id();
        });
    }
}
