<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('blog_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_id')->unsigned()->nullable()->index();
            $table->string('image_name')->nullable();
            //----common fields
            $table->timestamps();
            $table->softDeletes();
            //----/common fields

        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('create_blog_images_table');
    }
}
