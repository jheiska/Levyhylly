<?php

class RecordController extends BaseController{
    public static function index(){
        $records = Record::all();
        View::make('record/index.html', array('records' => $records));
    }    

      public static function store(){    
    //    $params = $_POST;  
        $record = new Record(array(
        'name' => $_POST['name'],
        'artist' => $_POST['artist'],
        'year' => $_POST['year']        
        ));

    // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
        $record->save();
    
        Redirect::to('/record/' . $game->id, array('message' => 'Record information added.'));
  }

}