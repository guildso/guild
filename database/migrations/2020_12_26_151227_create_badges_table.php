<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->index();
            $table->string('name');
            $table->string('color')->default('gray');
            $table->string('description');
            $table->string('details')->nullable();
            $table->string('award_message')->nullable();
            $table->string('requirement_class')->nullable();
            $table->string('requirement_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badges');
    }
}
