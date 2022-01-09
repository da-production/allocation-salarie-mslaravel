<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('num_assurance',12);
            $table->string('code_employeur',10);
            $table->string('code_agence');
            $table->string('code_commune');
            $table->string('nom_fr');
            $table->string('prenom_fr');
            $table->string('nom_ar')->nullable();
            $table->string('prenom_ar')->nullable();
            $table->string('date_naissance');
            $table->string('lieu_naissance');
            $table->string('adresse_fr');
            $table->string('adresse_ar');
            $table->string('email');
            $table->string('tel_mobile_1');
            $table->string('tel_mobile_2')->nullable();
            $table->string('fix')->nullable();
            $table->timestamp('date_debut_allocation')->nullable();
            $table->timestamp('date_fin_allocation')->nullable();
            $table->timestamp('duree_allocation')->nullable();
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
        Schema::dropIfExists('salaries');
    }
}
