<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criar no modo addresses no bd
        Schema::create('addresses',function(Blueprint $table) {
            $table->id();
            $table->string('addreses');
            $table->string('number');
            $table->string('district');
            $table->string('cep');
            $table->string('complement')->nullable();
            $table->char('state',length:'7');
            $table->string('city');
            $table->string('cnpj')->nullable();
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
        Schema::dropIfExists(table:('addresses'));
    }
};
