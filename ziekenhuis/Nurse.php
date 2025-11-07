<?php
// Date: 2025-11-07
// Author: Thierry

namespace Hospital;

require_once "Staff.php";
require_once "Appointment.php";

class Nurse extends Staff
{
    private float $weeklySalary;

    public function __construct(string $firstName, string $lastName, float $weeklySalary, float $hourlyRate)
    {
        parent::__construct($firstName, $lastName, $hourlyRate);
        $this->weeklySalary = $weeklySalary;
    }

    public function getRole(): string
    {
        return "Nurse";
    }

    public function calculateSalary(): float
    {
        $bonusHours = 0;

        foreach (Appointment::getAppointments() as $appt) {
            if ($appt->getNurse() === $this) {
                $bonusHours += $appt->getDurationHours();
            }
        }

        return $this->weeklySalary + ($bonusHours * $this->getHourlyRate());
    }
}
