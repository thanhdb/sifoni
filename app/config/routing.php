<?php

return array(
    '/' => array(
        '/' => 'HomeController:index:home::get',
        '/hello/{name}' => 'HomeController:hello:hello_person:name=world',
        '/test' => 'HomeController:test:test_post::get',
        '/login.html' => 'UserController:index:login::get',
        '/register.html' => 'UserController:register:register::get',
        '/user-detail.html' => 'UserController:userinfo:userinfo::get',
    ),
    '/admin' => array(
        '/' => 'admin\AdminController:index:admin::get',
        '/home.html'=>'admin\AdminController:home:adminhome::get',
        '/login.html'=>'admin\AuthController:index:loginadmin::post',
        '/logout.html'=>'admin\AuthController:logout:logoutadmin::post',
        '/category.html'=>'admin\CategoryController:index:list_category::post',
    )
);