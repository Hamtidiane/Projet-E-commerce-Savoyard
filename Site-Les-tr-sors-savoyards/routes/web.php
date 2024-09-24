<?php

// Routes pour le login
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
    use App\Http\Controllers\CategoryController;

use App\Http\Controllers\View\ProductViewController;
use App\Http\Controllers\View\UserViewController;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::prefix('carts')->group(function () {
        Route::get('/', [CartController::class, 'index']);
        Route::get('/{id}', [CartController::class, 'show']);
        Route::post('/', [CartController::class, 'store']);
        Route::put('/{id}', [CartController::class, 'update']);
        Route::delete('/{id}', [CartController::class, 'destroy']);
    });

// Routes pour les utilisateurs
    Route::prefix('users')->group(function () {
        Route::get('/', [UserViewController::class, 'index'])->name('users.index');
        Route::get('/create', [UserViewController::class, 'create'])->name('users.create');
        Route::get('/{user}/edit', [UserViewController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserViewController::class, 'update'])->name('users.update');
        Route::post('/', [UserViewController::class, 'store'])->name('users.store');
        Route::get('/{user}', [UserViewController::class, 'show'])->name('users.show');
        Route::delete('/{user}', [UserViewController::class, 'destroy'])->name('users.destroy');
    });
    //->Middleware('auth:sanctum')

// Routes pour les produits
    route::prefix('/products')->group(function () {
        Route::get('/', [ProductViewController::class, 'index']);
        Route::get('/{id}', [ProductViewController::class, 'ShowProduits']);
        Route::post('/', [ProductViewController::class, 'products']);
        Route::put('/{id}', [ProductViewController::class, 'update']);
        Route::delete('/{id}', [ProductViewController::class, 'destroy']);
    });

// Routes pour les catégories
    Route::prefix('/categorie')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/{id}', [CategoryController::class, 'showCategorie']);
        Route::post('/', [CategoryController::class, 'create']);
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'delete']);
    });

// Routes pour les paniers
    Route::resource('carts', CartController::class);

// Routes pour les commandes
    Route::prefix('/orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('/{id}', [OrderController::class, 'show']);
        Route::post('/', [OrderController::class, 'create']);
        Route::put('/{id}', [OrderController::class, 'update']);
        Route::delete('/{id}', [OrderController::class, 'destroy']);
    });

    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'doLogin']);
    Route::get('/register', [AuthController::class, 'register']);




// Route pour afficher le formulaire de création d'utilisateur
    Route::get('/users/create', function () {
        return view('users.create');
    })->name('users.create');
// Route pour traiter la soumission du formulaire
    Route::post('/users', [AuthController::class, 'store'])->name('users.store');
