<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    use HasFactory;
    protected $fillable = [
      'balance',
      'description',
      'status_cash',
      'category_id',
      'user_id',
      'published_at'
    ];

    public function category() {
      return $this->belongsTo(Category::class, 'category_id');
    }

    public function user() {
      return $this->hasOne(User::class);
    }
}
