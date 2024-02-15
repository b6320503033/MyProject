<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnonymousController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentInspectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Top_upController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\HistoryUserController;
use Illuminate\Support\Facades\Auth;


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


/*peopleware home*/
Route::get('/finance/home',[HomeController::class,'financeHome'])->name('finance.home')->middleware('is_admin');
Route::get('/document/home',[HomeController::class,'documentHome'])->name('document.home')->middleware('is_admin');
Route::get('/admin/home',[HomeController::class,'adminHome'])->name('admin.home')->middleware('is_admin');

/*anonymous/**/
Route::get('/anonymous/home', [AnonymousController::class,'home'])->name('home');

/*account */
Route::get('/account/all', [AccountController::class, 'showAll'])->name('accountAll');
Route::get('/account/{id}', [AccountController::class, 'show'])->name('account');

/*campaign */
Route::get('/campaign/create', [CampaignController::class, 'create'])->name('campaignCreate');
Route::get('/campaign/createIndividual', [CampaignController::class, 'createIndividual'])->name('campaignCreateIndividual');
Route::get('/campaign/createOrganization', [CampaignController::class, 'createOrganization'])->name('campaignCreateOrganization');
Route::post('/campaign/saveIndividual', [CampaignController::class, 'saveIndividual'])->name('campaignSaveIndividual');
Route::post('/campaign/saveOrganization', [CampaignController::class, 'saveOrganization'])->name('campaignSaveOrganization');
Route::get('/campaign/edit', [CampaignController::class, 'edit'])->name('campaignEdit');
Route::post('/campaign/update/{id}', [CampaignController::class, 'update'])->name('campaignUpdate');
Route::get('/campaign/all', [CampaignController::class, 'showAll'])->name('campaignAll');
Route::get('/campaign/{id}', [CampaignController::class, 'show'])->name('campaign');

/*admin*/
    /*Account*/
Route::get('/admin/account/all', [AdminController::class, 'showAllAccount'])->name('adminAccountAll');
Route::get('/admin/account', [AdminController::class, 'showAccount'])->name('adminAccount');
Route::get('/admin/account/search', [AdminController::class, 'searchAccount'])->name('adminSearchAccount');
Route::get('/admin/account/update', [AdminController::class, 'updateAccount'])->name('adminUpdateAccount');
    /*Ban Account*/
Route::get('/admin/account/ban/all', [AdminController::class, 'showBanAccount'])->name('adminAccountBan');
Route::get('/admin/account/ban', [AdminController::class, 'showBan'])->name('adminBan');
Route::get('/admin/account/ban/search', [AdminController::class, 'searchBanAccount'])->name('adminSearchBanAccount');
Route::get('/admin/account/ban/update', [AdminController::class, 'updateBanAccount'])->name('adminUpdateBan');
    /*Campaign*/
Route::get('/admin/campaign/all', [AdminController::class, 'showAllCampaign'])->name('adminCampaignAll');
Route::get('/admin/campaign', [AdminController::class, 'showCampaign'])->name('adminCampaign');
Route::get('/admin/campaign/search', [AdminController::class, 'searchCampaign'])->name('adminSearchCampaign');
Route::get('/admin/campaign/close', [AdminController::class, 'closeCampaign'])->name('adminCampaignClose');
Route::get('/admin/campaign/cancel', [AdminController::class, 'cancelCampaign'])->name('adminCampaignCancel');

/* Document Inspection */
Route::get('/documentInspection', function () { 
    try {
        $password = file_get_contents("D:/Passwords/DocumentInspectorPassword.txt");
        if (password_verify($password, '$2y$10$MHIsDHSbSAjnJQ.CbnBTRurAkGC6dGpFIZ/uInce7.OvDN18CBt5S')) {
            return view('documentInspection/reportAcquisition');
        }
        $password = file_get_contents("D:/Passwords/AdminPassword.txt");
        if (password_verify($password, '$2y$10$hKkp36BE38F6hMb0C9nMp.0SKNo1QHm29TPo8BNg1tk7GbJIo6w7q')) {
            return view('documentInspection/reportObligation');
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
});

Route::get('/documentInspection/proceed/{id}', function ($id) {
    try {
        $password = file_get_contents("D:/Passwords/DocumentInspectorPassword.txt");
        if (password_verify($password, '$2y$10$MHIsDHSbSAjnJQ.CbnBTRurAkGC6dGpFIZ/uInce7.OvDN18CBt5S')) {
            DocumentInspectionController::proceed($id);
            echo "Go back and refresh the page!";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
});

Route::get('/documentInspection/reject/{id}', function ($id) {
    try {
        $password = file_get_contents("D:/Passwords/DocumentInspectorPassword.txt");
        if (password_verify($password, '$2y$10$MHIsDHSbSAjnJQ.CbnBTRurAkGC6dGpFIZ/uInce7.OvDN18CBt5S')) {
            DocumentInspectionController::reject($id);
            echo "Go back and refresh the page!";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
});

Route::get('/admin/ban/{id}', function ($id) {
    try {
        $password = file_get_contents("D:/Passwords/AdminPassword.txt");
        if (password_verify($password, '$2y$10$hKkp36BE38F6hMb0C9nMp.0SKNo1QHm29TPo8BNg1tk7GbJIo6w7q')) {
            DocumentInspectionController::ban($id);
            echo "Go back and refresh the page!";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
});

Route::get('/admin/reject/{id}', function ($id) {
    try {
        $password = file_get_contents("D:/Passwords/AdminPassword.txt");
        if (password_verify($password, '$2y$10$hKkp36BE38F6hMb0C9nMp.0SKNo1QHm29TPo8BNg1tk7GbJIo6w7q')) {
            DocumentInspectionController::reject($id);
            echo "Go back and refresh the page!";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/*anonymous user*/
//Route::get('/',  [AnonymousController::class, 'home'] )->name('anoHome');
route::get('/', function ()
{
    return redirect('home');
});



/*anonymous user*/

/*user*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'home'], function () {
        return view('dashboard');
    })->name('dashboard');
});

    
Route::get('/campaign/{id}', [UserController::class, 'show'])->name('campaign');
Route::post('/campaign/donate',[UserController::class, 'userDonate'])->name('userDonate');

Route::get('/user/profile', [UserController::class, 'profile'])->name('profile.show');
Route::get('/manage',[UserController::class, 'manage'])->name('manage');

Route::get('/search', [UserController::class, 'search'])->name('search');

Route::post('/manage/cancel',[UserController::class, 'cancel'])->name('cancelCampaign');

Route::post('/manage/close',[UserController::class, 'close'])->name('closeCampaign');

Route::get('/manage/{id}', [UserController::class, 'detailShow'])->name('detail');

Route::get('/noti', [UserController::class, 'noti'])->name('noti');

//change-password
#Change Password
Route::get('/changePassword/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

//verifyForm
Route::get('/verify/verify-form',[App\Http\Controllers\VerifyController::class, 'index'])->name('verify-form');
Route::post('/verify/verify-form',[App\Http\Controllers\VerifyController::class, 'submitForm'])->name('submit-form');
//adminDoc
Route::get('/admin-formVal/confirm/{id}',[App\Http\Controllers\HomeController::class, 'confirm'])->name('adminConfirm');
Route::post('/admin-formVal/agree',[App\Http\Controllers\HomeController::class, 'agree'])->name('adminAgree');





///   การเงินต่างๆ+ประวัติการเติม //
Route::get('/monetary', [Top_upController::class, 'Allform'])->name('monet');
//route top_up
Route::get('top_ups', [Top_upController::class, 'index'])->name('intTop');;
Route::post('top_ups', [Top_upController::class, 'store']);
Route::get('/formTop/{id_user}/{id}', [Top_upController::class, 'show']);
Route::get('/formTopAdd/{id_user}/{id}/{sumAmount}/{amount}', [UserController::class, 'addAmount']);
Route::get('/formTopReject/{id_user}/{id}/{amount}', [UserController::class, 'rejectT']);
Route::get('/formTopIndex', [Top_upController::class, 'indexEmp'])->name('formT');
//route withdraw
Route::get('withdraw', [WithdrawController::class, 'index'])->name('WithUser');
Route::post('withdraw', [WithdrawController::class, 'store']);
Route::get('/formWith/{id_user}/{id}', [WithdrawController::class, 'show'])->name('showW');
Route::get('/formWithReduce/{id_user}/{id}/{sumAmount}/{amount}', [UserController::class, 'reduceAmount']);
Route::get('/formWithReject/{id_user}/{id}/{amount}', [UserController::class, 'rejectW']);
Route::get('formWithIndex', [WithdrawController::class, 'indexEmp'])->name('formW');
//route campaign
Route::get('/formCam/{id}', [CampaignController::class, 'showC'])->name('showC');
Route::get('/formCamAgree/{id}', [CampaignController::class, 'agreeC'])->name('agreeC');
Route::get('formCamIndex', [CampaignController::class, 'indexEmp'])->name('formC');
//หน้าประวัติการเติมเงิน User
Route::get('his_money', [HistoryUserController::class, 'hisUserIndex'])->name('hisU');

