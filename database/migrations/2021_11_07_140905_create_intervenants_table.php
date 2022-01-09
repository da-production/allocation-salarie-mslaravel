<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nom_fr');
            $table->string('preniom_fr');
            $table->string('nom_ar')->nullable();
            $table->string('preniom_ar')->nullable();
            $table->string('fonction');
            $table->string('code_agence');
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
        Schema::dropIfExists('intervenants');
    }
}
