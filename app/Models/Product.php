<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\ProductSaved;
class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = [
        'name',
        'category_id',
        'branding_id',
        'size_id',
        'price',
        'sale',
        'content',
        'images',
        'images_detail',
        'price_sale'
    ];

    public function save(array $options = [])
    {
        if (!isset($this->attributes['sale'])) {
            $this->attributes['sale'] = 0;
        }

        return parent::save($options);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value;
 
        $this->calculateSalePrice();
    }

    public function setSaleAttribute($value)
    {
        $this->attributes['sale'] = $value;
        $this->calculateSalePrice();
    }

    private function calculateSalePrice()
    {

        if ($this->price &&  $this->sale) {
            
            $discountedPrice = $this->price - ($this->price * $this->sale / 100);
            
            $this->attributes['price_sale'] = $discountedPrice;
        }
        else{
            
            $this->attributes['price_sale'] = $this->price;
        }
    }

    public function setDetailAttribute($detail)
    {
       
        if (is_array($detail)) {
            $this->attributes['images_detail'] = json_encode($detail);
        }
    }

    public function getDetailAttribute($detail)
    {
        return json_decode($detail, true);
    }

    public function setSizeAttribute($size)
    {
        if (is_array($size)) {
            $this->attributes['size_id'] = json_encode($size);
        }
    }

    public function getSizeAttribute($size)
    {
        return json_decode($size, true);
    }

    
}
