<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("students", function (Blueprint $table) {
            $table->uuid("file_no");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("surname");
            $table->string("personal_photo");
            $table->date("birth_date");
            $table->string("nationality");
            $table->string("birth_country");
            $table->enum("gender",["male","female"]);
            $table->string("passport_image")->nullable();
            $table->string("graduation_degree");
            $table->text("graduation_certificates_photos")->nullable();
            $table->tinyInteger("status");// 0 => inactive , 1 => active
            $table->timestampsTz();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("students");
    }
}
