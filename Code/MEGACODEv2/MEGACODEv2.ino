#include <SoftwareSerial.h>

#include "DHT.h"

#define DHTPIN 9     // Digital pin connected to the DHT sensor


#define DHTTYPE DHT11   // DHT 11



DHT dht(DHTPIN, DHTTYPE);

const int arduinoRXpin = 6;  //connect to blueSMIRF TX
const int arduinoTXpin = 7;  //connect to blueSMIRF RX


char chIn ;
char chOut;
char cr = 0x0D;
int potpin = 0;  // analog pin used to connect the potentiometer
int val;    // varia
bool s1 = true;
bool s2, s3, s4 = false;
SoftwareSerial smirf(arduinoRXpin, arduinoTXpin);

void setup() {
  Serial.begin(9600);
  Serial.println(F("Starting blueSmirf Tester." ) );

  pinMode(arduinoRXpin, INPUT);
  pinMode(arduinoTXpin, OUTPUT);

  pinMode(A0, INPUT);
  pinMode(A1, INPUT);
  smirf.begin(9600);
  smirf.listen();
  
  dht.begin();

}




void loop() {

  float h = dht.readHumidity();
  // Read temperature as Celsius (the default)
  float t = dht.readTemperature();
  int m = analogRead(A0);
  int l = analogRead(A1);
  if (s1 == true) {
    Serial.println("M");
    Serial.println(String(m));
    smirf.print('M');
    smirf.print(String(m));
    s1 = false;
    s2 = true;
    s3 = false;
    s4 = false;
  }
  else if (s2 == true) {
    Serial.println("H");
    Serial.println(String(h));
    smirf.print('H');
    smirf.print(String(h));
    s1 = false;
    s2 = false;
    s3 = true;
    s4 = false;
  }
  else if (s3 == true) {
    Serial.println("T");
    Serial.println(String(t));
    smirf.print('T');
    smirf.print(String(t));
    s1 = false;
    s2 = false;
    s3 = false;
    s4 = true;
  }
  else if (s4 == true) {
    Serial.println("L");
    Serial.println(String(l));
    smirf.print('L');
    smirf.print(String(l));
    s1 = true;
    s2 = false;
    s3 = false;
    s4 = false;
   // smirf.print("NAder and aScott")
  }

  delay(1800000);
}
