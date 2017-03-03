<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGraduationsDegree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("graduation_degrees",function(Blueprint $table){
           $table->increments("degree_id");
           $table->string("degree_name");
           $table->integer("required_certificate_images")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("graduation_degrees");
    }
}
