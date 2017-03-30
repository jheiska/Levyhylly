<?php


class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        echo 'Tämä on etusivu!';
    }

    public static function sandbox() {
        $nightfall = record::find(1);
        $records = record::all();
        // Kint-luokan dump-metodi tulostaa muuttujan arvon
        Kint::dump($records);
        Kint::dump($nightfall);
    }

    

}
