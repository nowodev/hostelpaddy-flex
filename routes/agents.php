<?php
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AgentStudentController;
use App\Http\Controllers\AgentHostelController;
use Illuminate\Support\Facades\Route;

// add auth:agent in order to pass both authentication and speccific guards
Route::middleware(['auth:agent'])->group(function () {
    Route::resource('agent', AgentController::class);
    // Route::prefix('agent')->name('agent.')->group(function () {
    //     Route::resource('students', AgentStudentController::class)
    //         ->only(['index', 'show']);
    // });


    Route::name('agent.')->group(function () {
        Route::group(['prefix'=>'agents'], function(){
            Route::resource('students', AgentStudentController::class);
            Route::resource('hostels', AgentHostelController::class);
        });
    });
});