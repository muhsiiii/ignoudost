<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('learners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon');
            $table->timestamps();
        });

        DB::table('learners')->insert([
            'title'=>"IGNOU Courses",
            'icon'=>"/home/images/l-img.png"
        ]);

        DB::table('learners')->insert([
            'title'=>"5000+ Learners",
            'icon'=>"/home/images/notebook 1.png"
        ]);

        DB::table('learners')->insert([
            'title'=>" 90% Completion Rate",
            'icon'=>"/home/images/checking 1.png"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learners');
    }
};
