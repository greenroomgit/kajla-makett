<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->boolean('published');
            $table->string('caption');
            $table->string('picture');
            $table->string('thumb');
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
        Schema::dropIfExists('photo_uploads');
    }
}
