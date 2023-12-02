<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wines', function (Blueprint $table) {
            $table->id();
            $table->text('Nom');
            $table->text('Description');
            $table->double('Degre_alcool'); 
            $table->text('Image');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('producteur_id');
            $table->foreign('producteur_id')
                    ->references('id')
                    ->on('producteurs')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->double('Prix_vin');
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
        Schema::dropIfExists('wines');
    }
}
