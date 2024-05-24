<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModels extends Model
{
    use HasFactory;
    protected $table='product';
    protected $primaryKey = 'ProID';
    protected $fillable=[
        'ProID',
        'CatID',
        'Metatitle',
        'ProName',
        'ProDescription',
        'ProColor',
        'Materials',
        'Size',
        'ProImage',
        'Tags',
        'MoreImage',
        'created_at',
        'CreateBy',
        'MetaDescriptions',
        'Displayhome',
        'Status',
        'inventory',
        'sold',
        'updated_at' 
    ];
}
