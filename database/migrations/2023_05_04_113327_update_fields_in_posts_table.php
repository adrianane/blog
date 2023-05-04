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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug')->after('category_id');
            $table->string('meta_title')->after('category_id');
            $table->string('meta_description')->after('category_id');
            $table->string('meta_keyword')->after('category_id');
            $table->tinyInteger('status')->default(0)->after('category_id');
            $table->dropColumn('published');
            $table->dropColumn('published_at');        
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
