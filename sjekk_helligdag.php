<?php
function erIkkeHelligdag($dagMnd) { // Til tross for at 24 og 31 strengt tatt ikke er fulle helligdager er senteret stengt.
  // Eksempelbruk av funksjon: erIkkeHelligdag("25-12");
  $fasteHelligdager = array("01-01", "01-05", "17-05", "24-12", "25-12", "26-12", "31-12");
  $aar = date("Y"); // Nåværende år
  $tolvTimer = (12*60*60); // Tolv timer i sekunder
  $etDogn = (24*60*60); // Ett døgn i sekunder
  $enUke = (7*24*60*60); // En uke i sekunder
  $forstePaskedagTS = easter_date($aar) + $tolvTimer; // Midt på dagen 1. påskedag
  $langFredag = date("d-m", ($forstePaskedagTS - (2 * $etDogn)));
  $skjerTorsdag = date("d-m", ($forstePaskedagTS - (3 * $etDogn)));
  $andrePaaskedag = date("d-m", ($forstePaskedagTS + $etDogn));
  $krHimmelfartsdag = date("d-m", ($forstePaskedagTS + (4 * $etDogn) + ($enUke * 5)));
  // Første PD. er søndag, + 4*24 når påfølgende torsdag, ganger 5 da kr.fartsdag er 6. torsdag etter 1. påskedag
  $andrePinsedag = date("d-m", (($forstePaskedagTS + $etDogn) + ($enUke * 6)));
  $bevegeligeHelligdager = array();
  $helligdager = array();
  array_push($bevegeligeHelligdager, $krHimmelfartsdag, $skjerTorsdag, $langFredag, $andrePinsedag);
  $helligdager = array_merge($bevegeligeHelligdager, $fasteHelligdager);
  foreach ($helligdager as $dag) {
    if ($dag == $dagMnd) {
      return false;
    }
  }
  return true; // Returnerer true hvis dagen ikke er helligdag.
} // Avslutt funksjonsdeklarering
?>
