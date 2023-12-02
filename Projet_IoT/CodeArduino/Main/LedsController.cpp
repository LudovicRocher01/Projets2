#include "LedsController.h"
#include "Arduino.h"


LedsController::LedsController(int numPixels, int ledPin) : pixels(numPixels, ledPin, NEO_GRB + NEO_KHZ800) {}

void LedsController::setup() {
  pixels.begin();
  pixels.setBrightness(255);
}

void LedsController::set(bool state) {
  if (state) {
    // On allume les LEDs
    uint32_t white = pixels.Color(255, 255, 255);
    for (int i = 0; i < pixels.numPixels(); i++) {
      pixels.setPixelColor(i, white);
    }
    pixels.show();
  } else {
    // On éteint les LEDs
    for (int i = 0; i < pixels.numPixels(); i++) {
      pixels.setPixelColor(i, pixels.Color(0, 0, 0));
    }
    pixels.show();
  }
}
