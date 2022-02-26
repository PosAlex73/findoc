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
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('status', 1)->nullable(false)->default(\App\Enums\Specs\ClinicStatuses::ACTIVE);
            $table->year('found');
            $table->string('phone', 64);
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('category_clinic', function (Blueprint $table) {
           $table->unsignedBigInteger('category_id');
           $table->unsignedBigInteger('clinic_id');
           $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
           $table->foreign('clinic_id')->references('id')->on('clinics')->cascadeOnDelete();
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
        Schema::dropIfExists('clinics');
        Schema::dropIfExists('category_clinic');
    }
};
