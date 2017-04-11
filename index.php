<?php

// // 1 oder 0 bei 0 = aus bei 1= angezeigt
ini_set('display_errors', 1);

// //php
// // echo "Hallo Welt!\n";

// # header('X-Test: test');

// /* $a = 'testÄ ."\n";
//  */ echo $a;

// $b .= 'foobar';
// echo $b;

// var_dump($a);

// // ähnlich wie Hashmap
// var_dump($GLOBALS);
// // gibt man immer in [] aus
// var_dump($GLOBALS['a']);

// var_dump($GLOBALS['_GET']);
// var_dump($GET);

// // alles was über get und post rein kam
// var_dump($_REQUEST);
// var_dump($_GET, $_POST);


// foreach ($GLOBALS as $key => $value){
// 	echo $key .' => '. $value ."\n";
// }

// // aufruf der funktion egal wo
// test('aaa', 'bbb');
// // funkt nicht bei php7
// # test('ccc')

// //definiert globale funktieonen
// function test($a, $b){
// 	// wenn $b gesetzt ist dann
// 	if(!isset($b)){
// 		$b = $a;
// 	}
// 	echo $a ,' # '. $b ."\n";
// }

// $daten1 = ['a','b','foo' => 'bar','baz' => time()];
// $daten2 = array('c','d','e');
// $daten3 = array('f' => array('f1', 'f2','f3'));

// 'a' = 'a1234abc';

// # damit kann man dateien reinladen
// # datei wird immer wieder eingelesen
// # geht mit jedem beliebigen dateityp
// include '';
// # wird nur einmal eingelesen
// # wenn man eine klasse hat will man die nur einmal laden
// # lädt nur php dateien
require 'test.php';


// class A {
// 	public $allo = 'test';
// 	static $klasse;
	
// 	static function showHello(){
// 		echo 'Hallo Welt!';
// 		self::$klasse;
// 	}
	
// 	public function showHello2(){
// 		echo 'Hallo Welt 2!';
// 		$this->allo;
// 	}
// }

// A::showHello();
// A::$klasse;
// $a = new A;
// $a->showHello2();
// $a->allo;


$dbh = new PDO('mysql:host=localhost;dbname=phpprakt','root','');
// #nicht machen
// $res = $dbh->query('SELECT * FROM liste WHERE zahl = '. $_REQUEST['zahl']);
#machen
// $res = $dbh->query('SELECT * FROM liste WHERE zahl = '.$dbh->quote($_REQUEST['zahl']));
# oder so machen
$stmt = $dbh->prepare('SELECT * FROM liste WHERE zahl = ?');
$stmt->execute(array(10));


$tmt = $dbh->prepare('SELECT * FROM liste WHERE zahl = :zahl');
$tmt->execute(array(':zahl' => 10 ));


# alternativ fetchAll oder fetch 
# da wo jetzt $tmt steht kann dann auch von oben $res oder $stmt stehen
# quasi alles die gleichen abfragen nur anders umgesetzt
foreach ($tmt->fetchAll(PDO::FETCH_ASSOC) as $data){
	var_dump($data);
	echo $data['text'];
}

?>

<?php 
// echo date('l jS \of F Y h:i:s A');
?>



<?php 

// echo "<b> Hallo Welt </b>\n";
// $name = "Nils";
// echo "Mein Name ist ".$name." Reimers";
// echo $name;

// # ?vorname=Max&nachname=Meier in URL eingeben
// $vorname = $_GET['vorname'];
// $nachname = $_GET['nachname'];
// $mittelname = $_GET['mittelname'];
// echo "Hallo $vorname $mittelname $nachname";


// echo "Hallo \" Welt\"";
// ?>

