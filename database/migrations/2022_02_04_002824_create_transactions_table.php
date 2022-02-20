<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');  
            $table->string('items_name',150);
            $table->string('items_description',150);
            $table->unsignedInteger('qty');
            $table->unsignedBigInteger('uom_id');
            $table->foreign('uom_id')->references('id')->on('uoms')->onDelete('cascade');
            $table->unsignedInteger('price');  
            $table->unsignedInteger('money');
            $table->unsignedInteger('money_change');
            $table->char('status',1)->comment('0 is Purchase, 1 is Sale');      
            $table->string('created_by',150);      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
            $table->dropForeign(['uom_id']);
        });
        Schema::dropIfExists('transactions');
    }
}
