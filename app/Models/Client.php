<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','contact','price','pic', 'email', 'appetizers', 'salads', 'main_courses', 'beverages', 'desserts'];



    protected $appends = ['picUrl'];

    public function getPicUrlAttribute() {
        $url = $this->pic ? asset("images/product_pics/" . $this->pic) : "https://images.squarespace-cdn.com/content/v1/5fe4caeadae61a2f19719512/1610097535850-B8AXDZC1QW4LKYZCS51X/11.jpg";
        return $url;
    }

}
