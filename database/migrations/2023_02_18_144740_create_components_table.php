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
            $table->boolean('isCheck-in')->default(true);
            $table->string('status');
            $table->date('purchase_date');
            $table->text('describe');
            $table->timestamps();

            /**
             * ===================================================================
             * |-------------------------- CATATAN KECIL -------------------------
             * ===================================================================
             *
             *  # SERIAL = Nomor bawaan dari pabrik asset tersebut
             *
             *  # QUANTITY = Jumlah total asset / barang
             *
             *  # AVAILABLE QUANTITY = Jumlah asset yg ada ditempat (masih nganggur)
             *
             *  # IS CHECK-IN : - 1 = Barang saat ini tersedia ditempat (default)
             *                  - 0 = Saat ini barang sedang dipakai (tidak ada ditempat)
             *
             *  # STATUS : - READY TO DEPLOY = Siap untuk disebarkan
             *             - PENDING = Pending
             *             - ARCHIVED = Diarsipkan
             *             - BROKEN = Barang sedang rusak
             *             - LOST = Barang hilang
             *             - OUT OF REPAIR = Baru keluar dari perbaikan
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
        Schema::dropIfExists('components');
    }
}
