<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerialsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('serials', function (Blueprint $table) {
            $table->id();
            $table->string('regex')->nullable();
            $table->string('regex_partial')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('time')->nullable();
            $table->string('timing_msg')->nullable();
            $table->double('price')->nullable();
            $table->text('required_fields')->nullable();
            $table->foreignId('manufacturer_id')->constrained('manufacturers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('serials');
    }
}
