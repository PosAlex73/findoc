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
        Schema::create('specs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->text('description');
            $table->text('education');
            $table->integer('experience');
            $table->string('phone', 32)->nullable();
            $table->string('address')->nullable();
            $table->string('spec_status', 1)->default(\App\Enums\Specs\SpecStatuses::ACTIVE);
            $table->timestamps();
        });

        Schema::create('spec_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('specialization_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('specialization_id')->references('id')->on('specializations')->cascadeOnDelete();
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
        Schema::dropIfExists('specs');
        Schema::dropIfExists('spec_user');
        Schema::dropIfExists('spec_spec_exp');
    }
};
