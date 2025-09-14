<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SavedItemController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BlockController;

Route::apiResource('users', UserController::class);
Route::apiResource('posts', PostController::class);
Route::apiResource('comments', CommentController::class);
Route::apiResource('likes', LikeController::class);
Route::apiResource('shares', ShareController::class);
Route::apiResource('media', MediaController::class);
Route::apiResource('saved-items', SavedItemController::class);
Route::apiResource('messages', MessageController::class);
Route::apiResource('notifications', NotificationController::class);
Route::apiResource('reports', ReportController::class);
Route::apiResource('blocks', BlockController::class);

