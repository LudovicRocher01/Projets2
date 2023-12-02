#include "SoundSensor.h"

SoundSensor::SoundSensor(int soundPin) : soundSensorPin(soundPin) {}

void SoundSensor::setup() {
}

int SoundSensor::readSoundValue() {
  int soundValue = 0;
  for (int i = 0; i < 32; i++) {
    soundValue += analogRead(soundSensorPin);
  }
  soundValue >>= 5; 
  return soundValue;
}
