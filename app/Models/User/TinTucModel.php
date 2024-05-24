<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTucModel extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'author',
        'content_1',
        'content_2',
        'content_3',
        'image_1',
        'image_2',
        'image_3',
        'created_at',
        'updated_at'
    ];
}
