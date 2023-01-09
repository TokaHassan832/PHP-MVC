<?php
$router->get('','PagesController@Home');
$router->get('about','PagesController@about');
$router->get('contact','PagesController@contact');
$router->get('users','UsersController@index');
$router->post('users','UsersController@store');

