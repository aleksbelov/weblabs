<?php

class Location {
    function display(){
        echo "Location";
    }
}

class Aquarium extends Location {
    function display()
    {
        echo "Aquarium";
    }
}

class MeshAviary extends Animal {
    function display()
    {
        echo "MeshAviary";
    }
}

class OpenAviary extends Animal {
    function display()
    {
        echo "OpenAviary";
    }
}

class InfraRedAviary extends Animal {
    function display()
    {
        echo "InfraRedAviary";
    }
}

class Animal {
    public $weight;
    public $age;
    public $location;
    public $me = 'Animal';
    public function move(){
        echo 'move';
    }

    public function hello(){
        echo 'I am ' . $this->me . ' in ' . $this->location.display();
    }
}

// водоплавающие
class Waterfowl extends Animal {
    public $me = 'Waterfowl';
    public function move()
    {
        $this->location = new Aquarium();
    }
}

// пернатые
class Feathered extends Animal {
    public $me = 'Feathered';
    public function move()
    {
        $this->location = new MeshAviary();
    }
}

// копытные
class Ungulates extends Animal {
    public $me = 'Ungulates';
    public function move()
    {
        $this->location = new OpenAviary();
    }}

class CoolBlooded extends Animal {
    public function move()
    {
        $this->location = new InfraRedAviary();
    }
}