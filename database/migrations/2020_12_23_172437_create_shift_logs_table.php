<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->index();
            $table->foreignId('user_id');
            $table->timestamp('started_at');
            $table->timestamp('finished_at')->nullable();
            $table->string('total_hours')->default(0);
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
        Schema::dropIfExists('shift_logs');
    }
}
