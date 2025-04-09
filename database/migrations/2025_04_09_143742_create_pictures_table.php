<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->id(); // Auto-incremental ID
            $table->string('name'); // Picture name
            $table->text('description')->nullable(); // Picture description (nullable)
            $table->string('mime'); // MIME type (e.g. image/jpeg)
            $table->string('path'); // File path to store the image
            $table->foreignId('user_id') // Foreign key for users table
                  ->constrained()         // Ensures it references the 'users' table
                  ->onDelete('cascade');  // Deletes pictures if the user is deleted
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pictures');
    }
}
