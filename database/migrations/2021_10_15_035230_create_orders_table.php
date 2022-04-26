<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')->constrained('manufacturers')->onDelete('cascade');
            $table->string('name', 255)->nullable();
            $table->string('email', 255);
            $table->string('charge_id', 255)->nullable();
            $table->string('method')->default('stripe');
            $table->string('serial_number');
            $table->text('required_fields')->nullable();
            $table->text('image')->nullable();
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->integer('charged_price');
            $table->string('radio_code')->nullable();
            $table->unsignedSmallInteger('payment_status')->default(1);
            $table->unsignedSmallInteger('status')->default(1);
            $table->timestamps();
            // DB::statement("ALTER TABLE users AUTO_INCREMENT = 120562;");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders');
    }
}
