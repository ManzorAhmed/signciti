<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_category_id');
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->longText('paragraph1');
            $table->longText('paragraph2');
            $table->longText('paragraph3');
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('featured_image')->nullable();
            $table->string('blog_image')->nullable();
            $table->string('blog_image2')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('blog_posts');
    }
}
