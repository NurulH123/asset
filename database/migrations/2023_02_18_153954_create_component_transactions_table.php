<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('assets');
            $table->foreignId('component_id')->constrained('components');
            $table->integer('quantity');
            $table->string('status');
            $table->timestamps();

            /**
             * ===================================================================
             * |-------------------------- CATATAN KECIL -------------------------
             * ===================================================================
             *
             *  # QUANTITY = Jumlah yg dipakai untuk satu jenis asset
             *
             *  # STATUS = - checkout
             *             - check-in
             *
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_transactions');
    }
}
