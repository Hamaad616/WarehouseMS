<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToProductItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_item', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('client_id')->nullable();
            $table->foreign('category_id')->on('categories')->references('id')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_item', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
        });
    }
}
