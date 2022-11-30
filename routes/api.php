<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/cours", function () {
    return \App\Models\Cour::all();
});

Route::get('/cours/{id}', function ($id) {
    $cour = \App\Models\Cour::find($id);

    if ($cour) {
        return $cour;
    }

    return response("Task not found", 404);
});

Route::put('/cours/{courId}', function ($courId) {
    $cour = \App\Models\Cour::find($courId);

    $formData = request()->only(['nom', 'description', 'img', 'programme', 'year', 'date_debut','date_fin']);

    request()->validate([
        'nom'    => 'required',
        'description'  => 'required',
        'img' => 'required',
        'programme'    => 'required',
        'year'    => 'required',
        'date_debut'    => 'required',
        'date_fin'    => 'required'
    ]);

    $cour->update($formData);
});

Route::post('/cours', function () {
    request()->validate([
        'nom'    => 'required',
        'description'  => 'required',
        'img' => 'required',
        'programme'    => 'required',
        'year'    => 'required',
        'date_debut'    => 'required',
        'date_fin'    => 'required'
    ]);

    $data = request()->all();

    return \App\Models\Cour::create($data);

});

Route::delete('/cours/{courId}', function ($courId) {
    $cour = \App\Models\Cour::find($courId);

    if(!$cour) {
        return response("Not found", 404);
    }

    $cour->delete();
});