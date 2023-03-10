<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name_category'];

    public function cash() {
      return $this->hasOne(Cash::class, 'category_id');
    }

    public function report() {
      return $this->hasOne(Report::class, 'category_id');
    }
}
