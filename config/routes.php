<?php

$routes->get('/', function() {
    RecordController::index();
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

$routes->get('/record', function() {
    RecordController::index();
});

$routes->post('/record', function(){
  RecordController::store();
});

$routes->get('/record/add', function(){
  RecordController::create();
});