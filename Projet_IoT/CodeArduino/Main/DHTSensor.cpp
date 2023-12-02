#include "DHTSensor.h"
#include "Arduino.h"


DHTSensor::DHTSensor(int dhtPin) : dht(dhtPin, DHT22) {}

void DHTSensor::setup() {
  dht.begin();
}

void DHTSensor::read(float& temperature, float& humidity) {
  temperature = dht.readTemperature();
  humidity = dht.readHumidity();
}
