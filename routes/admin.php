<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ReleaseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MarketingCampaignController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PayoutController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StatementController;
use App\Http\Controllers\Admin\StreamDataController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\TakedownController;
use App\Http\Controllers\Admin\UnsubscribedUserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VideoReleaseController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\RoyaltySplitController;
use App\Models\Admin;

// Route::get('admins', function(){
//     $data = Admin::where('id',1)->get();
//     dd($data);
// });
Route::get('admin/login', [AuthController::class, 'loginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('admin/logout', function () {
    Auth::guard('admin')->logout();
    return redirect('admin/login');
})->name('admin.logout');
Route::get('stores', function(){
    print_r(stores());
});
Route::middleware('auth:admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('campaigns/change-status/{id}', [MarketingCampaignController::class, 'changeStatus'])->name('campaigns.statusChange');
    Route::post('supports/change-status', [SupportController::class, 'changeStatus'])->name('supports.statusChange');
    Route::get('packages/change-status/{id}', [PackageController::class, 'changeStatus'])->name('packages.changestatus');
    Route::get('play-track',[ReleaseController::class,'playTrack'])->name('playTrack');
    Route::post('update-release/{id}', [ReleaseController::class,'updateRelease'])->name('updateRelease');
    Route::post('update-track', [ReleaseController::class,'updateTrack'])->name('updateTrack');
    Route::get('add-streams',[ReleaseController::class, 'addStreams'])->name('addStreams');
    Route::post('release-status/{id}/{status}', [ReleaseController::class, 'releaseStatus']);
    Route::post('video-release-status/{id}/{status}', [VideoReleaseController::class, 'releaseStatus']);

    Route::get('delete-release/{id}',[ReleaseController::class, 'deleteRelease'])->name('deleteRelease');
    Route::get('assign-statement-to-user/{id}', [StatementController::class, 'assignUser'])->name('statments.assigntoUser');
    Route::post('block-release', [ReleaseController::class, 'blockRelease'])->name('release.blockRelease');


    // analytics route
    Route::post('store-analytics', [StreamDataController::class, 'storeAnalytics'])->name('stream.storeAnalytics');
    Route::post('store-user-platforms', [StreamDataController::class, 'storePlatforms'])->name('stream.storePlatforms');
    Route::post('store-user-top-stores', [StreamDataController::class, 'storeTopStores'])->name('stream.storeTopStores');
    Route::post('fetch-countries', [StreamDataController::class, 'fetchCountries'])->name('stream.fetchCountries');

    Route::get('audio_track/{filename}', [ReleaseController::class, 'audioTrackPath'])->name('release.audioTrackPath');
    Route::get('download/track/{filename}', [ReleaseController::class,'downloadTrack'])->name('release.downloadTrack');
    Route::get('download/album-artwork/{filename}', [ReleaseController::class,'albumArtWork'])->name('release.albumArtWork');

    Route::get('download/video-track/{filename}', [VideoReleaseController::class,'downloadTrack'])->name('release.VideodownloadTrack');
    Route::get('download/video-artwork/{filename}', [VideoReleaseController::class,'albumArtWork'])->name('release.VideoalbumArtWork');
    Route::get('delete-video-release/{id}',[VideoReleaseController::class, 'deleteVideoRelease'])->name('deleteVideoRelease');

    Route::get('ban-user/{id}', [UserController::class,'ban'])->name('users.ban');
    Route::resource('users', UserController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('video-release', VideoReleaseController::class);
    Route::resource('release', ReleaseController::class);

    Route::resource('statements', StatementController::class);
    Route::resource('campaigns', MarketingCampaignController::class);
    Route::resource('supports', SupportController::class);
    Route::resource('packages', PackageController::class);
    Route::post('top-stores/{id}', [StreamDataController::class,'topStores'])->name('stream.topStores');
    Route::post('top-countries/{id}', [StreamDataController::class,'topCountries'])->name('stream.topCountries');
    Route::post('top-platforms/{id}', [StreamDataController::class,'topPlatforms'])->name('stream.topPlatforms');
    Route::get('inquiries',[ContactUsController::class,'inquiries'])->name('inquiries');

    Route::post('stream-by-countries/{id}', [StreamDataController::class,'streamByCountries'])->name('stream.streamByCountries');

    Route::get('get-login/{id}', [StreamDataController::class,'getLogin'])->name('getLogin');
    Route::post('upgrade', [StreamDataController::class,'upgrade'])->name('upgrade');
    Route::resource('stream', StreamDataController::class);
    Route::get('artist/{id}', [ArtistController::class,'index'])->name('artist.index');
    Route::post('artist/{id}', [ArtistController::class,'store'])->name('artist.store');
    Route::get('artist-edit/{id}/{artist_id}', [ArtistController::class,'edit'])->name('artist.edit');
    Route::post('artist-edit/{artist_id}', [ArtistController::class,'update'])->name('artist.update');



    Route::get('send-warning', [StreamDataController::class, 'sendWarning'])->name('stream.warning');
    Route::get('ban-account', [StreamDataController::class, 'banAccount'])->name('stream.ban');
    Route::get('manage-stream-data', [StreamDataController::class, 'manageStreamData'])->name('stream.manageStreamData');
    Route::get('delete-stream/{id}/{type}', [StreamDataController::class, 'deleteStream'])->name('stream.deleteStream');



    Route::get('add-credit', [PayoutController::class, 'addCredit'])->name('payout.addCredit');
    Route::post('add-credit', [PayoutController::class, 'storeCredit'])->name('payout.storeCredit');
    Route::get('credit-balance-history', [PayoutController::class, 'creditDetail'])->name('payout.creditDetail');
    Route::get('payout-requests', [PayoutController::class, 'requests'])->name('payout.requests');
    Route::get('user-payout-details/{id}', [PayoutController::class, 'payoutDetails'])->name('payout.payoutDetails');
    Route::post('complete-payout', [PayoutController::class, 'completePayout'])->name('payout.completePayout');

    Route::get('un-subscribe-users', [UnsubscribedUserController::class,'index'])->name('unsubscribe.index');
    Route::post('send-email-unsubscribe-users', [UnsubscribedUserController::class,'sendEmailUnSub'])->name('unsubscribe.sendEmail');
    Route::get('email-logs', [UnsubscribedUserController::class,'emailLogs'])->name('unsubscribe.emailLogs');


    Route::get('takedown-list',[TakedownController::class,'index'])->name('takedown.index');
    Route::get('takedown-status',[TakedownController::class,'status'])->name('takedown.status');


    Route::get('video-takedown-list',[TakedownController::class,'videoIndex'])->name('Videotakedown.index');
    Route::get('video-takedown-status',[TakedownController::class,'videoStatus'])->name('Videotakedown.status');


    Route::get('settings', [SettingController::class,'index'])->name('settings');
    Route::post('settings/{id}', [SettingController::class,'update'])->name('settings.update');

    Route::get('royalty-split', [RoyaltySplitController::class,'index'])->name('royaltySplit.index');
    Route::get('royalty-split-detail/{release_id}', [RoyaltySplitController::class,'detail'])->name('royaltySplit.detail');

    Route::get('royalty-split-video', [RoyaltySplitController::class,'VideoIndex'])->name('royaltySplit.videoIndex');
    Route::get('royalty-split-detail-video/{release_id}', [RoyaltySplitController::class,'videoDetail'])->name('royaltySplit.videoDetail');

    




});
