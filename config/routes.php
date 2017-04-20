<?php

$routes->get('/', function() {
    RecordController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/:id/record_edit', function($id) {
    RecordController::record_edit($id);
});

$routes->post('/:id/edit_save', function($id) {
    RecordController::edit_save($id);
});

$routes->post('/:id/record_destroy', function($id) {
    RecordController::record_destroy($id);
});

$routes->get('/record_list', function() {
    RecordController::record_list();
});

$routes->get('/record_find', function($id) {
    RecordController::record_find($id);
});

$routes->get('/record', function() {
    RecordController::index();
});

$routes->get('/record/add', function(){
  RecordController::record_add();
});

$routes->post('/record/store', function(){
  RecordController::store();
});

$routes->get('/record/:id', function($id){
    RecordController::record_view($id);
});
