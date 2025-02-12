<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cat_images', function (Blueprint $table) {
            $table->id();
            $table->string('_id')->unique();
            $table->string('mimetype');
            $table->integer('size')->default(0);
            $table->json('tags')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cat_images');
    }
};
