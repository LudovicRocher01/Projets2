#ifndef LIGHT_SENSOR_H
#define LIGHT_SENSOR_H

class LightSensor {
public:
  LightSensor(int lightPin);
  void setup();
  int read();

private:
  int lightSensorPin;
};

#endif
