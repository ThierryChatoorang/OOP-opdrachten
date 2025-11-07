<?php
// Date: 2025-11-07
// Author: Thierry

namespace Hospital;

require_once "Person.php";
require_once "Doctor.php";
require_once "Nurse.php";
require_once "Appointment.php";

class Patient extends Person
{
    private float $balance = 0;

    public function __construct(string $firstName, string $lastName, float $balance = 0)
    {
        parent::__construct($firstName, $lastName);
        $this->balance = $balance;
    }

    public function getRole(): string
    {
        return "Patient";
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    public function makeAppointment(Doctor $doctor, string $start, string $end, ?Nurse $nurse = null): Appointment
    {
        $appointment = new Appointment($this, $doctor, $start, $end, $nurse);
        Appointment::addAppointment($appointment);
        return $appointment;
    }
}
