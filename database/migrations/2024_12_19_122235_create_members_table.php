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
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            $table->integer('role'); // Role (0 = Owner, 1 = Admin, 2 = Member, 3 = Guest)
            $table->bigInteger('user_id')->unsigned(); // Foreign key referencing users.id
            $table->bigInteger('org_id')->unsigned(); // Foreign key referencing organizations.id
            $table->integer('status')->default(0); // Status (0 = Active, 1 = Suspended, 2 = Left)
            $table->timestamps(); // created_at and updated_at timestamps
            $table->softDeletes(); // Soft delete column (deleted_at)

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('org_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
