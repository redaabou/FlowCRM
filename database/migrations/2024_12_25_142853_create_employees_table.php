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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // id bigint primary key
            $table->string('name'); // name text not null
            $table->string('email')->unique(); // email text unique not null
            $table->string('phone')->nullable(); // phone text (nullable)
            $table->string('department')->nullable(); // department text (nullable)
            $table->string('role')->nullable(); // role text (nullable)
            $table->enum('type', ['crm', 'equipe de vente', 'autre']); // type text with check constraint
            $table->date('hire_date')->nullable(); // hire_date date (nullable)
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
}
};
