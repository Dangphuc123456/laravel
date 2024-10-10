<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
        'ProImage',
        'Tags',
        'MoreImage',
        'created_at',
        'CreateBy',
        'MetaDescriptions',
        'Displayhome',
        'Status',
        'inventory',
        'price',
        'sold',
        'Discount',
        'DiscountedPrice',
        'quantity',
        'updated_at' 
    ];
    public function order()
    {
        return $this->belongsToMany(OrderModel::class, 'cart', 'ProID', 'OrdID')
                    ->withPivot('Quantity', 'Price');
    }
}
