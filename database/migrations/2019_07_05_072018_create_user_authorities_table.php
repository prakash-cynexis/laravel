<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAuthoritiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_authorities', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary();
            $table->string('name');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('name')->references('name')->on('authorities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('user_authorities');
    }
}
