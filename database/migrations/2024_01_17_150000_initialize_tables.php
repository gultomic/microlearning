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
        Schema::create('configs', function (Blueprint $table) {
            $table->string('identity')->unique();
            $table->json('body');
            $table->index([
                'identity'
            ]);
        });

        Schema::create('microlearning', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->unique();
            $table->boolean('active')->default(false);
            $table->json('refs')->nullable();
            $table->timestamps();
        });

        Schema::create('pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('microlearning_id')->constrained('microlearning')->cascadeOnDelete();
            $table->unsignedTinyInteger('nomor');
            $table->string('judul');
            $table->json('refs')->nullable();
            $table->timestamps();
        });

        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembelajaran_id')->constrained('pembelajaran')->cascadeOnDelete();
            $table->unsignedTinyInteger('nomor');
            $table->string('judul');
            $table->json('refs')->nullable();
            $table->timestamps();
        });

        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembelajaran_id')->constrained('pembelajaran')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->json('refs')->nullable();
            $table->timestamps();
        });

        Schema::create('kelas_materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('kelas')->cascadeOnDelete();
            $table->foreignId('materi_id')->constrained('materi')->cascadeOnDelete();
            $table->json('refs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('configs');
        Schema::dropIfExists('microlearning');
        Schema::dropIfExists('pembelajaran');
        Schema::dropIfExists('materi');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('kelas_materi');
        Schema::enableForeignKeyConstraints();
    }
};
