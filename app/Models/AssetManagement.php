<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class AssetManagement extends Model
{
    use HasFactory;

    protected $table = 'assets_management';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['asset_number','service_tag','product_name','specification','warranty','category_id','purchase_date','uuid','quantity','status_checkin','status','image','condition','updated_by', 'created_by','created_at','updated_at'];


    public function setCoditionAttribute($value)
    {
        $this->attributes['condition'] = json_encode($value);
    }
  
    /**
     * Get the categories
     *
     */
    public function getConditionAttribute($value)
    {
        return $this->attributes['condition'] = json_decode($value);
    }

    
}
