<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetDataController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\adoptionController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ReportsController;
use App\Events\Messages;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Livewire\Chat\Index;
use App\Livewire\Chat\Chat;
use App\Livewire\Chat\ChatBox;

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
use Illuminate\Support\Facades\Broadcast;

Broadcast::routes();

//otp form
Route::get('/verify-otp', [RegisteredUserController::class, 'showVerificationForm'])->name('verify-otp');

Route::post('/verify-otp', [RegisteredUserController::class, 'verifyOTP'])->name('verifies-otp');

Route::get('/user/interview/{scheduleId}', [InterviewController::class, 'jitsiuserinterview'])
    ->middleware(['auth', 'user'])
    ->name('interview.user');

Route::get('/admin/interview/{scheduleId}', [InterviewController::class, 'jitsiadmininterview'])
    ->middleware(['auth', 'admin'])
    ->name('interview.admin');

    Route::get('/', [PetDataController::class, 'showPublicPets1'])->name('home');

/* user`s routes */

Route::get('/user/dashboard', [PetDataController::class, 'showUserPets'])
    ->middleware(['auth', 'user'])
    ->name('user.dashboard');

Route::post('/user/send/reply/{messageId}/{receiverId}', [MessageController::class, 'storeReply'])->name('send.reply');

Route::post('/admin/send/reply/{messageId}/{receiverId}', [MessageController::class, 'AdminStoreReply'])->middleware(['auth', 'admin'])->name('send.replies');

Route::post('/send-message', [MessageController::class, 'sendMessage'])->middleware(['auth', 'admin'])->name('send.message');

// Route::post('/send-message', function(Request $request) {
//     event(new Message($request->input('content')));

//     return ["success" => true];
// });

Route::get('/user/inbox/messages/{messageId}', [MessageController::class, 'messageContent'])->middleware(['auth', 'user'])->name('inbox.message');

Route::get('/admin/inbox/messages/{messageId}', [MessageController::class, 'AdminInbox'])->middleware(['auth', 'admin'])->name('admin.inbox');

Route::post('/send/volunteer_form/{userId}', [VolunteerController::class, 'store'])->middleware(['auth', 'user'])->name('volunteer.form');


// Route::get('/user/messages', function () {
//     return view('user_contents.messages');
// })->middleware(['auth', 'verified'])->name('user.messages');   

Route::post('/schedule/interview', [InterviewController::class, 'store'])->middleware(['auth', 'user'])->name('schedule.interview');

Route::post('/schedule/pickup', [PickupController::class, 'store'])->middleware(['auth', 'user'])->name('schedule.pickup');

Route::post('/schedule/visit', [VisitController::class, 'store'])->middleware(['auth', 'user'])->name('schedule.visit');

Route::get('/user/messages', [MessageController::class, 'displayMessage'])
    ->middleware(['auth', 'user'])
->name('user.messages');

Route::get('/admin/messages', [MessageController::class, 'AllMessage'])->middleware(['auth', 'admin'])->name('admin.messages');


// Route::get('/inbox/messages', function () {
//     return view('user_contents.inbox_message.inbox');
// })->name('view.messages');

// show message in the inbox
// Route::get('/inbox/messages', [MessageController::class, 'showSentMessages'])->middleware(['auth', 'verified'])->name('view.messages');

Route::get('/user/progress/{userId}/{applicationId}', [AdoptionController::class, 'adoptionProgress'])
    ->middleware(['auth', 'user'])
    ->name('user.adoptionprogress');


Route::get('/user/applications', [adoptionController::class, 'userApplication'])->middleware(['auth', 'user'])->name('user.applications');   

Route::get('/user/pets/{petId}', [adoptionController::class, 'adoptPet'])->middleware(['auth', 'user'])->name('user.pet');

Route::post('/send/form/{petId}', [adoptionController::class, 'store'])->middleware(['auth', 'user'])->name('send.form');

Route::get('/user/sendAdoption/{petId}', [PetDataController::class, 'sendAdoption'])->middleware(['auth', 'user'])->name('user.adoption');

// Route::get('/user/adoption_form', function () {
//     return view('user_contents.adoptionform');
// })->middleware(['auth', 'verified'])->name('user.adoption');

Route::get('/user/volunteer_form', [VolunteerController::class, 'volunteer_form']) ->middleware(['auth', 'user'])->name('user.volunteer');

// User send message 
Route::post('/send/messages', [MessageController::class, 'store'])->middleware(['auth', 'verified'])->name('messages.send');

/* admin`s routes */

Route::patch('/admin/update-stage/{userId}/{id}', [adoptionController::class, 'updateStage'])->middleware(['auth', 'admin'])->name('admin.updateStage');

Route::patch('/admin/reject-stage/{userId}/{id}', [adoptionController::class, 'rejectStage'])->middleware(['auth', 'admin'])->name('admin.rejectStage');

Route::patch('/admin/cancel-stage/{userId}/{id}', [adoptionController::class, 'cancelStage'])->middleware(['auth', 'user'])->name('cancel.stage');

Route::patch('/cancel-schedule/{scheduleId}', [VisitController::class, 'cancelSchedule'])->middleware(['auth', 'user'])->name('cancel.schedule');

Route::patch('/cancel-application/{userId}/{applicationId}', [VolunteerController::class, 'cancelApplication'])->name('cancel.application');

Route::patch('/admin/reject-volunteer-stage/{userId}/{applicationId}', [VolunteerController::class, 'volunteerReject'])->middleware(['auth', 'admin'])->name('admin.volunteer.reject');

Route::patch('/admin/wrap-interview/{userId}/{id}', [adoptionController::class, 'wrapInterview'])->middleware(['auth', 'admin'])->name('admin.wrap');

Route::patch('/admin/interview-stage/{userId}/{id}', [adoptionController::class, 'interviewStage'])->middleware(['auth', 'admin'])->name('admin.interviewStage');

Route::patch('/admin/reject-interview-stage/{userId}/{id}', [adoptionController::class, 'rejectInterview'])->middleware(['auth', 'admin'])->name('admin.rejectInterview');
Route::patch('/admin/cancel-interview-stage/{userId}/{id}', [adoptionController::class, 'AdminCancelInterview'])->middleware(['auth', 'admin'])->name('admin.cancelInterview');

Route::patch('/admin/user/cancel-interview/{userId}/{id}', [adoptionController::class, 'UserCancelInterview'])->middleware(['auth', 'user'])->name('user.cancelInterview');

Route::patch('/admin/reject-volunteer-interview-stage/{userId}/{applicationId}', [VolunteerController::class, 'volunteerInterviewReject'])->middleware(['auth', 'admin'])->name('admin.reject.volunteer');

Route::patch('/user/cancel-volunteer-interview-stage/{userId}/{applicationId}', [VolunteerController::class, 'cancelInterview'])->middleware(['auth', 'user'])->name('user.cancel.interview');

Route::patch('/admin/cancel-volunteer-interview-stage/{userId}/{applicationId}', [VolunteerController::class, 'adminCancelInterview'])->middleware(['auth', 'admin'])->name('admin.cancel.interview');

Route::patch('/admin/pickup-stage/{userId}/{id}', [adoptionController::class, 'pickupStage'])->middleware(['auth', 'admin'])->name('admin.pickupStage');

Route::patch('/admin/pickup-reject-stage/{userId}/{id}', [adoptionController::class, 'rejectPickup'])->middleware(['auth', 'admin'])->name('admin.rejectPickup');

Route::patch('/admin/volunteer/interview/{userId}/{applicationId}', [ScheduleController::class, 'updateScheduleForVolunteer'])->middleware(['auth', 'admin'])->name('admin.volunter.interview.accept');

Route::patch('/admin/volunteer/add-stage/{id}/{applicationId}', [ScheduleController::class, 'addStage'])->middleware(['auth', 'admin'])->name('volunteer.add.stage');

Route::patch('/admin/update-contract/{user}/{id}', [adoptionController::class, 'updateContract'])->middleware(['auth', 'admin'])->name('update.contract');

Route::patch('/admin/update/volunteer/progress/{userId}/{applicationId}', [VolunteerController::class, 'updateVolunteerStage'])->middleware(['auth', 'admin'])->name('update.volunteer.progress');

Route::post('/admin/update/volunteer/interview/{userId}/{applicationId}', [InterviewController::class, 'volunteerInterview'])
    ->name('update.volunteer.interview');

Route::get('/download-contract/{id}', [AdoptionController::class, 'downloadContract'])->middleware(['auth', 'verified'])->name('download.contract');

Route::get('/view/registered/user', [ProfileController::class, 'showRegisteredUsers'])->middleware(['auth', 'admin'])->name('view.users');

Route::get('/export_pet', [PetDataController::class, 'export_pet_type'])->middleware(['auth', 'admin'])->name('export_pet_type');

Route::get('/export_adoption', [adoptionController::class, 'export_adoption'])->middleware(['auth', 'admin'])->name('export.adoption');

Route::get('/export_volunteer', [VolunteerController::class, 'export_volunteer'])->middleware(['auth', 'admin'])->name('export.volunteer');

// Route::get('/admin/volunteers', function () {
//     return view('admin_contents.volunteers');
// })->middleware(['auth', 'verified'])->name('admin.volunteers');

Route::get('/admin/volunteers', [VolunteerController::class, 'showVolunteer'])
    ->middleware(['auth', 'admin'])
    ->name('admin.volunteers');


Route::get('/admin/progress/{userId}/{id}', [adoptionController::class, 'adminLoadProgress'])
    ->middleware(['auth', 'admin'])
    ->name('admin.adoptionprogress');


    Route::get('/admin/dashboard', [ApplicationController::class, 'recentapplication'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');


Route::get('/pet/management', [PetDataController::class, 'showPetManagement'])
    ->middleware(['auth', 'admin'])
    ->name('admin.pet.management');

Route::get('/admin/adoptions', [adoptionController::class, 'adminAdoptionProgress'])
    ->middleware(['auth', 'admin'])
    ->name('admin.adoptions');

Route::get('/admin/reports', [ReportsController::class, 'view_reports'])
    ->middleware(['auth', 'admin'])
    ->name('admin.reports');

Route::get('/admin/notications', [NotificationController::class, 'notification'])
    ->middleware(['auth', 'admin'])
    ->name('admin.notifications');

Route::get('/user/notications', [NotificationController::class, 'ShowMorePage'])
->middleware(['auth', 'user'])->name('user.notifications');

// Route::get('/admin/adoptions', function () {
//     return view('admin_contents.adoptions');
// })->middleware(['auth', 'verified'])->name('admin.adoptions');


// Route::get('/user/volunteerprogress', function () {
//      return view('user_contents.volunteer_progress');
// })->middleware(['auth', 'user'])->name('user.volunteerprogress');

Route::get('/user/volunteerprogress/{userId}/{applicationId}', [VolunteerController::class, 'UserVolunteerProgress'])
    ->middleware(['auth', 'user'])
    ->name('user.volunteerprogress');

Route::get('/admin-volunteer-progress/{userId}/{id}', [VolunteerController::class, 'AdminVolunteerProgress'])->name('admin.volunteer.progress');

// Route::get('/admin/schedule', function () {return view('admin_contents.schedule');})->middleware(['auth', 'verified'])->name('admin.schedule');

Route::put('/update-schedule-status/{id}', [ScheduleController::class, 'updateScheduleStatus'])->name('update.schedule.status');

Route::put('/reject-schedule-status/{id}', [ScheduleController::class, 'rejectScheduleStatusVisit'])->middleware(['auth', 'admin'])->name('reject.visit');

Route::get('/admin/schedule', [ScheduleController::class, 'view_schedule'])
    ->middleware(['auth', 'admin'])
    ->name('admin.schedule');

Route::get('/admin/profile/{id}', [ProfileController::class, 'adminProfile'])->name('admin.profile');

Route::get('/user/profile/{id}', [ProfileController::class, 'userProfile'])->name('user.profile');

Route::put('/user/update/{id}', [ProfileController::class, 'updateUserProfile'])->name('update.user');

Route::put('/user/update/password/{id}', [ProfileController::class, 'updatePassword'])->name('update.password');

Route::put('/user/update/birthday/{id}', [ProfileController::class, 'updateBirthday'])->name('update.birthday');

Route::put('/user/update/address/{id}', [ProfileController::class, 'updateAddress'])->name('update.address');

Route::put('/user/update/profile/{id}', [ProfileController::class, 'updateProfileImage'])->name('update.profile.image');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/about', function () {
    return view('initial_page.aboutus');
})->name('about');



Route::get('/contact', function () {
    return view('initial_page.contact');
})->name('contact');

// Route::get('/pets', function () {
//     return view('initial_page.pets');
// })->name('pets');

Route::get('/pets', [PetDataController::class, 'showPublicPets'])->name('pets');

Route::get('/home', function () {
    $controller = new PetDataController();
    return $controller->showPublicPets1();
})->name('home');

Route::get('/pets_desc/{id}', function ($id) {
    $controller = new PetDataController();
    return $controller->showPet1($id);
})->name('pet.desc');


Route::get('/howicanhelp', function () {
    return view('initial_page.how');
})->name('how');

Route::get('/generate_pdf/{userId}/{applicationId}', [adoptionController::class, 'export_pdf'])->name('export.pdf');
// admin crud
Route::post('/addPet', [PetDataController::class, 'addPet'])->middleware(['auth', 'admin'])->name('addPet');

Route::get('/pets/{id}', [PetDataController::class, 'showPet'])->middleware(['auth', 'admin'])->name('showPet');

Route::put('/pets/{id}', [PetDataController::class, 'update'])->middleware(['auth', 'admin'])->name('pets.update');

Route::put('/pets/delete/{id}', [PetDataController::class, 'updateDelete'])->middleware(['auth', 'admin'])->name('pets.delete');

Route::put('/pets/available/{id}', [PetDataController::class, 'updateAvail'])->middleware(['auth', 'admin'])->name('pets.available');

// Route::delete('/pets/{id}', [PetDataController::class, 'delete'])->middleware(['auth', 'admin'])->name('pets.delete');

Route::delete('/delete-account', [ProfileController::class, 'deleteAccount'])->middleware('auth')->name('delete.account');

// for search
// Route::post('/pet/search', [PetDataController::class, 'search'])->middleware(['auth', 'verified'])->name('search');

Route::get('/filter-pets', [PetDataController::class, 'filterPets'])->name('filter.pets');

Route::post('/mark-notifications-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-as-read');

// Route::post('/notifications/{notification}/mark-as-read-single', [NotificationController::class, 'markAsReadUser'])->name('notifications.mark-as-read-user');
// Route::post('/mark-notification-as-read/{id}', [NotificationController::class, 'markAsReadUser'])->name('update-notification');
Route::post('/update-mark-as-read/{notificationId}', [NotificationController::class, 'updateMarkAsRead'])->name('update.mark_as_read');

Route::post('/messages/mark-as-read', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');

Route::get('/contactdev', [NotificationController::class, 'contact_developer'])->middleware(['auth', 'admin'])->name('admin.developer');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function() {

    Route::get('/chat', Index::class)->name('chat.index');
    Route::get('/chat-inbox/{messageId}', Chat::class)->name('chat');
    
});



