<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned()->change();
        	$table->foreign('order_id')->references('id')->on('orders')
            	->onUpdate('cascade')
            	->onDelete('cascade');
            
        	$table->bigInteger('product_id')->unsigned()->change();
        	$table->foreign('product_id')->references('id')->on('products')
            	->onUpdate('cascade')
            	->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('order_details_order_id_foreign');
    	});

	    Schema::table('order_details', function(Blueprint $table) {
    	    $table->dropIndex('order_details_order_id_foreign');
    	});

	    Schema::table('order_details', function(Blueprint $table) {
    	    $table->bigInteger('order_id')->change();
    	});

	    Schema::table('order_details', function(Blueprint $table) {
    	    $table->dropForeign('order_details_product_id_foreign');
    	});

	    Schema::table('order_details', function(Blueprint $table) {
    	    $table->dropIndex('order_details_product_id_foreign');
    	});

	    Schema::table('order_details', function(Blueprint $table) {
    	    $table->bigInteger('product_id')->change();
        });
    }
};


