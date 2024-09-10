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
        Schema::create('flag_model', function (Blueprint $table) {
            $table->foreignId('flag_id')->constrained()->cascadeOnDelete();
            $table->morphs('flaggable');
            $table->timestamps();

            $table->primary(['flag_id', 'flaggable_id', 'flaggable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flag_model');
    }
};
