<?php

use App\Http\Controllers\AffirmationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\MotivationController;
use App\Http\Controllers\RoleSwitchController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/switch-role/{role}', [RoleSwitchController::class, 'switchRole'])->name('switch-role');

    Route::post('/theme-settings', [\App\Http\Controllers\SettingsController::class, 'changeTheme'])->name('theme-settings.change');
    Route::post('/motivation-randomizer', [\App\Http\Controllers\SettingsController::class, 'motivationRandomizer'])->name('motivation.randomizer');

    Route::get('/', [UserController::class, 'index'])->name('user.index');

    Route::get('/todo', [UserController::class, 'todo']);

    Route::get('/openai', [AffirmationController::class, 'generateAndSaveAffirmation']);

    Route::post('/chat', [ChatController::class, 'generateResponse']);

    Route::get('/chat', [ChatController::class, 'index'])->name('chat');

    Route::resource('goals', GoalController::class);

    Route::get('goal', [GoalController::class, 'view'])->name('goal.view');

    Route::resource('tasks', TaskController::class)->except('edit','show');

    Route::get('task', [TaskController::class, 'view'])->name('task.view');

    Route::get('generate-motivation', [MotivationController::class, 'generateAndSaveMotivation'])->name('motivation.generate');

    Route::get('send-motivation', [MotivationController::class, 'sendMotivation'])->name('motivation.send');

    Route::get('template', [MotivationController::class, 'emailTemplate']);


    Route::prefix('admin')->group(function () {
        Route::get('ai-instructions-list', [\App\Http\Controllers\AiInstructController::class, 'list'])->name('ai_instruct.list');

        Route::resource('ai-instructions', \App\Http\Controllers\AiInstructController::class)->only('store', 'index','show', 'destroy');

        Route::post('upload-fine-tuning', [\App\Http\Controllers\AiInstructController::class, 'fineTuneUpload'])->name('fine_tune.upload');
        Route::post('fine-tune-create', [\App\Http\Controllers\AiInstructController::class, 'fineTuneCreate'])->name('fine_tune.create');
    });

    Route::get('timeline', [\App\Http\Controllers\TimelineController::class, 'index'])->name('time.index');
});

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
