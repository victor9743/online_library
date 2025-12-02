<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'author_id', 'category_id', 'value', 'status'];

    const STATUS_AVAILABLE = 'disponivel';
    const STATUS_RESERVED = 'reservado';
    const STATUS_RENTED   = 'alugado';

    public static function statuses()
    {
        return [
            self::STATUS_AVAILABLE => 'Disponível',
            self::STATUS_RESERVED  => 'Reservado',
            self::STATUS_RENTED    => 'Alugado',
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
