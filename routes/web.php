<?php

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
    
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {
    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::post('search-users', 'UsersManagementController@search')->name('search-users');

    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    
    Route::get('active-users', 'AdminDetailsController@activeUsers');

    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('users', 'UsersManagementController@index')->name('users');

    Route::get('routes', 'AdminDetailsController@listRoutes');
});

Route::redirect('/php', '/phpinfo', 301);


//Rutas pata gestion de lineas, marcas y desafios
Route::middleware(['auth'])->group(function(){

    //Rutas pata gestion de lineas y narcas

    Route::get('lineas-marcas', 'LineasMarcasController@index')->name('lineas_marcas')->middleware('permission:view.lines');

    //Exclusivo de lineas

    Route::delete('line/{id}', 'LineasMarcasController@destroy')->name('line_destroy');

    Route::get('crear/Linea', 'LineasMarcasController@createLine')->name('create_line')->middleware('permission:view.create.line');

    Route::post('new/Linea', 'LineasMarcasController@storeLinea')->name('ruta_new_line')->middleware('permission:create.line');

    Route::get('line/{id}/edit', 'LineasMarcasController@editLine')->name('edit_line')->middleware('permission:view.edit.line');

    Route::put('line/update/{id}', 'LineasMarcasController@updateLine')->name('update_line')->middleware('permission:edit.line');

    Route::get('line/{id}', 'LineasMarcasController@showLine')->name('show_line')->middleware('permission:detail.line');

    //Exclusivo marcas

    Route::delete('brand/{id}', 'LineasMarcasController@destroyBrand')->name('brand_destroy');

    Route::get('crear/Marca', 'LineasMarcasController@createBrand')->name('create_brand')->middleware('permission:view.create.brand');

    Route::put('brand/update/{id}', 'LineasMarcasController@updateBrand')->name('update_brand')->middleware('permission:edit.brand');

    Route::post('new/Marca', 'LineasMarcasController@storeBrand')->name('ruta_new_brand')->middleware('permission:create.brand');

    Route::get('brand/{id}/edit', 'LineasMarcasController@editBrand')->name('edit_brand')->middleware('permission:view.edit.brand');

    Route::get('brand/{id}', 'LineasMarcasController@showBrand')->name('show_brand')->middleware('permission:detail.brand');

    //Rutas para gestion de preguntas y respuestas

    Route::get('preguntas-respuestas', 'PreguntasRespuestasController@index')->name('preguntas_respuestas');

    Route::get('crear/Pregunta', 'PreguntasRespuestasController@createQuestion')->name('create_question')->middleware('permission:view.create.question');

    Route::post('new/Pregunta', 'PreguntasRespuestasController@storeQuestion')->name('ruta_new_question')->middleware('permission:create.question');

    Route::get('question/{id}', 'PreguntasRespuestasController@showQuestion')->name('show_question')->middleware('permission:detail.question');

    Route::get('question/{id}/edit', 'PreguntasRespuestasController@edit')->name('edit_question')->middleware('permission:view.edit.question');

    Route::put('question/update/{id}', 'PreguntasRespuestasController@updateQuestion')->name('update_question')->middleware('permission:edit.question');

    //Exclusivo Desafios 

    Route::get('challenge', 'DesafiosController@index')->name('challenge');

    Route::post('crear/Desafio', 'DesafiosController@storeChallenge')->name('create_challenge');

    Route::get('challenge-list', 'DesafiosController@listChallenge')->name('challenge_list');

    Route::get('game/{id}', 'DesafiosController@ruleta')->name('game');

     Route::get('game/{id}/edit', 'DesafiosController@editChallenge')->name('edit_challenge');

    Route::put('gane/update/{id}', 'DesafiosController@updateChallenge')->name('update_challenge');

    Route::get('prueba/{id}', 'DesafiosController@prueba')->name('prueba');

    Route::get('answer/{id}/{challenge}', 'DesafiosController@anwers')->name('answers');

    Route::get('question-game/{id}/{challenge}', 'DesafiosController@questionGame')->name('question_game');

    Route::get('markAsRead', function(){
        Auth()->user()->unreadNotifications->markAsRead();
    });
});

