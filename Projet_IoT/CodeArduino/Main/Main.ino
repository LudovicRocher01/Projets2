#include <Firebase.h>
#include <WiFi.h>
#include "DHTSensor.h"
#include "LightSensor.h"
#include "SoundSensor.h"
#include "LedsController.h"
#include "HeatingController.h"

// On initialise les paramètres WiFi et de connexion Firebase
#define FIREBASE_HOST "https://nestrack-iot-default-rtdb.europe-west1.firebasedatabase.app/"
#define FIREBASE_AUTH "4lgbbSJVmHzwlcNg9plwe1pSBHnC9p3doZ2hmxUs"
#define FIREBASE_API "AIzaSyB_oM0BFg9GcI10lwU5uIQsCL4z22ihQ18"

#define WIFI_SSID "IphoneLudo"
#define WIFI_PASSWORD "lulululu"

FirebaseData firebaseData;
FirebaseAuth firebaseAuth;
FirebaseConfig firebaseCfg;

// On initialise nos capteurs et controllers
DHTSensor dhtSensor(14);
LightSensor lightSensor(A2);
SoundSensor soundSensor(A4);
LedsController ledsController(10, A0);
HeatingController heatingController(15);

void setup() {
  Serial.begin(9600);
  // Connexion WiFi
  delay(1000);
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);

  Serial.print("Connexion au réseau");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }

  Serial.println("");
  Serial.println("Connexion réussie, adresse IP : ");
  Serial.println(WiFi.localIP());

  firebaseCfg.api_key = FIREBASE_API;
  firebaseCfg.database_url = FIREBASE_HOST;

// Connexion Firebase
  if (Firebase.signUp(&firebaseCfg, &firebaseAuth, "", "")) {
    Serial.println("Connexion à Firebase réussie");
  } else {
    Serial.print("Erreur de connexion à Firebase : ");
    Serial.printf("%s\n", firebaseCfg.signer.signupError.message.c_str());
  }

  Firebase.begin(&firebaseCfg, &firebaseAuth);
  Firebase.reconnectWiFi(true);

  dhtSensor.setup();
  ledsController.setup();
  heatingController.setup();
  soundSensor.setup();
}

void loop() {
  // Lecture de nos capteurs
  float temperature, humidity;
  int lightValue = lightSensor.read();
  dhtSensor.read(temperature, humidity);
  int soundValue = soundSensor.readSoundValue();

// On envoie nos données sur Firebase
  Firebase.setFloat(firebaseData, "ESP32data/TEMPERATURE", temperature);
  Firebase.setFloat(firebaseData, "ESP32data/HUMIDITY", humidity);
  Firebase.setFloat(firebaseData, "ESP32data/LIGHT", lightValue);
  Firebase.setFloat(firebaseData, "ESP32data/SOUND", soundValue);

// On vérifie si les controller doivent changer d'état
  bool ledState;
  Firebase.getBool(firebaseData, "ESP32leds");
  ledState = firebaseData.boolData();
  //Serial.println(ledState);
  ledsController.set(static_cast<bool>(ledState));

  bool heatingState;
  Firebase.getBool(firebaseData, "ESP32heating");
  heatingState = firebaseData.boolData();
  //Serial.println(heatingState);
  heatingController.set(static_cast<bool>(heatingState));

// On répète tout cela toutes les 5 secondes
  delay(5000);
}
