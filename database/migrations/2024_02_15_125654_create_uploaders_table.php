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
        Schema::create('uploaders', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('upload')->nullable();
            $table->string('upload_required');
            $table->text('upload_multiple')->nullable();
            $table->text('upload_multiple_required');
            $table->text('dropzone')->nullable();
            $table->text('dropzone_required');
            $table->text('easymde')->nullable();
            $table->json('gallery')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploaders');
    }
};
