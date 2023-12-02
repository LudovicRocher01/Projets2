#include "LightSensor.h"
#include "Arduino.h"


LightSensor::LightSensor(int lightPin) : lightSensorPin(lightPin) {}

void LightSensor::setup() {
}

int LightSensor::read() {
  return analogRead(lightSensorPin);
}
