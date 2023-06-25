<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLocationsTable extends Migration
{
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->unsignedBigInteger('cetagory_id')->nullable();
            $table->foreign('cetagory_id', 'cetagory_fk_8640502')->references('id')->on('categories');
        });
    }
}
