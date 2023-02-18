<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('name');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->foreignId('asset_type_id')->constrained('asset_types');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('location_id')->constrained('locations');
            $table->string('serial');
            $table->integer('quantity');
            $table->integer('available_quantity');
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
        Schema::dropIfExists('components');
    }
}
