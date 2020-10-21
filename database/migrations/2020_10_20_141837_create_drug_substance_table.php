<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugSubstanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_substance', function (Blueprint $table) {
            $table->foreignId('drug_id');
            $table->foreignId('substance_id');
            $table->timestamps();

            $table->primary(['drug_id', 'substance_id']);
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
            $table->foreign('substance_id')->references('id')->on('substances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drug_substance');
    }
}
