<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainingCentersController;
use App\Http\Controllers\ComputersController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ApprenticesController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuienesSomosController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\AmbientsController;
use App\Http\Controllers\OffersController;  



// Centros de Formación
Route::get('training-center', [TrainingCentersController::class, 'index'])->name('training_center.index');
Route::get('training-center/create', [TrainingCentersController::class, 'create'])->name('training_center.create');
Route::post('training-center/store', [TrainingCentersController::class, 'store'])->name('training_center.store');
Route::get('training-center/{training_center}/edit', [TrainingCentersController::class, 'edit'])->name('training_center.edit');
Route::put('training-center/{training_center}', [TrainingCentersController::class, 'update'])->name('training_center.update');
Route::delete('training-center/{training_center}', [TrainingCentersController::class, 'destroy'])->name('training_center.destroy');
Route::get('training-center/{training_center}', [TrainingCentersController::class, 'show'])->name('training_center.show');

// Computadores
Route::get('computer', [ComputersController::class, 'index'])->name('computer.index');
Route::get('computer/create', [ComputersController::class, 'create'])->name('computer.create');
Route::post('computer/store', [ComputersController::class, 'store'])->name('computer.store');
Route::get('computer/{computer}/edit', [ComputersController::class, 'edit'])->name('computer.edit');
Route::put('computer/{computer}', [ComputersController::class, 'update'])->name('computer.update');
Route::delete('computer/{computer}', [ComputersController::class, 'destroy'])->name('computer.destroy');
Route::get('computer/{computer}', [ComputersController::class, 'show'])->name('computer.show');

// Áreas
Route::get('area', [AreasController::class, 'index'])->name('area.index');
Route::get('area/create', [AreasController::class, 'create'])->name('area.create');
Route::post('area/store', [AreasController::class, 'store'])->name('area.store');
Route::get('area/{area}/edit', [AreasController::class, 'edit'])->name('area.edit');
Route::put('area/{area}', [AreasController::class, 'update'])->name('area.update');
Route::delete('area/{area}', [AreasController::class, 'destroy'])->name('area.destroy');
Route::get('area/{area}', [AreasController::class, 'show'])->name('area.show');

// Cursos
Route::get('course', [CoursesController::class, 'index'])->name('course.index');
Route::get('course/create', [CoursesController::class, 'create'])->name('course.create');
Route::post('course/store', [CoursesController::class, 'store'])->name('course.store');
Route::get('course/{course}/edit', [CoursesController::class, 'edit'])->name('course.edit');
Route::put('course/{course}', [CoursesController::class, 'update'])->name('course.update');
Route::delete('course/{course}', [CoursesController::class, 'destroy'])->name('course.destroy');
Route::get('course/{course}', [CoursesController::class, 'show'])->name('course.show');

// Aprendices
Route::get('apprentice', [ApprenticesController::class, 'index'])->name('apprentice.index');
Route::get('apprentice/create', [ApprenticesController::class, 'create'])->name('apprentice.create');
Route::post('apprentice/store', [ApprenticesController::class, 'store'])->name('apprentice.store');
Route::get('apprentice/{apprentice}/edit', [ApprenticesController::class, 'edit'])->name('apprentice.edit');
Route::put('apprentice/{apprentice}', [ApprenticesController::class, 'update'])->name('apprentice.update');
Route::delete('apprentice/{apprentice}', [ApprenticesController::class, 'destroy'])->name('apprentice.destroy');
Route::get('apprentice/{apprentice}', [ApprenticesController::class, 'show'])->name('apprentice.show');



// Instructores
Route::get('teacher', [TeachersController::class, 'index'])->name('teacher.index');
Route::get('teacher/create', [TeachersController::class, 'create'])->name('teacher.create');
Route::post('teacher/store', [TeachersController::class, 'store'])->name('teacher.store');
Route::get('teacher/{teacher}/edit', [TeachersController::class, 'edit'])->name('teacher.edit');
Route::put('teacher/{teacher}', [TeachersController::class, 'update'])->name('teacher.update');
Route::delete('teacher/{teacher}', [TeachersController::class, 'destroy'])->name('teacher.destroy');
Route::get('teacher/{teacher}', [TeachersController::class, 'show'])->name('teacher.show');

//Quienes somos
Route::get('/quienes-somos', function () {    return view('quienes-somos.index'); })->name('quienes-somos');

// Ambientes

Route::get('ambients', [AmbientsController::class, 'index'])->name('ambients.index');
Route::get('ambients/create', [AmbientsController::class, 'create'])->name('ambients.create');
Route::post('ambients/store', [AmbientsController::class, 'store'])->name('ambients.store');
Route::get('ambients/{ambient}', [AmbientsController::class, 'show'])->name('ambients.show');
Route::get('ambients/{ambient}/edit', [AmbientsController::class, 'edit'])->name('ambients.edit');
Route::put('ambients/{ambient}', [AmbientsController::class, 'update'])->name('ambients.update');
Route::delete('ambients/{ambient}', [AmbientsController::class, 'destroy'])->name('ambients.destroy');

Route::get('/', [HomeController::class, 'index'])->name('home');
 
// Rutas de Ofertas
Route::get('offers', [OffersController::class, 'index'])->name('offers.index');
Route::get('offers/create', [OffersController::class, 'create'])->name('offers.create');
Route::post('offers/store', [OffersController::class, 'store'])->name('offers.store');
Route::get('offers/{offer}', [OffersController::class, 'show'])->name('offers.show');
Route::get('offers/{offer}/edit', [OffersController::class, 'edit'])->name('offers.edit');
Route::put('offers/{offer}', [OffersController::class, 'update'])->name('offers.update');
Route::delete('offers/{offer}', [OffersController::class, 'destroy'])->name('offers.destroy');

// Rutas de Inscripciones


require __DIR__.'/auth.php';


