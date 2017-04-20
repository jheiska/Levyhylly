<?php

$routes->get('/', function() {
    RecordController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/record_view', function() {
    RecordController::record_view();
});

$routes->get('/record_edit', function() {
    RecordController::record_edit();
});

$routes->get('/record_list', function() {
    RecordController::record_list();
});

$routes->get('/record_find', function() {
    RecordController::record_find();
});

$routes->get('/record', function() {
    RecordController::index();
});

$routes->post('/record/add', function(){
  RecordController::add();
});

//$routes->get('/record/add', function(){
//  RecordController::create();
//});