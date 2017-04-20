<?php

class RecordController extends BaseController {

    public static function index() {
        $records = Record::all();
        View::make('record/index.html', array('records' => $records));
    }

    public static function record_add() {
        View::make('record/add.html');
    }

    public static function store() {
        $params = $_POST;

        $attributes = array(
            'name' => $params['name'],
            'artist' => $params['artist'],
            'year' => $params['year']
        );

        $record = new Record($attributes);
        $errors = $record->errors();

        if (count($errors) == 0) {
            $record->save();

            Redirect::to('/record/' . $record->id, array('message' => 'Record information added.'));
        } else {
            View::make('record/add.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function seek() {
        $id = $_POST['id'];
        $record = record::find($id);
        Redirect::to('/record/' . $record->id);
    }

    public static function record_view($id) {
        $record = Record::find($id);
        View::make('suunnitelmat/record_view.html', array('attributes' => $record));
    }

    public static function record_edit($id) {
        $record = Record::find($id);
        View::make('suunnitelmat/record_edit.html', array('attributes' => $record));
    }

    public static function edit_save($id) {
        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'name' => $params['name'],
            'artist' => $params['artist'],
            'year' => $params['year']
        );

        $record = new Record($attributes);
        $errors = $record->errors();

        if (count($errors) > 0) {
            View::make('record/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $record->update();            
            Redirect::to('/record/' . $record->id, array('message' => 'Record information updated.'));
                       
        }
    }
    
    public static function record_destroy($id){
        $record = new Record(array('id' => $id));
        $record->destroy();
        Redirect::to('/records', array('message' => 'Record information removed from database.'));
    }

    public static function record_list() {
        View::make('suunnitelmat/record_list.html');
    }

    public static function record_find() {
        View::make('suunnitelmat/record_find.html');
    }

}
