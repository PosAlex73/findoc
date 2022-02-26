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
        Schema::create('spec_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spec_id');
            $table->foreign('spec_id')->references('id')->on('specs')->cascadeOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('type', 1)->nullable(false)->default(\App\Enums\Reviews\ReviewTypes::VISIBLE);
            $table->string('rating', 1)->nullable(true);
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
        Schema::dropIfExists('spec_reviews');
    }
};
