<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAdminController;

// Levels Routes
Route::get('/api/levels', [ApiAdminController::class, 'indexLevels'])->name('api.levels');
Route::post('/api/levels', [ApiAdminController::class, 'storeLevel'])->name('api.levels.store');
Route::put('/api/levels/{id}', [ApiAdminController::class, 'updateLevel'])->name('api.levels.update');
Route::delete('/api/levels/{id}', [ApiAdminController::class, 'destroyLevel'])->name('api.levels.destroy');


Route::prefix('api')->group(function () {
    // Levels
    Route::get('/levels', [ApiAdminController::class, 'indexLevels']);
    Route::post('/levels', [ApiAdminController::class, 'storeLevel']);
    Route::put('/levels/{id}', [ApiAdminController::class, 'updateLevel']);
    Route::delete('/levels/{id}', [ApiAdminController::class, 'destroyLevel']);

    // Students
    Route::get('/students', [ApiAdminController::class, 'indexStudents']);
    Route::post('/students', [ApiAdminController::class, 'storeStudent']);
    Route::put('/students/{id}', [ApiAdminController::class, 'updateStudent']);
    Route::delete('/students/{id}', [ApiAdminController::class, 'destroyStudent']);

    // Units
    Route::get('/units', [ApiAdminController::class, 'indexUnits']);
    Route::post('/units', [ApiAdminController::class, 'storeUnit']);
    Route::put('/units/{id}', [ApiAdminController::class, 'updateUnit']);
    Route::delete('/units/{id}', [ApiAdminController::class, 'destroyUnit']);

    // Examens
    Route::get('/examens', [ApiAdminController::class, 'indexExamens']);
    Route::post('/examens', [ApiAdminController::class, 'storeExamen']);
    Route::put('/examens/{id}', [ApiAdminController::class, 'updateExamen']);
    Route::delete('/examens/{id}', [ApiAdminController::class, 'destroyExamen']);

    // Questions
    Route::get('/questions', [ApiAdminController::class, 'indexQuestions']);
    Route::post('/questions', [ApiAdminController::class, 'storeQuestion']);
    Route::put('/questions/{id}', [ApiAdminController::class, 'updateQuestion']);
    Route::delete('/questions/{id}', [ApiAdminController::class, 'destroyQuestion']);

    // Answers
    Route::get('/answers', [ApiAdminController::class, 'indexAnswers']);
    Route::post('/answers', [ApiAdminController::class, 'storeAnswer']);
    Route::put('/answers/{id}', [ApiAdminController::class, 'updateAnswer']);
    Route::delete('/answers/{id}', [ApiAdminController::class, 'destroyAnswer']);

    // Lessons
    Route::get('/lessons', [ApiAdminController::class, 'indexLessons']);
    Route::post('/lessons', [ApiAdminController::class, 'storeLesson']);
    Route::put('/lessons/{id}', [ApiAdminController::class, 'updateLesson']);
    Route::delete('/lessons/{id}', [ApiAdminController::class, 'destroyLesson']);

    // Appartenirs
    Route::get('/appartenirs', [ApiAdminController::class, 'indexAppartenir']);
    Route::post('/appartenirs', [ApiAdminController::class, 'storeAppartenir']);
    Route::put('/appartenirs/{id}', [ApiAdminController::class, 'updateAppartenir']);
    Route::delete('/appartenirs/{id}', [ApiAdminController::class, 'destroyAppartenir']);

    // Composers
    Route::get('/composers', [ApiAdminController::class, 'indexComposer']);
    Route::post('/composers', [ApiAdminController::class, 'storeComposer']);
    Route::put('/composers/{id}', [ApiAdminController::class, 'updateComposer']);
    Route::delete('/composers/{id}', [ApiAdminController::class, 'destroyComposer']);

    // Utility routes
    Route::get('/levels/{levelId}/units', [ApiAdminController::class, 'getLevelUnits']);
    Route::get('/units/{unitId}/examens', [ApiAdminController::class, 'getUnitExamens']);
    Route::get('/examens/{examenId}/questions', [ApiAdminController::class, 'getExamenQuestions']);
    Route::get('/questions/{questionId}/answers', [ApiAdminController::class, 'getQuestionAnswers']);

    // Composer (Question-Examen relationships)
    Route::get('/composers/examen', [ApiAdminController::class, 'indexComposers']);
});