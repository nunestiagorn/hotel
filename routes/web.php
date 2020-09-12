<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

// Auth
Auth::routes([
    'verify' => false,
]);

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Hotels
    Route::delete('hotels/destroy', 'HotelController@massDestroy')->name('hotels.massDestroy');
    Route::post('hotels/media', 'HotelController@storeMedia')->name('hotels.storeMedia');
    Route::post('hotels/ckmedia', 'HotelController@storeCKEditorImages')->name('hotels.storeCKEditorImages');
    Route::resource('hotels', 'HotelController');

    // Rooms
    Route::delete('rooms/destroy', 'RoomController@massDestroy')->name('rooms.massDestroy');
    Route::post('rooms/media', 'RoomController@storeMedia')->name('rooms.storeMedia');
    Route::post('rooms/ckmedia', 'RoomController@storeCKEditorImages')->name('rooms.storeCKEditorImages');
    Route::resource('rooms', 'RoomController');

    // Room Types
    Route::delete('room-types/destroy', 'RoomTypeController@massDestroy')->name('room-types.massDestroy');
    Route::post('room-types/media', 'RoomTypeController@storeMedia')->name('room-types.storeMedia');
    Route::post('room-types/ckmedia', 'RoomTypeController@storeCKEditorImages')->name('room-types.storeCKEditorImages');
    Route::resource('room-types', 'RoomTypeController');

    // Bookings
    Route::delete('bookings/destroy', 'BookingController@massDestroy')->name('bookings.massDestroy');
    Route::post('bookings/media', 'BookingController@storeMedia')->name('bookings.storeMedia');
    Route::post('bookings/ckmedia', 'BookingController@storeCKEditorImages')->name('bookings.storeCKEditorImages');
    Route::resource('bookings', 'BookingController');
});

// Profile
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
    Route::post('password', 'ChangePasswordController@update')->name('password.update');
});
