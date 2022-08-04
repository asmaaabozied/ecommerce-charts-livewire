<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Perfume;
use App\Models\review_rating;

class seller extends Model
{
    protected $guarded = [];
    protected $table = 'sellers';
    protected $appends = ['image_path'];

    public function perfumeData()
    {
    return $this->hasMany('App\Models\Perfume','seller_id');
    }

    public function reviewData()
    {
    return $this->hasMany('App\Models\review_rating','seller_Id');
    }

    public function getImagePathAttribute()
    {
        return asset('images/sellers/' . $this->profile_image);

    }//end of get image path

    public function getImagePathAttribute1()
    {
        return asset('images/sellers/' . $this->background_image);

    }//end of get image path

    public function getNameAttribute()
    {
            return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }// end of get name

}
