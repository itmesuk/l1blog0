<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    // แสดงบทความตามรหัสผู้เขียน
    public function scopeUserID($query)
    {
        return $query->where('user_id', 0);
    }

    // แสดงจำนวนผู้เข้าชมมากกว่า 50
    public function scopeVisitor($query)
    {
        return $query->where('visitors', '>=', 50);
    }
}
