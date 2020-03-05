<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    Route::get('/', 'WelcomeController@welcome')->name('welcome');
});

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => ['web', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'twostep', 'checkblocked']], function () {

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home',   'uses' => 'UserController@index']);

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@show',
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

    // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController', [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
    // Route to Linea and Brand
    Route::get('lineas-marcas', 'LineasMarcasController@index')->name('lineas_marcas');
    Route::get('challenge', 'DesafiosController@index')->name('challenge');
    Route::get('crear/Linea', 'LineasMarcasController@createLine')->name('create_line');
    Route::get('crear/Marca', 'LineasMarcasController@createBrand')->name('create_brand');
    Route::get('crear/pregunta-respuesta', 'PreguntasRespuestasController@createQuestionAnswer')->name('create_question_answer');
    Route::post('new/Linea', 'LineasMarcasController@storeLinea')->name('ruta_new_line');
    Route::post('new/Marca', 'LineasMarcasController@storeBrand')->name('ruta_new_brand');
    Route::get('brand/{id}/edit', 'LineasMarcasController@editBrand')->name('edit_brand');
    Route::get('line/{id}/edit', 'LineasMarcasController@editLine')->name('edit_line');
    Route::put('brand/update/{id}', 'LineasMarcasController@updateBrand')->name('update_brand');
    Route::put('line/update/{id}', 'LineasMarcasController@updateLine')->name('update_line');
    // Route to Questions
    Route::get('preguntas-respuestas', 'PreguntasRespuestasController@index')->name('preguntas_respuestas');
    Route::get('crear/Pregunta', 'PreguntasRespuestasController@createQuestion')->name('create_question');
    Route::post('new/Pregunta', 'PreguntasRespuestasController@storeQuestion')->name('ruta_new_question');
    Route::get('question/{id}', 'PreguntasRespuestasController@showQuestion')->name('show_question');
    Route::get('line/{id}', 'LineasMarcasController@showLine')->name('show_line');
    Route::get('brand/{id}', 'LineasMarcasController@showBrand')->name('show_brand');
    Route::get('question/{id}/edit', 'PreguntasRespuestasController@edit')->name('edit_question');
    Route::put('question/update/{id}', 'PreguntasRespuestasController@updateQuestion')->name('update_question');
    Route::get('brandByLinea/{id}', 'DesafiosController@byLinea');


});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {
    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'UsersManagementController@search')->name('search-users');

    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    Route::resource('question', 'PreguntasRespuestasController', [
        'names' => [
            'destroy' => 'question.destroy',
        ],
    ]);

    Route::delete('line/{id}', 'LineasMarcasController@destroy')->name('line_destroy');

    Route::delete('brand/{id}', 'LineasMarcasController@destroyBrand')->name('brand_destroy');


    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('routes', 'AdminDetailsController@listRoutes');
    Route::get('active-users', 'AdminDetailsController@activeUsers');
});

Route::redirect('/php', '/phpinfo', 301);

