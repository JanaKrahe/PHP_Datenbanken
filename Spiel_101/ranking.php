<?php
  /**
   *
   */
  class Ranking
  {

    private $rangListe = array(
      'spielerName' => array('Otto', 'Hans'),
      'zugSumme' => array(5, 6));

    function __construct()
    {
      # code...
    }

    /**
    * Fuellt das Array rangListe mit den Information aus der Datenbank
    *
    */
    public function ranglisteFuellen()
    {
      #neue Datenbank Verbindung
      $dbh = new PDO('mysql:host=localhost;dbname=?', 'root', '');
    }

    public function arrayAusgeben()
    {
      //Ausgabe soll im Styl:
      //    1...3
      //    2...4
      foreach ($this->rangListe as $v1) {
        foreach ($v1 as $v2) {
          echo "$v2\n";
        }
      }
      //oder Array als ganzes returnen und dann in HTML ausgeben
    }

    public function namensSpalteAusgeben()
    {
      $hArray = $this->rangListe[1];
      return $hArray;
    }

    public function zugSpalteAusgeben()
    {
      $hArray = $this->rangListe[1];
      return $hArray;
    }
  }

 ?>
