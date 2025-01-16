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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Original file name
            $table->string('path'); // File path or URL
            $table->string('type')->nullable(); // File type (e.g., image, document)
            $table->string('extension')->nullable(); // File extension (e.g., jpg, png)
            $table->unsignedBigInteger('size')->nullable(); // File size in bytes
            $table->morphs('fileable'); // Polymorphic relation (fileable_id, fileable_type)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
