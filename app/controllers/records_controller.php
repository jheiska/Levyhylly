<?php

class RecordController extends BaseController {

    public static function index() {
        $records = Record::all();
        View::make('record/index.html', array('records' => $records));
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

    public static function record_add() {
        View::make('record/add.html');
    }

    public static function seek() {
        $id = $_POST['id'];
        $record = record::find($id);
        Redirect::to('/record/' . $record->id);
    }

    public static function record_view() {
        View::make('suunnitelmat/record_view.html');
    }

    public static function record_edit() {
        View::make('suunnitelmat/record_edit.html');
    }

    public static function record_list() {
        View::make('suunnitelmat/record_list.html');
    }

    public static function record_find() {
        View::make('suunnitelmat/record_find.html');
    }

}
