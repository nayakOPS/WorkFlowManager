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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            $table->string('avatar', 255)->nullable(); // Avatar URL or file path
            $table->boolean('is_active'); // Tracks online/offline status
            $table->string('name', 255); // User's full name
            $table->string('email', 255)->unique(); // Unique email address
            $table->timestamp('email_verified_at')->nullable(); // Email verification timestamp
            $table->string('password', 255); // Hashed password
            $table->text('address')->nullable(); // User’s address
            $table->string('contact', 20)->nullable(); // Contact number
            $table->rememberToken(); // Remember token column
            $table->timestamps(); // created_at and updated_at timestamps
            $table->timestamp('last_login_at')->nullable(); // Last login timestamp
            $table->softDeletes(); // Soft delete column (deleted_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
