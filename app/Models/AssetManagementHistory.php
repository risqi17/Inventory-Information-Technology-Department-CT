<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetManagementHistory extends Model
{
    use HasFactory;

    protected $table = 'assets_management_history';
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
    protected $fillable = ['asset_number','service_tag','product_name','specification','department_id','category_id','user','uuid','quantity','checkin','checkout','status','updated_by', 'created_by','created_at','updated_at'];
}
