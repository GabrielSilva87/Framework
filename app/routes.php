<?php

use App\Routes;

Routes::add('GET', '/', 'HomeController@index');
Routes::add('GET', '/about', 'AboutController@index');
Routes::add('POST', '/contact', 'ContactController@store');
