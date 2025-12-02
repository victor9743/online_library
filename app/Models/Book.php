<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'author_id', 'category_id', 'value', 'status'];

    const STATUS_AVAILABLE = 'available';
    const STATUS_RESERVED = 'reserved';
    const STATUS_RENTED   = 'rented';

    public static function statuses()
    {
        return [
            self::STATUS_AVAILABLE => 'Available',
            self::STATUS_RESERVED  => 'Reserved',
            self::STATUS_RENTED    => 'Rented',
        ];
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
