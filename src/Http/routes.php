<?php
/**
 * Created by PhpStorm.
 * User: Mutterschiff
 * Date: 11.02.2018
 * Time: 16:57
 */

Route::group([
    'namespace' => 'Herpaderpaldent\Seat\SeatGroups\Http\Controllers',
    'prefix' => 'seatgroups'
    ], function() {
    Route::get('test', [
        'as'   => 'seatgroups.index',
        'uses' => 'SeatGroupsController@index'
    ]);
    Route::get('bar', 'seatGroup@index');

    Route::get('foo', function () {
        return 'Hello World';
    });
}
);
