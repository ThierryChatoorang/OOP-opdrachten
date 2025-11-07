<?php
// Date: 2025-11-07
// Author: Thierry

namespace Hospital;

require_once "Patient.php";
require_once "Doctor.php";
require_once "Nurse.php";

class Appointment
{
    private Patient $patient;
    private Doctor $doctor;
    private ?Nurse $nurse;

    private \DateTime $start;
    private \DateTime $end;

    private static array $appointments = [];

    public function __construct(Patient $patient, Doctor $doctor, string $start, string $end, ?Nurse $nurse = null)
    {
        $this->patient = $patient;
        $this->doctor = $doctor;
        $this->nurse = $nurse;

        $this->start = new \DateTime($start);
        $this->end = new \DateTime($end);
    }

    public function getPatient(): Patient { return $this->patient; }
    public function getDoctor(): Doctor { return $this->doctor; }
    public function getNurse(): ?Nurse { return $this->nurse; }

    public function getDurationHours(): float
    {
        $seconds = $this->end->getTimestamp() - $this->start->getTimestamp();
        return round($seconds / 3600, 2);
    }

    public static function addAppointment(Appointment $appointment): void
    {
        self::$appointments[] = $appointment;
    }

    public static function getAppointments(): array
    {
        return self::$appointments;
    }
}
