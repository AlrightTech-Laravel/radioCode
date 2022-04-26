<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('logo')->nullable();
            $table->text('image')->nullable();
            $table->integer('price')->default(0);
            $table->string('delivery_time', 125)->nullable();
            $table->integer('status')->default(1);
            $table->text('required_fields')->nullable();
            $table->longText('description')->nullable();
            $table->longText('how_it_works')->nullable();
            $table->boolean('popular')->default(0);
            $table->boolean('linked')->default(0);
            $table->foreignId('category_id')->constrained('manufacturer_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('manufacturers');
    }
}
