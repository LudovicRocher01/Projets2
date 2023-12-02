#ifndef SOUND_SENSOR_H
#define SOUND_SENSOR_H

#include <Arduino.h>

class SoundSensor {
public:
  SoundSensor(int soundPin);
  void setup();
  int readSoundValue();

private:
  int soundSensorPin;
};

#endif
