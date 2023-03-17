<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTexonomiesColumnToBlogModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('blog', function (Blueprint $table) {
            $table->string('taxonomies')->after('slug')->nullable()->index();
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('add_texonomies_column_to_blog_module');
    }
}
