<?php

use App\Models\MarketingCampaign;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\BulkReleaseController;
use App\Http\Controllers\User\ReleaseController;
use App\Http\Controllers\RightsHoldersController;
use App\Http\Controllers\ReferralProgramController;
use App\Http\Controllers\MarketingCampaignController;
use App\Http\Controllers\User\VideoReleaseController;
use App\Http\Controllers\User\RoyaltySplitsController;

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

Route::get('test-template', function () {
    return view('emails.test');
});

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('about-us', [SiteController::class, 'aboutUs'])->name('site.aboutUs');
Route::get('faqs', [SiteController::class, 'faqs'])->name('site.faqs');
Route::get('contact', [SiteController::class, 'contact'])->name('site.contact');
Route::post('contact', [ContactUsController::class, 'contact'])->name('contactUs');
Route::post('contact-submit', [SiteController::class, 'contactSubmit'])->name('site.contact.submit');
Route::get('terms-of-services', [SiteController::class, 'termsOfService'])->name('site.termsOfService');
Route::get('privacy-policy', [SiteController::class, 'privacyPolicy'])->name('site.privacyPolicy');
Route::get('refund-policy', [SiteController::class, 'refundPolicy'])->name('site.refundPolicy');
Route::get('anti-fraud-policy', [SiteController::class, 'antiFraudPolicy'])->name('site.antiFraudPolicy');
Route::get('ugc-policy', [SiteController::class, 'ugcPolicy'])->name('site.ugcPolicy');



Route::get('pricing', [SiteController::class, 'pricing'])->name('site.pricing');
Route::get('success-stories', [SiteController::class, 'successStories'])->name('site.successStories');
Route::get('story/icy-lando', [SiteController::class, 'storyIcyLando'])->name('site.storyIcyLando');
Route::get('story/molly-hammar', [SiteController::class, 'storymollyHammar'])->name('site.storymollyHammar');
Route::get('story/nadel-paris', [SiteController::class, 'nadelParis'])->name('site.nadelParis');
Route::get('story/femme', [SiteController::class, 'femme'])->name('site.storyFemme');

Route::post('testPaypal', [SiteController::class, 'testPaypal'])->name('testPaypal');


Route::get('css', [SiteController::class, 'css'])->name('site.css');
Route::get('css-1', [SiteController::class, 'css1'])->name('site.css1');


Auth::routes();
Route::name('user.')->prefix('user')->group(function () {
    Route::group(['middleware' => ['isVerified', 'auth']], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::group(['middleware' => ['isBan']], function () {
            Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
            Route::get('edit-my-account', [AccountController::class, 'editMyAccount'])->name('accounts.editMyAccount');
            Route::put('update-password', [AccountController::class, 'updatePassword'])->name('accounts.updatePassword');
            Route::get('accounts/renew-plan', [AccountController::class, 'renewplans'])->name('accounts.renewplans');
            Route::get('accounts/renew-plan/{package}', [AccountController::class, 'paymentplan'])->name('accounts.paymentplan');
            Route::post('accounts/updatePlan/{package}', [SubscribeController::class, 'paymentDetails'])->name('accounts.updatePlan');

            Route::post('audio_track', [ReleaseController::class, 'audio_track'])->name('release.audio_track');
            Route::get('edit-track', [ReleaseController::class, 'editTrack'])->name('release.editTrack');
            Route::post('update-track', [ReleaseController::class, 'updateTrack'])->name('release.updateTrack');
            Route::post('delete-track', [ReleaseController::class, 'deleteTrack'])->name('release.deleteTrack');
            Route::post('reset-track', [ReleaseController::class, 'resetTrack'])->name('release.resetTrack');
            Route::get('get-artists', [ReleaseController::class, 'getArtist'])->name('getArtist');
            Route::post('add-new-artist', [ReleaseController::class, 'addNewArtist'])->name('addNewArtist');
            Route::post('add-artist-detail', [ReleaseController::class, 'addArtistDetail'])->name('addArtistDetail');
            Route::get('edit-artist', [ReleaseController::class, 'editArtist'])->name('editArtist');
            Route::post('update-artist', [ReleaseController::class, 'updateArtist'])->name('updateArtist');
            Route::get('delete-artist', [ReleaseController::class, 'deleteArtist'])->name('deleteArtist');

            Route::get('rights-holders', [RightsHoldersController::class, 'index'])->name('rightsHolders.index');
            Route::get('artist-detail/{id}', [RightsHoldersController::class, 'detail'])->name('rightsHolders.detail');
            Route::get('update-profile-link/{id}', [RightsHoldersController::class, 'updateProfileLink'])->name('rightsHolders.updateProfileLink');


            Route::post('upload-large-files', [ReleaseController::class, 'uploadLargeFiles'])->name('uploadLargeFiles');
            Route::get('audio_track/{filename}', [ReleaseController::class, 'audioTrackPath'])->name('release.audioTrackPath');
            Route::get('video_track/{filename}', [VideoReleaseController::class, 'videoTrackPath'])->name('release.videoTrackPath');


            Route::get('play-track', [ReleaseController::class, 'playTrack'])->name('playTrack');
            Route::post('takedown', [ReleaseController::class, 'takedown'])->name('takedown');
            Route::post('takedown-video', [VideoReleaseController::class, 'takedownVideo'])->name('takedownVideo');

            Route::get('create-release', [ReleaseController::class, 'createRelease'])->name('createRelease');
            Route::resource('release', ReleaseController::class);
            Route::resource('video-release', VideoReleaseController::class);

            Route::get('royalty-splits', [RoyaltySplitsController::class, 'index'])->name('royalty-splits.index');
            Route::get('share-royalty-splits/{id}', [RoyaltySplitsController::class, 'share'])->name('royalty-splits.share');
            Route::get('share-video-royalty-splits/{id}', [RoyaltySplitsController::class, 'shareVideoRoyalties'])->name('royalty-splits.videoRoyalties');
            Route::get('royalty-split-detail', [RoyaltySplitsController::class, 'detail'])->name('royalty-splits.detail');
            Route::get('royalty-split-cancel', [RoyaltySplitsController::class, 'cancel'])->name('royalty-splits.cancel');
            Route::post('royalty-split-store', [RoyaltySplitsController::class, 'store'])->name('royalty-splits.store');
            Route::get('royalty-split-edit', [RoyaltySplitsController::class, 'edit'])->name('royalty-splits.edit');
            Route::post('delete-and-modify-royalty-split', [RoyaltySplitsController::class, 'deleteAndModify'])->name('royalty-splits.deleteAndModify');
            Route::post('delete-royalty-split', [RoyaltySplitsController::class, 'delete'])->name('royalty-splits.delete');

            Route::get('create-bulk-release', [BulkReleaseController::class, 'createBulkRelease'])->name('create-bulk-release');
            Route::get('create-bulk-release/show/{id}', [BulkReleaseController::class, 'show'])->name('create-bulk-release.show');


            Route::post('royalty-split-collaborator', [RoyaltySplitsController::class, 'collaboratorStatus'])->name('royalty-splits.collaboratorStatus');


            Route::get('free-video-distribution', [App\Http\Controllers\HomeController::class, 'freeVideodistribution'])->name('freeVideodistribution');

            Route::resource('faqs', FaqController::class);
            Route::resource('supports', SupportController::class);
            Route::get('delete/{id}', [MarketingCampaignController::class, 'delete'])->name('campaigns.delete');
            Route::resource('campaigns', MarketingCampaignController::class);
            Route::resource('statements', StatementController::class);
            Route::resource('accounts', AccountController::class);
            Route::resource('banks', BankController::class);
            Route::resource('analytics', AnalyticsController::class);

            Route::get('credit-balance', [PayoutController::class, 'creditBalance'])->name('payout.creditBalance');
            Route::get('payout', [PayoutController::class, 'payout'])->name('payout.payout');

            Route::get('add-bank', [BankController::class, 'addBank'])->name('addBank');
            Route::post('add-bank', [BankController::class, 'storeBank'])->name('storeBank');

            Route::post('payout-request', [PayoutController::class, 'request'])->name('payout.request');
            Route::get('top/{slug}', [HomeController::class, 'top'])->name('top');

            Route::get('referral-program', [ReferralProgramController::class, 'referralProgram'])->name('referralProgram');
        });
    });
    Route::post('accounts/paypal', [SubscribeController::class, 'payWithPaypal'])->name('accounts.payWithPaypal');
});

Route::get('change-your-password', [SiteController::class, 'changeAdminPassword']);
Route::group(['middleware' => ['auth']], function () {
    Route::get('subscription', [SubscribeController::class, 'subscription'])->name('subscription');
    Route::get('verification', [SubscribeController::class, 'verification'])->name('verification');
    Route::get('account-ban', [SubscribeController::class, 'accountBan'])->name('accountBan');
    Route::get('block-release', [SubscribeController::class, 'blockRelease'])->name('blockRelease');
    Route::get('verification-process', [SubscribeController::class, 'verificationProcess'])->name('verificationProcess');
    Route::get('resent-verification', [SubscribeController::class, 'resendVerification'])->name('resendVerification');

    Route::get('subscribe/{package}', [SubscribeController::class, 'subscribe'])->name('subscribe');
    Route::get('pay/{package}', [SubscribeController::class, 'pay'])->name('pay');
    Route::post('pay/{package}', [SubscribeController::class, 'paymentDetails'])->name('paymentDetails');
    Route::get('thank-you', [SubscribeController::class, 'thankYou'])->name('thankYou');
});
