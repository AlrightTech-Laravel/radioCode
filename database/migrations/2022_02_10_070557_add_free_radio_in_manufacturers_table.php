<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFreeRadioInManufacturersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('manufacturers', function (Blueprint $table) {
            $table->boolean('is_free_radio')->default(0);
            $table->string('hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('manufacturers', function (Blueprint $table) {
            $table->dropColumn('is_free_radio');
            $table->dropColumn('hours');
        });
    }
}
