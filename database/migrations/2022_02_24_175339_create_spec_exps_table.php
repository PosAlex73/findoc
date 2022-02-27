<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spec_exps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('start')->nullable(false);
            $table->date('end')->nullable(true);
            $table->unsignedBigInteger('spec_id');
            $table->foreign('spec_id')->references('id')->on('specs')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('spec_spec_exp', function (Blueprint $table) {
            $table->unsignedBigInteger('spec_id');
            $table->unsignedBigInteger('exp_id');
            $table->foreign('spec_id')->references('id')->on('specs')->cascadeOnDelete();
            $table->foreign('exp_id')->references('id')->on('spec_exps')->cascadeOnDelete();
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
        Schema::dropIfExists('spec_exps');
        Schema::dropIfExists('spec_spec_exp');
    }
};
