<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLableInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('new')->default(0)->after('img');
            $table->boolean('recommend')->default(0)->after('new');
            $table->boolean('hit')->default(0)->after('recommend');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('new')->default(0);
            $table->dropColumn('recommend')->default(0);
            $table->dropColumn('hit')->default(0);
        });
    }
}
