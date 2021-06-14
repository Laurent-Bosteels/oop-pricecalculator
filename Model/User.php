<?php
declare(strict_types=1);

// What are the values of the properties?
class User
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }
}