<?php

use controllers\CategoryController;
use controllers\CenterController;
use controllers\ClassController;
use controllers\CVController;
use controllers\EditorController;
use controllers\PostController;
use controllers\StaticController;
use controllers\TutorController;
use controllers\TutorPostController;
use core\Route;
use repositories\CenterRepo;

//Guest

Route::get('', [StaticController::class, 'home']);
Route::get('danh-sach-lop', [ClassController::class, 'all']);
Route::get('danh-sach-cac-trung-tam', [CenterController::class, 'all']);
Route::get('tao-cv-gia-su', [StaticController::class, 'create_cv']);
Route::get('dien-dan-gia-su', [TutorPostController::class, 'all']);
Route::get('bai-viet', [PostController::class, 'all']);
Route::get('gioi-thieu-lopmoi', [StaticController::class, 'about_us']);
Route::get('dang-nhap', [StaticController::class, 'login']);
Route::get('dang-ky', [StaticController::class, 'register']);

Route::get('dang-nhap-trung-tam', [StaticController::class, 'login_for_center']);
//Route::post('center/login')
Route::get('dang-nhap-gia-su', [StaticController::class, 'login_for_tutor']);
//Route::post('login')
Route::get('lop-gia-su/:any', [ClassController::class, 'show'], ['id']);
Route::get('trung-tam-gia-su/:any', [CenterController::class, 'show'], ['id']);



//Admin

Route::get('bientap/login', [AdminController::class, 'login']);
//Route::post('admin/login')
Route::get('bientap', [EditorController::class, 'home']);

Route::get('bientap/classes', [ClassController::class, 'all']);
Route::get('bientap/class', [ClassController::class, 'show'], ['id']);
Route::get('bientap/class/create', [ClassController::class, 'create']);
//Route::post('bientap/classes')
Route::get('bientap/class/edit', [ClassController::class, 'edit'], ['id']);
//Route::put('bientap/class)
//Route::delete('bientap/class)

Route::get('bientap/centers', [CenterController::class, 'all']);
Route::get('bientap/center', [CenterController::class, 'show'], ['id']);
Route::get('bientap/center/create', [CenterController::class, 'create']);
//Route::post('bientap/centers')
Route::get('bientap/center/edit', [CenterController::class, 'edit']);
//Route::put('bientap/center)
//Route::delete('bientap/center)

Route::get('bientap/categories', [CategoryController::class, 'all']);
Route::get('bientap/category', [CategoryController::class, 'show'], ['id']);
Route::get('bientap/category/create', [CategoryController::class, 'create']);
//Route::post('bientap/categories')
Route::get('bientap/category/edit', [CategoryController::class, 'edit']);
//Route::put('bientap/category)
//Route::delete('bientap/category)

Route::get('bientap/posts', [PostController::class, 'all']);
Route::get('bientap/post', [PostController::class, 'show'], ['id']);
Route::get('bientap/post/create', [PostController::class, 'create']);
//Route::post('bientap/posts')
Route::get('bientap/post/edit', [PostController::class, 'edit']);
//Route::put('bientap/post)
//Route::delete('bientap/post)

Route::get('bientap/tutors', TutorController::class, 'all');
Route::get('bientap/tutor', [TutorController::class, 'show'], ['id']);
Route::get('bientap/tutor/create', [TutorController::class, 'create']);
//Route::tutor('bientap/tutors')
Route::get('bientap/tutor/edit', [TutorController::class, 'edit']);
//Route::put('bientap/tutor)
//Route::delete('bientap/tutor)


//Center

Route::get('trungtam', [CenterController::class, 'home']);
Route::get('trungtam/thong-tin', [CenterController::class, 'profile']);
Route::get('trungtam/chinh-sua-thong-tin', [CenterController::class, 'editProfile']);
//Route::put('trungtam/profile')

Route::get('trungtam/classes', [ClassController::class, 'all']);
Route::get('trungtam/class', [ClassController::class, 'show'], ['id']);
Route::get('trungtam/class/create', [ClassController::class, 'create']);
//Route::post('trungtam/classes')
Route::get('trungtam/class/edit', [ClassController::class, 'edit'], ['id']);
//Route::put('trungtam/class)
//Route::delete('trungtam/class)


//Tutor

Route::get('tutor/ho-so-cua-toi', [TutorController::class, 'profile']);
Route::get('tutor/chinh-sua-ho-so', [TutorController::class, 'editProfile']);

Route::get('tutor/cac-mau-cv', [CVController::class, 'show_templates']);
Route::get('tutor/tao-cv', [CVController::class, 'create']);
//Route::post('tutor/cvs')
Route::get('tutor/quan-ly-cv', [CVController::class, 'my']);
Route::get('tutor/chinh-sua-cv', [CVController::class, 'edit'], ['id']);
// Route::put('tutor/cv', [CVController::class, 'update'], ['id']);

Route::get('tutors/bai-viet-cua-toi', [TutorPostController::class, 'my']);