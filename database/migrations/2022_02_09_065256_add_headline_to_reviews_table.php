<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeadlineToReviewsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('headline', 255);
            $table->integer('rating');
            $table->boolean('status')->default(false);
            $table->foreignId('radio_code')->constrained('manufacturer_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('headline');
            $table->dropColumn('rating');
            $table->dropColumn('status');
            $table->dropForeign('radio_code');
            $table->dropColumn('radio_code');
        });
    }
}
