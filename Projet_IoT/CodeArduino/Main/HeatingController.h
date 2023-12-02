#ifndef HEATING_CONTROLLER_H
#define HEATING_CONTROLLER_H

class HeatingController {
public:
  HeatingController(int heatingPin);
  void setup();
  void set(bool state);

private:
  int heatingPin;
};

#endif
