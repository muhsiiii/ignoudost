<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wp_parents', function (Blueprint $table) {
            $table->string('whatsapp_link')->default(1)->after('name');
            $table->string('status')->default(1)->after('whatsapp_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wp_parents', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('whatsapp_link');
        });
    }
};
