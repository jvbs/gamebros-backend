<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdressColumnsOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('cep');
            $table->string('address');
            $table->integer('address_number');
            $table->string('address_complement');
            $table->string('address_city');
            $table->string('address_uf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('cep');
            $table->dropColumn('address');
            $table->dropColumn('address_number');
            $table->dropColumn('address_complement');
            $table->dropColumn('address_city');
            $table->dropColumn('address_uf');
        });
    }
}
