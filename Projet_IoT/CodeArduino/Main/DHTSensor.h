#ifndef DHT_SENSOR_H
#define DHT_SENSOR_H

#include <DHT.h>

class DHTSensor {
public:
  DHTSensor(int dhtPin);
  void setup();
  void read(float& temperature, float& humidity);

private:
  DHT dht;
};

#endif
