    <?php

    use App\Http\Controllers\sistema\general\PermisoController;
    use App\Http\Controllers\sistema\general\UserController;
    use Illuminate\Support\Facades\Route;
    use Spatie\Permission\Contracts\Permission;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });


    Route::resource('user', UserController::class)->names('user');
    Route::get('user/data', [UserController::class, 'data'])->name('user.data');

    Route::get('permisos', [PermisoController::class, 'index'])->name('permisos.index');