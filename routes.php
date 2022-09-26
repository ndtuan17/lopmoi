<?php

use controllers\AdminController;
use controllers\CenterController;
use controllers\ClassController;
use controllers\CVController;
use controllers\EditorController;
use controllers\StaticController;
use controllers\TutorController;
use core\Route;


//Admin

Route::get('bientap/login', [AdminController::class, 'viewLogin']);
Route::pst('bientap/login', [AdminController::class, 'login']);
Route::get('bientap', [AdminController::class, 'home']);

Route::get('bientap/admins/create', [AdminController::class, 'create']);
Route::pst('bientap/admins', [AdminController::class, 'store']);
Route::get('bientap/admins', [AdminController::class, 'show']);
Route::get('bientap/admins/:num', [AdminController::class, 'detail']);
Route::get('bientap/admins/:num/edit', [AdminController::class, 'edit']);
Route::put('bientap/admins/:num', [AdminController::class, 'update']);
Route::del('bientap/admins/:num', [AdminController::class, 'delete']);

Route::get('bientap/centers/create', [CenterController::class, 'create']);
Route::pst('bientap/centers', [CenterController::class, 'store']);
Route::get('bientap/centers', [CenterController::class, 'show']);
Route::get('bientap/centers/:num', [CenterController::class, 'detail']);
Route::get('bientap/centers/:num/edit', [CenterController::class, 'edit']);
Route::put('bientap/centers', [CenterController::class, 'update']);
Route::del('bientap/centers', [CenterController::class, 'delete']);

Route::get('bientap/classes/create', [ClassController::class, 'create']);
Route::pst('bientap/classes', [ClassController::class, 'store']);
Route::get('bientap/classes', [ClassController::class, 'show']);
Route::get('bientap/classes/:num', [ClassController::class, 'detail']);
Route::get('bientap/classes/:num/edit', [ClassController::class, 'edit']);
Route::put('bientap/classes/:num', [ClassController::class, 'update']);
Route::del('bientap/classes/:num', [ClassController::class, 'delete']);

Route::get('bientap/tutors/create', [TutorController::class, 'create']);
Route::pst('bientap/tutors', [TutorController::class, 'store']);
Route::get('bientap/tutors', TutorController::class, 'show');
Route::get('bientap/tutors/:num', [TutorController::class, 'detail']);
Route::get('bientap/tutors/:num/edit', [TutorController::class, 'edit']);
Route::put('bientap/tutors/:num', [TutorController::class, 'update']);
Route::del('bientap/tutors/:num', [TutorController::class, 'delete']);



//Guest

Route::get('', [StaticController::class, 'home']);
Route::get('danh-sach-lop', [ClassController::class, 'show_guest']);
Route::get('danh-sach-cac-trung-tam', [CenterController::class, 'detail_guest']);
Route::get('gioi-thieu-lopmoi', [StaticController::class, 'about_us']);
Route::get('cac-mau-cv', [CVController::class, 'teplate_show']);


//Tutor

Route::get('dang-ky', [TutorController::class, 'viewRegister']);
Route::pst('dang-ky', [TutorController::class, 'register']);
Route::get('dang-nhap', [TutorController::class, 'viewLogin']);
Route::pst('dang-nhap', [TutorController::class, 'login']);

Route::get('my-profile', [TutorController::class, 'profile']);
Route::get('edit-profile', [TutorController::class, 'editProfile']);

Route::get('tao-cv/:num', [CVController::class, 'create']);
