<?php

class Record extends BaseModel {

    public $id, $name, $artist, $year;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Record');
        $query->execute();
        $rows = $query->fetchAll();
        $records = array();
        
        foreach($rows as $row){
            $records[] = new Record(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'artist' => $row['artist'],
                'year' => $row['year']               
                ));
        }
        
        return $records;
        
    }
    
    public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Record WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
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
  
  public function save(){
    // Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
    $query = DB::connection()->prepare('INSERT INTO Record (name, artist, year) VALUES (:name, :artist, :year) RETURNING id');
    // Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
    $query->execute(array('name' => $this->name, 'artist' => $this->artist, 'year' => $this->year));
    // Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
    $row = $query->fetch();
    // Asetetaan lisätyn rivin id-sarakkeen arvo oliomme id-attribuutin arvoksi
    $this->id = $row['id'];
  }

}
