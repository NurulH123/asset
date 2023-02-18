<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_tag');
            $table->string('photo');
            $table->string('name');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->foreignId('asset_type_id')->constrained('asset_types');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('location_id')->constrained('locations');
            $table->string('serial');
            $table->integer('warranty');
            $table->integer('cost');
            $table->boolean('is_checkout');
            $table->string('status');
            $table->text('describe');
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
        Schema::dropIfExists('assets');
    }
}
