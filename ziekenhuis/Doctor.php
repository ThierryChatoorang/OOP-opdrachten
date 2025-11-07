<?php
// Date: 2025-11-07
// Author: Thierry

namespace Hospital;

require_once "Staff.php";
require_once "Appointment.php";

class Doctor extends Staff
{
    public function getRole(): string
    {
        return "Doctor";
    }

    public function calculateSalary(): float
    {
        $hours = 0;

        foreach (Appointment::getAppointments() as $appt) {
            if ($appt->getDoctor() === $this) {
                $hours += $appt->getDurationHours();
            }
        }

        return $hours * $this->getHourlyRate();
    }
}
