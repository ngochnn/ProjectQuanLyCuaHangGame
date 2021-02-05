<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntroproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('introproducts', function (Blueprint $table) {
            $table->id();
             //bo sung
                    $table->string('product_name',100);
                    $table->integer('product_id');
					$table->integer('price');
                    $table->text('image');
                    $table->text('number');
                    $table->text('detail');
			//ket thuc
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
        Schema::dropIfExists('introproducts');
    }
}
