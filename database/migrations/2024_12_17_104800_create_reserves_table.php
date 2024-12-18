<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Required for raw SQL

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
                
            $table->string('name');
            $table->string('no_telp');
            $table->date('reservation_date');
            $table->unsignedTinyInteger('number_of_guest');
            $table->timestamps();
        });

        // Add a check constraint manually for Number_Of_Guest <= 12
        DB::statement('ALTER TABLE reserves ADD CONSTRAINT chk_number_of_guest CHECK (number_of_guest <= 12)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserves');
    }
};
