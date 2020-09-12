<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRoomsTable extends Migration
{
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->unsignedInteger('hotel_id');
            $table->foreign('hotel_id', 'hotel_fk_2173685')->references('id')->on('hotels');
            $table->unsignedInteger('room_type_id');
            $table->foreign('room_type_id', 'room_type_fk_2173697')->references('id')->on('room_types');
        });
    }
}
