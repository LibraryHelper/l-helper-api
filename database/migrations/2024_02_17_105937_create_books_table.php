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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('isbn');
            $table->integer('page_count');
            $table->date('published_at');
            $table->foreignId('cover_image_id')->constrained('files');
            $table->text('description');
            $table->string('slug')->unique();
            $table->integer('cover_type')->default(1);
            $table->foreignId('language_id')->index()->constrained('book_languages');
            $table->foreignId('publisher_id')->index()->constrained('publishers');
            $table->integer('status')->index()->default(1);
            $table->foreignId('organization_id')->index()->constrained('organizations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
