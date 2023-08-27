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
        // nama table disarankan berakhiran -s, cth: members
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 30);
            $table->string("email", 50);
            $table->string("password", 100);
            $table->date("dob");
            $table->string("gender", 1);
            $table->timestamps(); // created_at, updated_at
        });
    }
    // setiap ada perubahan database harus make migration baru, ubah data di migrate baru
    // dan "php artisan migrate" untuk dimigrasi data barunya

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

// kalau table tidak pakai s
// protected $table = 'product';

// kalau di table kita tidak membuat timestamps
// protected $timestamps = false;
