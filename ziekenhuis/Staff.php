<?php
// Date: 2025-11-07
// Author: Thierry

namespace Hospital;

require_once "Person.php";

abstract class Staff extends Person
{
    private float $hourlyRate;

    public function __construct(string $firstName, string $lastName, float $hourlyRate)
    {
        parent::__construct($firstName, $lastName);
        $this->hourlyRate = $hourlyRate;
    }

    public function getHourlyRate(): float
    {
        return $this->hourlyRate;
    }

    public function setHourlyRate(float $rate): void
    {
        $this->hourlyRate = $rate;
    }

    abstract public function calculateSalary(): float;
}
