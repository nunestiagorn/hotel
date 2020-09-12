<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Hotels
    Route::post('hotels/media', 'HotelApiController@storeMedia')->name('hotels.storeMedia');
    Route::apiResource('hotels', 'HotelApiController');

    // Rooms
    Route::post('rooms/media', 'RoomApiController@storeMedia')->name('rooms.storeMedia');
    Route::apiResource('rooms', 'RoomApiController');

    // Room Types
    Route::post('room-types/media', 'RoomTypeApiController@storeMedia')->name('room-types.storeMedia');
    Route::apiResource('room-types', 'RoomTypeApiController');

    // Bookings
    Route::post('bookings/media', 'BookingApiController@storeMedia')->name('bookings.storeMedia');
    Route::apiResource('bookings', 'BookingApiController');
});
