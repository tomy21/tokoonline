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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
<<<<<<< HEAD
            $table->integer('is_admin')->default(1);
            $table->boolean('is_mamber')->default(1);
            $table->string('foto')->default('default.png');
            $table->string('alamat');
            $table->string('tlp');
            $table->date('tglLahir');
            $table->boolean('is_active')->default(1);
=======
>>>>>>> 26eb251dbc1473054dd32c63e1837c02099f03f2
            $table->rememberToken();
            $table->timestamps();
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
