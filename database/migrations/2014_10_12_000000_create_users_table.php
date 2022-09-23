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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('account_id')->references('id')->on('account')->onDelete('cascade');
            // $table->foreignId('account_id')->constrained('account')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('document_type', ['CPF', 'CNPJ']);
            $table->string('document_number');
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
};
