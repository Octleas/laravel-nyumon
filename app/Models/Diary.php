<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    // 必要に応じて、fillableプロパティを設定
    protected $fillable = ['date', 'title', 'body'];
}