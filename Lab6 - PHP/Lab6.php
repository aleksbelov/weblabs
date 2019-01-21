<?php

abstract class Location {
    abstract public function name();
}

class Aquarium extends Location {
    public function name() {
        return self::class;
    }
}

class MeshAviary extends Location {
    public function name() {
        return self::class;
    }
}

class OpenAviary extends Location {
    public function name() {
        return self::class;
    }
}

class InfraRedAviary extends Location {
    public function name() {
        return self::class;
    }
}

abstract class Animal {
    public $weight;
    public $age;
    public $location;

    abstract public function name();
    abstract public function move();

    public function hello(){
        echo "I am " . $this->name() . ' in ' . $this->location->name() . "\n";
    }
}

// водоплавающие
class Waterfowl extends Animal {
    public function name() {
        return self::class;
    }
    public function move()
    {
        $this->location = new Aquarium();
    }
}

// пернатые
class Feathered extends Animal {
    public function name() {
        return self::class;
    }
    public function move()
    {
        $this->location = new MeshAviary();
    }
}

// копытные
class Ungulate extends Animal {
    public function name() {
        return self::class;
    }
    public function move()
    {
        $this->location = new OpenAviary();
    }}

class CoolBlooded extends Animal {
    public function name() {
        return self::class;
    }
    public function move()
    {
        $this->location = new InfraRedAviary();
    }
}


$animals_classnames = ['Waterfowl', 'Feathered', 'Ungulate', 'CoolBlooded'];
$locations_classnames = ['Aquarium', 'MeshAviary', 'OpenAviary', 'InfraRedAviary'];

$number_of_animals = 10;

$animals = array();

foreach(range(1, $number_of_animals) as $n) {
    $classname = $animals_classnames[rand(0, 3)];
    $animals[] = new $classname();
}

foreach($animals as $a) {
    $a->move();
    echo $a->hello();
}