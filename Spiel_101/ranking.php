<?php
  /**
   *
   */
  class Ranking
  {

    private $rangListe = array('Otto', 5, 'Hans', 6);

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
      foreach ($this->rangListe as $v1) {
          echo "$v1\n";
      }
    }

    public function rankingAusgeben()
    {
      return $this->rangListe;
    }

  }

 ?>
