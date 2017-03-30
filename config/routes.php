<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/record_view', function() {
    HelloWorldController::record_view();
});

$routes->get('/record_edit', function() {
    HelloWorldController::record_edit();
});

$routes->get('/record_list', function() {
    HelloWorldController::record_list();
});

$routes->get('/record_find', function() {
    HelloWorldController::record_find();
});
