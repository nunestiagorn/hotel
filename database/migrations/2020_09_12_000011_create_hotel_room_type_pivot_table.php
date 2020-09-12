<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelRoomTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('hotel_room_type', function (Blueprint $table) {
            $table->unsignedInteger('room_type_id');
            $table->foreign('room_type_id', 'room_type_id_fk_2173692')->references('id')->on('room_types')->onDelete('cascade');
            $table->unsignedInteger('hotel_id');
            $table->foreign('hotel_id', 'hotel_id_fk_2173692')->references('id')->on('hotels')->onDelete('cascade');
        });
    }
}
