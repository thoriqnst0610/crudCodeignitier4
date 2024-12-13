<?php

namespace App\Libraries;

class MyLibrary
{
    protected $name;

    public function __construct($name = 'CodeIgniter')
    {
        $this->name = $name;
    }

    public function greet()
    {
        return 'Hello, ' . $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
