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
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255);
            $table->text('description');
            $table->timestamp('completed_at')->nullable(); // When the task was completed
            $table->bigInteger('assigned_to')->unsigned();
            $table->bigInteger('completed_by')->unsigned()->nullable();
            $table->text('notes')->nullable(); // Additional notes or comments
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('project_id')->unsigned();
            $table->integer('status'); // 0: To-Do, 1: In-progress, 2: Completed, 3: On-hold
            $table->date('due_at')->nullable();
            $table->softDeletes(); // deleted_at for soft delete
            $table->timestamps(); // created_at, updated_at

            // Foreign key constraints
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('completed_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
