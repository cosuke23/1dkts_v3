<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\linkController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ChildDownloadController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EncryptionController;
use App\Http\Controllers\AuditTicketController;
use App\Http\Controllers\AuditLinkController;
use App\Http\Controllers\AuditFileController;
use App\Http\Controllers\CompletedController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\ChangeOrderController;
use App\Http\Controllers\SCDownloadController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\DownloadTicketController;
use App\Http\Controllers\dependentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/'.env("REGISTER_ROUTE"), [CustomAuthController::class, 'registration'])->name(env("REGISTER_ROUTE"));
Route::get('link',[App\Http\Controllers\linkController::class,'show'])->middleware(["verified"]);
Route::get('ticket',[App\Http\Controllers\TicketController::class,'show'])->middleware(["verified"]);

Route::get('audit_ticket',[App\Http\Controllers\AuditTicketController::class,'show'])->middleware(["verified"]);
Route::get('audit_link',[App\Http\Controllers\AuditLinkController::class,'show'])->middleware(["verified"]);
Route::get('audit_file',[App\Http\Controllers\AuditFileController::class,'show'])->middleware(["verified"]);
Route::get('completed',[App\Http\Controllers\CompletedController::class,'show'])->middleware(["verified"]);
Route::get('system-change',[App\Http\Controllers\SystemController::class,'show'])->middleware(["verified"]);
Route::get('csv_upload',[App\Http\Controllers\CsvController::class,'show'])->middleware(["verified"]);
Route::get('change_order',[App\Http\Controllers\ChangeOrderController::class,'show'])->middleware(["verified"]);
Route::get('project_manager',[App\Http\Controllers\UserRegistrationController::class,'show'])->middleware(["verified"]);
Route::get('project_name',[App\Http\Controllers\UserRegistrationController::class,'project_show'])->middleware(["verified"]);
Route::get('company_role',[App\Http\Controllers\UserRegistrationController::class,'company_show'])->middleware(["verified"]);
Route::get('establishment',[App\Http\Controllers\UserRegistrationController::class,'establishment_show'])->middleware(["verified"]);
Route::get('company_users',[App\Http\Controllers\UserRegistrationController::class,'company_users'])->middleware(["verified"]);

Route::get('/', function () {
    return view('welcome');
})->middleware('verified');

Auth::routes(['verify' => true]);
Route::get('home', [App\Http\Controllers\HomeController::class, 'show'])->name('home')->middleware(["verified"]);
Route::get('/check', [App\Http\Controllers\HomeController::class, 'check_exist'])->name('check')->middleware(["verified"]);
Route::get('/check_ticket',[App\Http\Controllers\TicketController::class, 'ticket_exist'])->name('check_ticket')->middleware(["verified"]);
Route::get('/get_ticket',[App\Http\Controllers\TicketController::class, 'ticket_data'])->name('get_ticket')->middleware(["verified"]);
Route::get('/get_form',[App\Http\Controllers\TicketController::class, 'form_data'])->name('get_form')->middleware(["verified"]);
Route::get('update/{id}', [App\Http\Controllers\UpdateController::class, 'show'])->name('update')->middleware(["verified"]);
Route::get('ticket_history/{id}', [App\Http\Controllers\historyController::class, 'show'])->name('ticket_history')->middleware(["verified"]);
Auth::routes();
Route::get('/download/{filename}',[DownloadsController::class, 'download'])->name('downloadfile');
Route::get('/downloads/{filenames}',[ChildDownloadController::class, 'downloads'])->name('downloadfiles');
Route::get('/download_SC/{sc_file}',[SCDownloadController::Class,'download_SC'])->name('SC_download');
Route::get('/download_ticket/{ticket}',[DownloadTicketController::Class,'download_ticket'])->name('downloadTicket');
Route::get('logout', function(){
   Auth::logout();
   return Redirect::to('login');
});


Route::post('show_filter',[App\Http\Controllers\TicketController::class,'filter_show'])->name('show_filter');
Route::post('show_proj',[App\Http\Controllers\TicketController::class,'proj_show'])->name('show_proj');
Route::post('csv_upload',[CsvController::class,'uploadContent'])->name('import.content');
Route::post('adddept_head',[App\Http\Controllers\UserRegistrationController::class,'store'])->name('adddept_head');
Route::post('add_project',[App\Http\Controllers\UserRegistrationController::class,'project_store'])->name('add_project');
Route::post('add_role',[App\Http\Controllers\UserRegistrationController::class,'role_store'])->name('add_role');
Route::post('add_establishment',[App\Http\Controllers\UserRegistrationController::class,'establishment_store'])->name('add_establishment');
Route::post('ticket',[App\Http\Controllers\TicketController::class,'store']);
Route::post('system-change',[App\Http\Controllers\SystemController::class,'store']);
Route::post('edit-dept',[App\Http\Controllers\UserRegistrationController::class,'update']);
Route::post('edit-proj',[App\Http\Controllers\UserRegistrationController::class,'update_proj']);
Route::post('edit-role',[App\Http\Controllers\UserRegistrationController::class,'update_role']);
Route::post('edit-establishment',[App\Http\Controllers\UserRegistrationController::class,'update_establishment']);
Route::post('edit-file',[App\Http\Controllers\HomeController::class,'update']);
Route::post('edit-ticket',[App\Http\Controllers\TicketController::class,'update']);
Route::post('/add-file',[App\Http\Controllers\HomeController::class,'store'])->name('addfile');
Route::post('link',[App\Http\Controllers\linkController::class,'store']);
Route::post('edit-link',[App\Http\Controllers\linkController::class,'update']);
Route::post('edit-change',[App\Http\Controllers\SystemController::class,'update']);

