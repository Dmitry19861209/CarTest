<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarModelServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_model_service', function (Blueprint $table) {
            $table->increments('service_id');
            $table->integer('model_id', false, true);//Поле для foreign key должно быть integer и ->unsigned()
            $table->string('service_name', 30);
            $table->string('price', 30);
            $table->timestamps();
        });

        Schema::table('car_model_service', function (Blueprint $table) {
            $table->foreign('model_id')->references('model_id')->on('car_model')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_model_service', function (Blueprint $table) {
            $table->dropForeign(['model_id']);//Чтобы удалить ключ по его названию, нужно поместить его в массив.
        });
        Schema::dropIfExists('car_model_service');
    }
}
