<?php

use App\Http\Controllers\permissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
//login
Route::group(['middleware' => "guest"], function () {

    Route::get('/', function () {
        return view('login');
    })->name('login');

    Route::get('register', function () {
        return view('register');
    })->name('register');


    Route::post('/register/user', function (Request $request) {
        $request->validate([
            'name' => "required",
            'email' => "required|unique:users",
            'password' => "required"
        ]);
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return redirect()->to(route('login'))->with("success", "your account created");
    })->name('user.register');

    Route::post('login/store', function (Request $req) {
        $req->validate([
            'email' => "required",
            'password' => "required"
        ]);

        $user = User::where('email', $req->email)->first();

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            Auth::login($user);
            return redirect()->to(route('home'))->with("success", "login successfully");
        }
    })->name('login.store');
});

//user controller
Route::group(['middleware' => "auth"], function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware('role:admin');;

    Route::get('/user/add', [UserController::class, 'create'])->name('user.add')->middleware(['role:admin']);
    Route::post('/user/stores', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('user.update');

    Route::delete('/user/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');


    Route::get('/home', [permissionController::class, 'index'])->name("home");
    Route::get('/permission/add', [permissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [permissionController::class, 'store'])->name('permission.store');
    Route::get('/permission/{id}', [permissionController::class, 'edit'])->name('permission.edit');
    Route::put('/permission/update', [permissionController::class, 'update'])->name('permission.update');
    Route::delete('/permission/delete/{id}', [permissionController::class, 'destroy'])->name('permission.delete');






    Route::get('/roles', [RoleController::class, 'index'])->name("roles.home");
    Route::get('/role/add', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/{id}', [RoleController::class, 'edit'])->name('role.edit')->middleware('role:admin');
    Route::put('/role/update', [RoleController::class, 'update'])->name('role.update')->middleware('role:admin');
    Route::delete('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.delete')->middleware('role:super admin');


    Route::get('/role/{id}/permission', [RoleController::class, 'givePermission'])->name("role.give-permission")->middleware('role:super admin');
    Route::put('/role/{id}/permission', [RoleController::class, 'updatePermission'])->name("role.update-permission")->middleware('role:super admin');
});