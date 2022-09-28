<?php

use app\controllers\AdminController;
use app\controllers\CenterController;
use app\controllers\ClassController;
use app\controllers\CVController;
use app\controllers\StaticController;
use app\controllers\TutorController;


//Admin

route()->get('bientap/login', [AdminController::class, 'viewLogin']);
route()->pst('bientap/login', [AdminController::class, 'login']);
route()->get('bientap', [AdminController::class, 'home']);

route()->get('bientap/admins/create', [AdminController::class, 'create']);
route()->pst('bientap/admins', [AdminController::class, 'store']);
route()->get('bientap/admins', [AdminController::class, 'show']);
route()->get('bientap/admins/:num', [AdminController::class, 'detail']);
route()->get('bientap/admins/:num/edit', [AdminController::class, 'edit']);
route()->put('bientap/admins/:num', [AdminController::class, 'update']);
route()->del('bientap/admins/:num', [AdminController::class, 'delete']);

route()->get('bientap/centers/create', [CenterController::class, 'create']);
route()->pst('bientap/centers', [CenterController::class, 'store']);
route()->get('bientap/centers', [CenterController::class, 'show']);
route()->get('bientap/centers/:num', [CenterController::class, 'detail']);
route()->get('bientap/centers/:num/edit', [CenterController::class, 'edit']);
route()->put('bientap/centers', [CenterController::class, 'update']);
route()->del('bientap/centers', [CenterController::class, 'delete']);

route()->get('bientap/classes/create', [ClassController::class, 'create']);
route()->pst('bientap/classes', [ClassController::class, 'store']);
route()->get('bientap/classes', [ClassController::class, 'show']);
route()->get('bientap/classes/:num', [ClassController::class, 'detail']);
route()->get('bientap/classes/:num/edit', [ClassController::class, 'edit']);
route()->put('bientap/classes/:num', [ClassController::class, 'update']);
route()->del('bientap/classes/:num', [ClassController::class, 'delete']);

route()->get('bientap/tutors/create', [TutorController::class, 'create']);
route()->pst('bientap/tutors', [TutorController::class, 'store']);
route()->get('bientap/tutors', TutorController::class, 'show');
route()->get('bientap/tutors/:num', [TutorController::class, 'detail']);
route()->get('bientap/tutors/:num/edit', [TutorController::class, 'edit']);
route()->put('bientap/tutors/:num', [TutorController::class, 'update']);
route()->del('bientap/tutors/:num', [TutorController::class, 'delete']);



//Guest

route()->get('', [StaticController::class, 'home']);
route()->get('danh-sach-lop', [ClassController::class, 'show_guest']);
route()->get('danh-sach-cac-trung-tam', [CenterController::class, 'detail_guest']);
route()->get('gioi-thieu-lopmoi', [StaticController::class, 'about_us']);
route()->get('cac-mau-cv', [CVController::class, 'teplate_show']);


//Tutor

route()->get('dang-ky', [TutorController::class, 'viewRegister']);
route()->pst('dang-ky', [TutorController::class, 'register']);
route()->get('dang-nhap', [TutorController::class, 'viewLogin']);
route()->pst('dang-nhap', [TutorController::class, 'login']);

route()->get('my-profile', [TutorController::class, 'profile']);
route()->get('edit-profile', [TutorController::class, 'editProfile']);

route()->get('tao-cv/:num', [CVController::class, 'create']);
