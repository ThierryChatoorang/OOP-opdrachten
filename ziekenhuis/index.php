<?php
// Date: 2025-11-07
// Author: Thierry

namespace Hospital;

require_once "Doctor.php";
require_once "Nurse.php";
require_once "Patient.php";
require_once "Appointment.php";

use Hospital\Doctor;
use Hospital\Nurse;
use Hospital\Patient;
use Hospital\Appointment;

Appointment::getAppointments(); // initialize

$doctor = new Doctor("Jan", "de Vries", 75);
$nurse  = new Nurse("Anna", "Bakker", 800, 20);

$patient1 = new Patient("Pieter", "Janssen");
$patient2 = new Patient("Sara", "Mulder");

$patient1->makeAppointment($doctor, "2025-11-07 09:00", "2025-11-07 10:30", $nurse);
$patient2->makeAppointment($doctor, "2025-11-07 11:00", "2025-11-07 12:00");

echo "Doctor salary: €" . $doctor->calculateSalary() . "<br>";
echo "Nurse salary: €" . $nurse->calculateSalary() . "<br><br>";

foreach (Appointment::getAppointments() as $appt) {
    echo "Appointment: " . $appt->getPatient()->getFirstName() .
         " with Doctor " . $appt->getDoctor()->getFirstName() . "<br>";
}

echo "<br>" . $patient1->getBalance();