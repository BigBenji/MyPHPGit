<?php
class Zoo
{
    private $_animaux = Array();
    function Montrer()
    {
        echo "<h2>Les animaux dans le zoo:</h2>";
        foreach ($this->_animaux as $animal)
        {
            echo "<a href='?action=parler&animal=" . get_class($animal) . "'>" . get_class($animal) . "</a><br />" ;
        }
    }
    public function Animaux()
    {
        return $_animaux;
    }
    public function AjouterAnimal($animal)
    {
        if(get_class($animal) != "Chat" && get_class($animal) != "Chien" && get_class($animal) != "Koala")
        {
            throw new Exception("$animal n'est pas un type d'animal autorisé");
        }
        $this->_animaux[] = $animal;
    }
    function __construct()
    {
        $this->_animaux["Chat"] = new Chat("Blanc");
        $this->_animaux["Chien"] = new Chien("Marron");
        $this->_animaux["Koala"] = new Koala("Gris");
    }
}
class Animal
{
    private $_couleur;
    function Parler()
    {
        return "Je dis : bien!";
    }
    function __construct($couleur)
    {
        $this->_couleur = $couleur;
    }
}
class Chat extends Animal
{
    function Parler()
    {
        return "Miaou";
    }

class Chien extends Animal
{
    function Parler()
    {
        return "Wouf";
    }
}
class Koala extends Animal
{
    function Parler()
    {
        return "Bonne journée monsieur";
    }
}
$zoo = new Zoo();
if (isset($_REQUEST['action']))
{
    $animal = $zoo->_animaux[$_REQUEST['animal']];
    echo "Le " . get_class($animal) . " ". $animal->_couleur. " dit '" . $animal->Parler() . "'";
}
$zoo->Montrer();
?>