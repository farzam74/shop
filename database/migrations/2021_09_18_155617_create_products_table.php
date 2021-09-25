<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Category::class);
            $table->tinyText('en_title');
            $table->tinyText('fa_title');
            $table->text('description');
            $table->integer('price');
            $table->tinyInteger('discount');
            $table->tinyInteger('rate');
            $table->integer('view_counter');
            $table->string('status');
            $table->json('other_atts');
            $table->string('primary_img');
            $table->json('other_img');
//            $table->tinyText('slug');    TODO: implements as getter in product model
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
        Schema::dropIfExists('products');
    }
}
