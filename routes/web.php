<?php

// 前端开放路由
Route::group([
    'namespace' => 'Frontend',
], function () {
    Route::get('/address-data', 'AddressController@getAddressData');

    Route::post('/login', 'AuthController@login');
    Route::get('/login', function () {
        return view('pc.pages.auth.Login');
    });
    Route::post('/register', 'AuthController@register');
    Route::get('/register', function () {
        return view('pc.pages.auth.Register');
    });

    Route::post('/send-code', 'AuthController@sendCode');

    Route::get('/retrieve-password', function () {
        return view('pc.pages.auth.RetrievePassword');
    });
    Route::post('/retrieve-password', 'AuthController@retrievePassword');

    Route::get('/', 'IndexController@homePage');
    Route::get('/decorate', 'IndexController@decoratePage');
    Route::get('/construct', 'IndexController@constructPage');
    Route::get('/mall', 'IndexController@mallPage');
    Route::get('/about', 'AboutController@aboutPage');

    // 品牌展示
    Route::get('/brand-display', 'IndexController@brandPage');

    Route::get('/house-hot', 'HouseController@houseHotList');
    Route::get('/house-product', 'HouseController@houseProductList');
    Route::get('/house-case', 'HouseController@houseCaseList');
    Route::get('/house-construct', 'HouseController@houseConstructList');
    Route::get('/house/{type}/{id}', 'HouseController@houseDetail');
    Route::post('/house-order', 'HouseController@houseOrder');

    Route::get('/mall-goods', 'MallController@MallGoodsList');
    Route::get('/mall-material', 'MallController@MallMaterialList');


    Route::get('/article-list', 'ArticleController@articleList');
    Route::get('/article/{id}', 'ArticleController@articleDetail');
    Route::get('/brand/{id}', 'ArticleController@brandDetail');
    Route::get('/article_2/{id}', 'ArticleController@articleDetail_2');


    Route::get('/question', 'QuestionController@questionPage');   // 提问题
    Route::get('/question/{id}', 'QuestionController@questionDetail');    // 问题详情
    Route::post('/question', 'QuestionController@submitQuestion');    // 提交问题

    Route::post('/free-apply', 'QuestionController@freeApply');    // 提交问题
});

// 前端需要登陆验证路由
Route::group([
    'middleware' => 'frontend',
    'namespace' => 'Frontend',
], function () {
    Route::post('/test', 'Test@test');
    Route::get('/test', 'Test@test');

    // 用户信息
    Route::get('/user', 'UserController@userInfo');
    Route::post('/user', 'UserController@updateUser'); // 修改资料
    Route::post('/user-avatar', 'UserController@updateUserAvatar'); // 修改头像
    Route::get('/user/edit', 'UserController@userEdit');
    Route::get('/user/decorate', 'UserController@userDecorate');
    Route::post('/delete-decorate', 'UserController@deleteDecorate');

    Route::post('/logout', 'AuthController@logout');
});

Route::get('/admin', function () {
    return redirect('http://webadmin.yijia-app.com/admin/login/index.html');
});