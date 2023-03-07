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
            $table->string('asset_tag')->unique();
            $table->string('photo');
            $table->string('name');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->foreignId('asset_type_id')->constrained('asset_types');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('location_id')->constrained('locations');
            $table->string('serial')->nullable();
            $table->integer('warranty')->nullable();
            $table->integer('cost');
            $table->boolean('isCheckin')->default(true);
            $table->string('status');
            $table->date('purchase_date');
            $table->text('describe')->nullable();
            $table->timestamps();

            /**
             * ===================================================================
             * |-------------------------- CATATAN KECIL -------------------------
             * ===================================================================
             *
             *  # ASSET-TAG = Nomor unik dari asset
             *
             *  # SERIAL = Nomor bawaan dari pabrik asset tersebut
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
        Schema::dropIfExists('assets');
    }
}
