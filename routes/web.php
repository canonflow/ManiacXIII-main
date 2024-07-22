<?php

//use App\Http\Controllers\Admin\AdminController;
//use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Pemain;
use App\Http\Controllers\Acara;
use App\Http\Controllers\Penpos;
use App\Http\Controllers\Si;
use App\Http\Controllers\SuperSI;
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


Route::view('/competition', 'visitor.competition')->name('visitor.competition');

Route::view('/pembayaran/upload', 'pemain.pembayaran.upload');
Route::view('/pembayaran/unverified', 'pemain.pembayaran.unverified');



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
        Route::post('/registration/count', [Admin\TeamController::class, 'getRegistCount'])
            ->name('teams.count');

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

        // Add Score
        Route::post('contest/{submission}/add', [Acara\ContestController::class, 'addScore'])->name('addScore');

        // Unduh Rekap
        Route::post('contest/{contest}/rekap/download', [Acara\ContestController::class, 'unduhRekap'])
            ->name('contest.download');

        // ==================================== Rally Games ====================================
        Route::post('/rallygames/add', [Acara\AcaraController::class, 'store'])
            ->name('rallygames.store');

        Route::get('/rallygames/{rallyGame}/detail', [Acara\AcaraController::class, 'rallyDetail'])
            ->name('rallygames.detail');

        Route::post('/rallygames/{rallyGame}/update', [Acara\AcaraController::class, 'update'])
            ->name('rallygames.update');

        Route::get('/rallygames/{rallyGame}', [Acara\AcaraController::class, 'rally'])
            ->name('rallygames.rally');

        Route::delete('/rallygames/{rallyGame}/destroy', [Acara\AcaraController::class, 'destroy'])
            ->name('rallygames.destroy');
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

        // Pembayaran
        Route::post('/pembayaran/upload', [Pemain\PemainController::class, 'upload'])
            ->name('pembayaran.upload');
    }
);

// ===== Penpos Route =====
Route::group(
    ['middleware' => 'penpos', 'prefix' => 'penpos', 'as' => 'penpos.'],
    function () {
        Route::get('/', [Penpos\PenposController::class, 'index'])
            ->name('index');
        Route::post('/store', [Penpos\PenposController::class, 'store'])
            ->name('store');
        Route::delete('/{score}/destroy', [Penpos\PenposController::class, 'destroy'])
            ->name('destroy');
    }
);

// ===== SI Route =====
Route::group(
    ['middleware'=> 'si', 'prefix' => 'si', 'as'=>'si.'],
    function(){
        Route::get('/', [Si\SiController::class, 'index'])->name('index');
        Route::post('/test-pusher', [Si\SiController::class, 'testPusher'])
            ->name('test.pusher');

        // ===== GAME BESAR =====
        Route::post('/{player}/detail', [Si\SiController::class, 'playerDetail'])
            ->name('player.detail');
        Route::post('/{player}/attack', [Si\SiController::class, 'attack']) ->name('attack');
        Route::post('/{player}/power-skill', [Si\SiController::class, 'powerSkillAttack']) ->name('powerSkill');
        Route::post('/{player}/ultimate', [Si\SiController::class, 'ultimateAttack']) ->name('ultimateAttack');
        Route::post('/{player}/buy/potion', [Si\SiController::class, 'buyPotion']) ->name('buyPotion');
        Route::post('/{player}/buy/dragon-breath', [Si\SiController::class, 'buyDragonBreath']) ->name('buyDragonBreath');
        Route::post('/{player}/buy/backpack', [Si\SiController::class, 'buyBackpack']) ->name('buyBackpack');
        Route::post('/{player}/buy/restore', [Si\SiController::class, 'buyRestore']) ->name('buyRestore');
        Route::post('/player/detail', [Si\SiController::class, 'detailTeam']) ->name('detail.team');

        Route::get('/test', [Si\SiController::class, 'test']);
    }
);

// ===== Super SI Route =====
Route::group(
    ['middleware' => 'supersi', 'prefix' => 'super-si', 'as' => 'super-si.'],
    function () {
        Route::get('/', [SuperSI\SuperSIController::class, 'index'])->name('index');

        // ===== RALLY GAMES =====
        Route::get('/rallyGame/{rallyGame}', [SuperSI\SuperSIController::class, 'rallyDetail'])
            ->name('rally.detail');
        Route::post('/rallyGame/{rallyGame}/{score}/score/update', [SuperSI\SuperSIController::class, 'updateScore']);
        Route::post('/rallyGame/{rallyGame}/{score}/score/delete', [SuperSI\SuperSIController::class, 'deleteScore']);

        // ===== GAME BESAR SESSION =====
        Route::get('/gamebesar', [SuperSI\GameBesarController::class, 'index'])
            ->name('gamebesar.index');
        Route::get('/gamebesar/session/{session}', [SuperSI\GameBesarController::class, 'sessionDetail']);
        Route::post('/gamebesar/session/add', [SuperSI\GameBesarController::class, 'addSession'])
            ->name('gamebesar.session.add');
        Route::post('/gamebesar/session/{session}/update', [SuperSI\GameBesarController::class, 'updateSession'])
            ->name('gamebesar.session.update');

        // ===== GAME BESAR ALPHA =====
        Route::post('/gamebesar/alpha/update', [SuperSI\GameBesarController::class, 'updateAlpha'])
            ->name('gamebesar.alpha.update');

        // ===== PLAYER =====
        Route::get('/player', [SuperSI\PlayerController::class, 'index'])
            ->name('player.index');
        Route::get('/player/log/{player}', [SuperSI\PlayerController::class, 'log']);
        Route::get('/player/score/{player}', [SuperSI\PlayerController::class, 'score']);

        // ===== Leaderboard =====
        Route::get('/leaderboard', [SuperSI\SuperSIController::class, 'leaderboard'])
            ->name('leaderboard.index');

        // ===== SUMMERIZE =====
        Route::post('/summarize', [SuperSI\SuperSIController::class, 'summarize'])
            ->name('summarize');
    }
);

// ========== Buat Testing Internal API dlu ==========
// TESTING DI API ROUTE
//Route::get('/checksession', [Si\SiController::class, 'checkSession']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
