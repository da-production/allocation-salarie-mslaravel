<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salarie_id')->constrained()->cascadeOnDelete();
            $table->string('code_demande');
            $table->string('type_demande');
            $table->integer('decision')->nullable();
            $table->timestamp('date_decision')->nullable();
            $table->integer('motif')->nullable();
            $table->string('justification')->nullable();
            $table->timestamp('date_supression')->nullable();
            $table->timestamp('date_retablissement_indemnite')->nullable();
            $table->string('titre_attestation');
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
        Schema::dropIfExists('demandes');
    }
}
