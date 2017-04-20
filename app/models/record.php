<?php

class Record extends BaseModel {

    public $id, $name, $artist, $year;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name_not_empty', 'validate_year');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Record');
        $query->execute();
        $rows = $query->fetchAll();
        $records = array();

        foreach ($rows as $row) {
            $records[] = new Record(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'artist' => $row['artist'],
                'year' => $row['year']
            ));
        }

        return $records;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Record WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $record[] = new Record(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'artist' => $row['artist'],
                'year' => $row['year']
            ));

            return $record;
        }

        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Record (name, artist, year) VALUES (:name, :artist, :year) RETURNING id');
        $query->execute(array('name' => $this->name, 'artist' => $this->artist, 'year' => $this->year));
        $row = $query->fetch();
        
        Kint::dump($row);
        $this->id = $row['id'];
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Record SET name = :name, artist = :artist, year = :year WHERE id = :id RETURNING id');
        $query->execute(array('id' => $this->id, 'name' => $this->name, 'artist' => $this->artist, 'year' => $this->year));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Record WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

}
