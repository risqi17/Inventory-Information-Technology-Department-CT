<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets_management', function (Blueprint $table) {
            $table->id();
            $table->string('asset_number');
            $table->string('service_tag');
            $table->string('product_name');
            $table->string('specification');
            $table->integer('category_id');
            $table->string('uuid');
            $table->integer('quantity');
            $table->integer('status');
            $table->integer('status_checkin');
            $table->dateTime('purchase_date');
            $table->integer('warranty');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets_management');
    }
}
