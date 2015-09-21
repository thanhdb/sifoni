<?php

return array(
    '/' => array(
        '/' => 'HomeController:index:home::get',
        '/store' => 'StoreController:index:store::get',
        // '/store/detail/{id}' => 'StoreController:detail:detail_product::id',
        '/store/{slug}' => 'StoreController:detail:detail_product::slug',
        '/store/cart' =>'StoreController:cart:cart::post',
        '/store/cart/delete' => 'StoreController:delete:delete_cart::post',
        '/store/payment' => 'StoreController:payment:payment::post',

        '/post/show/{id}' => 'PostController:show:show_post::id',

        '/auth/login' => 'AuthController:login:loginuser::post',
        '/auth/logout' => 'AuthController:logout:logoutuser::get',
        '/auth/register' => 'AuthController:register:register::post'
        // '/hello/{name}' => 'HomeController:hello:hello_person:name=world',
        // '/test' => 'HomeController:test:test_post::get',
        // '/login.html' => 'UserController:index:login::get',
        // '/register.html' => 'UserController:register:register::get',
        // '/user-detail.html' => 'UserController:userinfo:userinfo::get',
    ),
    '/admin' => array(
        '/' => 'admin\AdminController:index:admin::get',
        '/home.html'=>'admin\AdminController:home:adminhome::get',
        '/login.html'=>'admin\AuthController:index:loginadmin::post',
        '/logout.html'=>'admin\AuthController:logout:logoutadmin::post',

        '/user' => 'admin\AdminController:user:user_manager::post',
        '/user/delete/{id}' => 'admin\AdminController:userDel:delete_user::id',

        '/post' => 'admin\AdminController:post:post_manager::post',
        '/post/delete/{id}' => 'admin\AdminController:postDel:delete_post::id',
        '/post/add' => 'admin\AdminController:postAdd:add_post::post'
        // '/category.html'=>'admin\CategoryController:index:list_category::post',
    )
);