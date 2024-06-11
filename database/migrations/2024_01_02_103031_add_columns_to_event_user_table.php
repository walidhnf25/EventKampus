<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEventUserTable extends Migration
{
    public function up()
    {
        Schema::table('event_user', function (Blueprint $table) {
            $table->unsignedBigInteger('idEvent');
            $table->unsignedBigInteger('idUser');
            
            $table->foreign('idEvent')->references('idEvent')->on('events');
            $table->foreign('idUser')->references('idUser')->on('users');
        });
    }

    public function down()
    {
        Schema::table('event_user', function (Blueprint $table) {
            $table->dropForeign(['idEvent']);
            $table->dropForeign(['idUser']);
            $table->dropColumn(['idEvent', 'idUser']);
        });
    }
}

