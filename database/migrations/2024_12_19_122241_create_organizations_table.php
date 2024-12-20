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
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('avatar', 255)->nullable(); // Store avatar URL or file path
            $table->string('name', 255);
            $table->text('address');
            $table->string('phone', 20)->nullable();
            $table->text('description');
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at for soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
