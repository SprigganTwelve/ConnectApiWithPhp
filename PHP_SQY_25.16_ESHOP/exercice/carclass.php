<?php
include("../config/dotenv.php");


/*
class Voiture
{

    private $brand;
    private $color;
    public $power = 100;
    public $speed = 50;

    const LEAVE_CART = "je sors de la voiture "; //we use 'const' in order to define a constant value in one class but no outside !


    protected $immat = "13245TheWorld@";


    static public $engine = "V8"; // static propertie

    function __construct($brand = "darcia", $color = "blue") //defaults values 
    {
        $this->brand = $brand;
        $this->color = $color;
    }


    public function get_brand(): string //you can precise the value that you expect
    {
        return $this->brand; // to catch the brand 
    }

    public function get_color() //to catch the color 
    {
        return $this->color;
    }

    public function accelerate()
    {
        $this->speed += 50;
        echo "La " . $this->brand . " " . $this->color . " roule à " . $this->speed . " km/h  <br/>";
    }

    public function slow()
    {
        $this->speed -= 50;
        echo "La " . $this->brand . " " . $this->color . " freine de -50km/h, sa vitèsse après freinage est " . $this->speed . " km/h <br/>";
    }

    static public function crash($voiture) //static method
    {
        return "notre voiture s'est crashée avec $voiture  <br/>";
    }


    protected function lightsOn() // it inherit the public property and method of Voiture
    {
        echo "j'allume lees feux de routes ! <br/>";
    }


}



class convertable extends Voiture
{

    public function roof()
    {
        echo "j'ouvre le toit de la voiture <br/>";
        echo $this->lightsOn(); // we can use a protected function indide the child's class but no outside
        //but you cannot use a private item whenever you want
    }
    public function showImmat()
    {
        echo $this->immat . "<br :>";
    }

}


$car = new Voiture();
$brand = $car->get_brand();
$color = $car->get_color();


echo " $brand  <br/> $color  <br/>";
$car->slow();
$car->accelerate();
echo Voiture::$engine . " <br/>";
echo Voiture::crash('hyundai') . " <br/>";
echo Voiture::crash($car->get_brand()) . " <br/>";

$cabriolet = new convertable("Toyota", 'Green');
$cabriolet->roof();
$cabriolet->slow();
$cabriolet->accelerate(); // the acces to a private item is invalable !
$cabriolet->showImmat();


*/

abstract class Voiture  // asbstract class is created , so you must set in a abstract method 


    // issue : we cannot instanteanous this !
{

    private $brand;
    private $color;
    public $power = 100;
    public $speed = 50;

    const LEAVE_CART = "je sors de la voiture "; //we use 'const' in order to define a constant value in one class but no outside !



    protected $immat = "13245TheWorld@";


    static public $engine = "V8"; // static propertie

    function __construct($brand = "darcia", $color = "blue") //defaults values 
    {
        $this->brand = $brand;
        $this->color = $color;
    }


    public function get_brand(): string //you can precise the value that you expect
    {
        return $this->brand; // to catch the brand 
    }

    public function get_color() //to catch the color 
    {
        return $this->color;
    }

    public function accelerate()
    {
        $this->speed += 50;
        echo "La " . $this->brand . " " . $this->color . " roule à " . $this->speed . " km/h  <br/>";
    }

    public function slow()
    {
        $this->speed -= 50;
        echo "La " . $this->brand . " " . $this->color . " freine de -50km/h, sa vitèsse après freinage est " . $this->speed . " km/h <br/>";
    }

    static public function crash($voiture) //static method
    {
        return "notre voiture s'est crashée avec $voiture  <br/>";
    }


    protected function lightsOn() // it inherit the public property and method of Voiture
    {
        echo "j'allume lees feux de routes ! <br/>";
    }

    abstract public function vidange(); // we declare the abstrct method we have not to define this . (compulsory) 


}



class Cabriolet extends Voiture
{
    public $accessories;

    function __construct($brand = 'darcia', $color = 'blue', $accessories = "null")
    {
        $this->accessories = $accessories;
        parent::__construct();
    }

    public function roof()
    {
        echo "j'ouvre le toit de la voiture <br/>";
        echo $this->lightsOn(); // we can use a protected function indide the child's class but no outside
        //but you cannot use a private item whenever you want
    }
    public function showImmat()
    {
        echo $this->immat . "<br :>";

    }
    public function vidange() // you have to define the abstract method into the child 
    {
        return "je fais ma vidange ce soir";
    }

}

class SUV
{
    private $height = 0;
    public function vidange()
    {
        return "Je fais ma vidange ce soir dans mon SUV ";
    }
    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight()
    {
        return $this->height;
    }
}


$cabriolet = new Cabriolet("Toyota", 'Green', 'shape element');
$cabriolet->roof();
$cabriolet->slow();
$cabriolet->accelerate(); // the acces to a private item is invalable !
$cabriolet->showImmat();
$cabriolet->vidange();






include('../config/dotenv.php');



class DB
{
    private $sgbd;
    private $host;
    private $dbname;
    private $user;
    private $password;
    private $port;

    private $pdo;

    private $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

    public function __construct($sgbd, $host, $user, $dbname, $password, $port)
    {
        $this->sgbd = $sgbd;
        $this->host = $host;
        $this->user = $user;
        $this->dbname = $dbname;
        $this->password = $password;
        $this->port = $port;
        $this->connect();
    }

    public function connect()
    {
        try {
            $dsn = "$this->sgbd:dbname=$this->dbname;host=$this->host:$this->port";
            $this->pdo = new PDO($dsn, $this->user, $this->password, $this->options);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "il y a une erreur :" . $e->getMessage();
        }

    }
    public function __destruct()
    {
        $this->disconnect();
    }
    public function disconnect()
    {
        try {
            $this->pdo = null;
        } catch (PDOException $e) {
            echo "il y a une erreur de déconnexion" . $e->getMessage();
        }
    }
}

$connexion = new DB($dbhost, $dbhost, $dbuser, $dbname, $dbpass, $port);