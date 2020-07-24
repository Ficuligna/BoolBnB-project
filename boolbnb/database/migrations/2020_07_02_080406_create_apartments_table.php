<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('mq');
            $table->string('address');
            $table->float('longitude', 11,5);
            $table->float('latitude',11,5);
            $table->tinyInteger('rooms');
            $table->tinyInteger('bathrooms');
            $table->tinyInteger('beds');
            $table->string('images')->nullable();
            $table->text('description')->nullable();
            $table->boolean('visibility');
            // $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->bigInteger('user_id')->unsigned()->index();
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
        Schema::dropIfExists('apartments');
    }
}
