#include "HeatingController.h"
#include "Arduino.h"


HeatingController::HeatingController(int heatingPin) : heatingPin(heatingPin) {}

void HeatingController::setup() {
  pinMode(heatingPin, OUTPUT);
}

void HeatingController::set(bool state) {
  if (state) {
    digitalWrite(heatingPin, HIGH);
  } else {
    digitalWrite(heatingPin, LOW);
  }
}
