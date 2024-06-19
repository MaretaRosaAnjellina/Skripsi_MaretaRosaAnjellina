<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('title_innovation')->nullable();
            $table->string('category_innovation')->nullable();
            $table->string('name_leader')->nullable();
            $table->string('nik_leader')->nullable();
            $table->string('work_unit')->nullable();
            $table->string('name_member_1')->nullable();
            $table->string('nik_member_1')->nullable();
            $table->string('name_member_2')->nullable();
            $table->string('nik_member_2')->nullable();
            $table->string('name_member_3')->nullable();
            $table->string('nik_member_3')->nullable();
            $table->string('name_member_4')->nullable();
            $table->string('nik_member_4')->nullable();
            $table->string('name_member_5')->nullable();
            $table->string('nik_member_5')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
