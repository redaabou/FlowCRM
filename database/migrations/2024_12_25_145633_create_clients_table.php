<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id_client'); // Big integer primary key for client ID
            $table->string('name'); // Name of the contact
            $table->string('email')->unique(); // Unique email address for the contact
            $table->unsignedBigInteger('assigned_to'); // Foreign key for the assigned employee
            $table->foreign('assigned_to')->references('id')->on('employees')->onDelete('set null'); // Foreign key to the 'employees' table
            
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
}
};
