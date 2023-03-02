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
        Schema::create('tb_menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu');
            $table->integer('harga');
            $table->integer('jenis');
            $table->integer('jenismenu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('tb_menus');
    }
};
