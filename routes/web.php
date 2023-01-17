<?php

use App\Http\Controllers\Admin\{
    ACL\PermissionController,
    ACL\RoleController,
    AdminController,
    ApartmentController,
    BlockController,
    ComplexController,
    MeterController,
    ResidentController,
    UserController
};
use App\Http\Controllers\Site\{
    HomeController,
    LaunchPageController,
};
use Illuminate\Support\Facades\{
    Auth,
    Route
};

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.home');
    Route::prefix('admin')->name('admin.')->group(function () {
        /** Chart home */
        Route::get('/chart', [AdminController::class, 'chart'])->name('home.chart');

        /** Users */
        Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::get('/users/destroy/{id}', [UserController::class, 'destroy']);
        Route::resource('users', UserController::class);

        /** Complexes */
        Route::get('/complexes/destroy/{id}', [ComplexController::class, 'destroy']);
        Route::resource('complexes', ComplexController::class);

        /** Blocks */
        Route::get('/blocks/destroy/{id}', [BlockController::class, 'destroy']);
        Route::resource('blocks', BlockController::class);

        /** Apartments */
        Route::get('/apartments/destroy/{id}', [ApartmentController::class, 'destroy']);
        Route::resource('apartments', ApartmentController::class);

        /** Meters */
        Route::get('/meters/destroy/{id}', [MeterController::class, 'destroy']);
        Route::resource('meters', MeterController::class);

        /** Residents */
        Route::get('/residents/destroy/{id}', [ResidentController::class, 'destroy']);
        Route::resource('residents', ResidentController::class);

        /**
         * ACL
         * */
        /** Permissions */
        Route::get('/permission/destroy/{id}', [PermissionController::class, 'destroy']);
        Route::resource('permission', PermissionController::class);
        /** Roles */
        Route::get('/role/destroy/{id}', [RoleController::class, 'destroy']);
        Route::get('role/{role}/permission', [RoleController::class, 'permissions'])->name('role.permissions');
        Route::put('role/{role}/permission/sync', [RoleController::class, 'permissionsSync'])->name('role.permissionsSync');
        Route::resource('role', RoleController::class);
    });
});

/** Web */
/** Home */
Route::get('/', [LaunchPageController::class, 'index'])->name('launch');

Auth::routes([
    'register' => false,
]);

Route::fallback(function () {
    return view('404');
});
