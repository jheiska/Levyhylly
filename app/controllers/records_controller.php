<?php

class RecordController extends BaseController{
    public static function index(){
        $records = Record::all();
        View::make('record/index.html', array('records' => $records));
    }    
    
}