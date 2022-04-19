<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'id',       
        'user',    
        'renavam',
        'license_plate',
        'model',
        'category',
        'color',
        'fuel',
        'year',
        'sale_price',
        'rental_price',
        'description',
        'native_wifi',
        'emergency_branking_system',
        'easy_park',
        'sunroof', 
        'reversing_camera',
        'stability_and_traction_system',
        'remote_start',
        'air_bag',
        'eletric_windowscreen',
        'air_conditioner',
        'eletric_lock',
        'hydraulic_steering',
        'abs',
        'status',
        'brand',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user', 'id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand', 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category', 'id');
    }
    public function model(){
        return $this->belongsTo(ModelCar::class, 'model', 'id');
    }
    public function images()
    {
        return $this->hasMany(VehicleImage::class, 'vehicle', 'id');
    }
    public function setSalePriceAttribute($value)
    {
        $this->attributes['sale_price'] = $this->convertStringToDouble($value);
    }
    public function getSalePriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }
    public function setRentalPriceAttribute($value)
    {
        $this->attributes['rental_price'] = $this->convertStringToDouble($value);
    }
    public function getRentalPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setNativeWifiAttribute($value)
    {
        $this->attributes['native_wifi'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setEmergencyBrankingSystemAttribute($value)
    {
        $this->attributes['emergency_branking_system'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setEasyParkAttribute($value)
    {
        $this->attributes['easy_park'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setSunroofAttribute($value)
    {
        $this->attributes['sunroof'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setReversingCameraAttribute($value)
    {
        $this->attributes['reversing_camera'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setStabilityAndTractionSystemAttribute($value)
    {
        $this->attributes['stability_and_traction_system'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setRemoteStartAttribute($value)
    {
        $this->attributes['remote_start'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setAirBagAttribute($value)
    {
        $this->attributes['air_bag'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setEletricWindowscreenAttribute($value)
    {
        $this->attributes['eletric_windowscreen'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setAirConditionerAttribute($value)
    {
        $this->attributes['air_conditioner'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setEletricLockAttribute($value)
    {
        $this->attributes['eletric_lock'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setHydraulicSteeringAttribute($value)
    {
        $this->attributes['hydraulic_steering'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setAbsAttribute($value)
    {
        $this->attributes['abs'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value;
    }
    public function setBrandAttribute($value)
    {
        $this->attributes['brand'] = $value;
    }
    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = $value;
    }
    public function setModelAttribute($value)
    {
        $this->attributes['model'] = $value;
    }
    public function convertStringToDouble($value){
        if(empty($value)) 
            return null;
        else{
            return floatval(str_replace(',', '.', str_replace('.', '', $value)));
        }
    }
}
