<?php

//use App\Http\Controllers\Admin\AdminController;
//use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Pemain;
use App\Http\Controllers\Acara;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('visitor.home');
})->name('index');

Route::get('/test', function () {
    return view('test');
});

Route::view('/about', 'visitor.about')->name('visitor.about');

Route::view('/faq', 'visitor.faq')->name('visitor.faq');

Route::view('/gallery', 'visitor.gallery')->name('visitor.gallery');

Route::view('/competition', 'visitor.competition')->name('visitor.competition');



// ===== Admin Route (PUBREG) =====
Route::group(
    ['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        // Dashboard
        Route::get('/', [Admin\AdminController::class, 'index'])
            ->name('dashboard');
        Route::get('/messages', [Admin\AdminController::class, 'messages'])
            ->name('messages');
        Route::get('/download', [Admin\AdminController::class, 'download'])
            ->name('download');
        Route::get('/download/participant', [Admin\AdminController::class, 'export'])
            ->name('download.participants');

        Route::get('/messages/search', [Admin\AdminController::class, 'searchMessage'])
            ->name('search-message');
        //Route::get('show', [AdminController::class, 'showMessages'])->name('show');
        Route::get('/messages/{team:name}', [Admin\AdminController::class, 'showChat'])
            ->name('chat');
        Route::post('/message-send', [Admin\AdminController::class, 'sendChat'])
            ->name('chat.send');

        // Registration
        Route::get('/registration', [Admin\TeamController::class, 'index'])
            ->name('teams.index');
        Route::get('/registration/search', [Admin\TeamController::class, 'search'])
            ->name('teams.search');
        Route::post('/registration/{team:name}/verification', [Admin\TeamController::class, 'verificationTeam'])
            ->name('teams.verification');
        Route::post('/registration/{team:name}/unverified', [Admin\TeamController::class, 'unverifiedTeam'])
            ->name('teams.unverified');
        Route::post('/registration/team-data', [Admin\TeamController::class, 'getTeamData'])
            ->name('teams.data');
        Route::post('registration/deactivate', [Admin\TeamController::class, 'deactivateTeam'])
            ->name('teams.deactivate');

        // Users
        Route::get('/users', [Admin\UserController::class, 'index'])
            ->name('users.index');
        Route::post('/users/store', [Admin\UserController::class, 'store'])
            ->name('users.store');
        Route::post('/users/destroy', [Admin\UserController::class, 'destroy'])
            ->name('users.destroy');
    }
);

// ===== Acara Route =====
Route::group(
    ['middleware' => 'acara', 'prefix' => 'acara', 'as' => 'acara.'],
    function () {
        // Index
        Route::get('/', [Acara\AcaraController::class, 'index'])->name('index');

        // ==================================== CONTEST ====================================
        Route::get('/contest', [Acara\ContestController::class, 'index'])->name('contest');

        // Create a new Contest
        //Route::get('/contest/create', [Acara\ContestController::class, 'create'])->name('contest.create');
        Route::post('/contest/create', [Acara\ContestController::class, 'store'])->name('contest.store');

        // Show Specified Contest
        Route::get('/contest/{contest:slug}', [Acara\ContestController::class, 'show'])->name('contest.show');

        // Add Contestant
        Route::post('/contest/{contest:slug}/contestants/store', [Acara\ContestController::class, 'addContestants'])
            ->name('contest.contestant.store');

        // Delete Contestant
        Route::post('/contest/{contest:slug}/contestants/{team}/destroy', [Acara\ContestController::class, 'deleteContestant'])
            ->name('contest.contestant.destroy');

        // Edit Specified Contest
        Route::get('/contest/{contest:slug}/edit', [Acara\ContestController::class, 'edit'])->name('contest.edit');
        Route::post('/contest/{contest:slug}/edit', [Acara\ContestController::class, 'update'])->name('contest.update');

        // Delete Specified Contest
        Route::post('contest/{contest:slug}/destroy', [Acara\ContestController::class, 'destroy'])->name('contest.destroy');

        // ==================================== Rally Games ====================================
        Route::post('/rallygames/add', [Acara\AcaraController::class, 'store'])
            ->name('rallygames.store');

        Route::get('/rallygames/{rallyGame}', [Acara\AcaraController::class, 'rally'])
            ->name('rallygames.rally');
    }
);

// ===== Team Route =====
Route::group(
    ['middleware' => 'participant', 'prefix' => 'team', 'as' => 'team.'],
    function () {
        Route::get('/', [Pemain\PemainController::class, 'index'])->name('index');
        Route::get('/contest', [Pemain\PemainController::class, 'contest'])->name('contest');

        Route::get('/contest/{contest:slug}', [Pemain\PemainController::class, 'submission'])->name('contest.submission');
        Route::post('/contest/{contest:slug}/submit', [Pemain\PemainController::class, 'submitLink'])->name('contest.submit');
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
