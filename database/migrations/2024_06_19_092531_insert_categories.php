<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Travel'],
            ['name' => 'Social'],
            ['name' => 'Sports'],
            ['name' => 'Technology'],
            ['name' => 'Art & Culture'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('categories');
    }
};
