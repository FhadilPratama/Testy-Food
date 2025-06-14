<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('image4')->nullable()->after('image3');
            $table->string('image5')->nullable()->after('image4');
        });
    }

    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn(['image4', 'image5']);
        });
    }
};
