<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->float('rating', 15, 1)->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->text('lat')->nullable();
            $table->text('lng')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
