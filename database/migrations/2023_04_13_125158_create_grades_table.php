<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('grade');
            $table->integer('min_grade');
            $table->integer('max_grade');
            $table->longText('photo_grade');
            $table->timestamps();
        });
        DB::table('grades')->insert([
            [
                'grade' => 'Fer',
                'min_grade' => 00,
                'max_grade' => 100,
                'photo_grade' => '', // Add the photo_grade data here or leave it empty
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade' => 'Bronze',
                'min_grade' => 101,
                'max_grade' => 250,
                'photo_grade' => '', // Add the photo_grade data here or leave it empty
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade' => 'Argent',
                'min_grade' => 251,
                'max_grade' => 450,
                'photo_grade' => '', // Add the photo_grade data here or leave it empty
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade' => 'Or',
                'min_grade' => 451,
                'max_grade' => 700,
                'photo_grade' => '', // Add the photo_grade data here or leave it empty
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade' => 'Platine',
                'min_grade' => 701,
                'max_grade' => 1000,
                'photo_grade' => '', // Add the photo_grade data here or leave it empty
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade' => 'Diamant',
                'min_grade' => 1001,
                'max_grade' => 1350,
                'photo_grade' => '', // Add the photo_grade data here or leave it empty
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade' => 'Maître',
                'min_grade' => 1351,
                'max_grade' => 1750,
                'photo_grade' => '', // Add the photo_grade data here or leave it empty
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade' => 'Grand Maître',
                'min_grade' => 1751,
                'max_grade' => 2300,
                'photo_grade' => '', // Add the photo_grade data here or leave it empty
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade' => 'Challenger',
                'min_grade' => 2301,
                'max_grade' => 2800,
                'photo_grade' => '', // Add the photo_grade data here or leave it empty
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
