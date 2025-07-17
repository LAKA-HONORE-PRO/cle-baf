<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\ApiAdminController;

// Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Levels Routes
Route::get('/admin/levels', [AdminController::class, 'indexLevels'])->name('admin.levels');
Route::post('/admin/levels', [AdminController::class, 'storeLevel'])->name('admin.levels.store');
Route::put('/admin/levels/{id}', [AdminController::class, 'updateLevel'])->name('admin.levels.update');
Route::delete('/admin/levels/{id}', [AdminController::class, 'destroyLevel'])->name('admin.levels.destroy');

// Students Routes
Route::get('/admin/students', [AdminController::class, 'indexStudents'])->name('admin.students');
Route::post('/admin/students', [AdminController::class, 'storeStudent'])->name('admin.students.store');
Route::put('/admin/students/{id}', [AdminController::class, 'updateStudent'])->name('admin.students.update');
Route::delete('/admin/students/{id}', [AdminController::class, 'destroyStudent'])->name('admin.students.destroy');

// Units Routes
Route::get('/admin/units', [AdminController::class, 'indexUnits'])->name('admin.units');
Route::post('/admin/units', [AdminController::class, 'storeUnit'])->name('admin.units.store');
Route::put('/admin/units/{id}', [AdminController::class, 'updateUnit'])->name('admin.units.update');
Route::delete('/admin/units/{id}', [AdminController::class, 'destroyUnit'])->name('admin.units.destroy');

// Examens Routes
Route::get('/admin/examens', [AdminController::class, 'indexExamens'])->name('admin.examens');
Route::post('/admin/examens', [AdminController::class, 'storeExamen'])->name('admin.examens.store');
Route::put('/admin/examens/{id}', [AdminController::class, 'updateExamen'])->name('admin.examens.update');
Route::delete('/admin/examens/{id}', [AdminController::class, 'destroyExamen'])->name('admin.examens.destroy');

// Questions Routes
Route::get('/admin/questions', [AdminController::class, 'indexQuestions'])->name('admin.questions');
Route::post('/admin/questions', [AdminController::class, 'storeQuestion'])->name('admin.questions.store');
Route::put('/admin/questions/{id}', [AdminController::class, 'updateQuestion'])->name('admin.questions.update');
Route::delete('/admin/questions/{id}', [AdminController::class, 'destroyQuestion'])->name('admin.questions.destroy');

// Answers Routes
Route::get('/admin/answers', [AdminController::class, 'indexAnswers'])->name('admin.answers');
Route::post('/admin/answers', [AdminController::class, 'storeAnswer'])->name('admin.answers.store');
Route::put('/admin/answers/{id}', [AdminController::class, 'updateAnswer'])->name('admin.answers.update');
Route::delete('/admin/answers/{id}', [AdminController::class, 'destroyAnswer'])->name('admin.answers.destroy');

// Lessons Routes
Route::get('/admin/lessons', [AdminController::class, 'indexLessons'])->name('admin.lessons');
Route::post('/admin/lessons', [AdminController::class, 'storeLesson'])->name('admin.lessons.store');
Route::put('/admin/lessons/{id}', [AdminController::class, 'updateLesson'])->name('admin.lessons.update');
Route::delete('/admin/lessons/{id}', [AdminController::class, 'destroyLesson'])->name('admin.lessons.destroy');

// Appartenir Routes (Student-Level relationships)
Route::get('/admin/appartenir', [AdminController::class, 'indexAppartenir'])->name('admin.appartenir');
Route::post('/admin/appartenir', [AdminController::class, 'storeAppartenir'])->name('admin.appartenir.store');
Route::put('/admin/appartenir/{id}', [AdminController::class, 'updateAppartenir'])->name('admin.appartenir.update');
Route::delete('/admin/appartenir/{id}', [AdminController::class, 'destroyAppartenir'])->name('admin.appartenir.destroy');

// Composer Routes (Question-Answer relationships)
Route::get('/admin/composer', [AdminController::class, 'indexComposer'])->name('admin.composer');
Route::post('/admin/composer', [AdminController::class, 'storeComposer'])->name('admin.composer.store');
Route::put('/admin/composer/{id}', [AdminController::class, 'updateComposer'])->name('admin.composer.update');
Route::delete('/admin/composer/{id}', [AdminController::class, 'destroyComposer'])->name('admin.composer.destroy');

// Utility Routes (for AJAX requests)
Route::get('/admin/levels/{levelId}/units', [AdminController::class, 'getLevelUnits'])->name('admin.levels.units');
Route::get('/admin/units/{unitId}/examens', [AdminController::class, 'getUnitExamens'])->name('admin.units.examens');
Route::get('/admin/examens/{examenId}/questions', [AdminController::class, 'getExamenQuestions'])->name('admin.examens.questions');
Route::get('/admin/questions/{questionId}/answers', [AdminController::class, 'getQuestionAnswers'])->name('admin.questions.answers');

/*
 * API Routes for Admin Controller
 */

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