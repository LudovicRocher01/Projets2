#ifndef LEDS_CONTROLLER_H
#define LEDS_CONTROLLER_H

#include <Adafruit_NeoPixel.h>

class LedsController {
public:
  LedsController(int numPixels, int ledPin);
  void setup();
  void set(bool state);

private:
  Adafruit_NeoPixel pixels;
};

#endif
