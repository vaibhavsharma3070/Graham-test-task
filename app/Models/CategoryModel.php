<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $primaryKey = 'category_id';
    protected $fillable = ['name', 'parent_id', 'sort_order'];


    public function categories()
    {
        return $this->hasMany(CategoryModel::class, 'parent_id', 'category_id')->orderBy('sort_order', 'ASC');
    }
}
