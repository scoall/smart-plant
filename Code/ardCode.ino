#include <SoftwareSerial.h>
#include "Arduino.h"
#include "DHT.h"
#include <TM1638.h>

#define DHTPIN 9     // Digital pin connected to the DHT sensor
#define DHTTYPE DHT11   // DHT 11
DHT dht(DHTPIN, DHTTYPE);

const int arduinoRXpin = 6;  //connect to blueSMIRF TX
const int arduinoTXpin = 7;  //connect to blueSMIRF RX

// define a module on data pin 8, clock pin 9 and strobe pin 10
TM1638 module(12, 8, 10);

byte moistureSensorPin = A0;
byte moistureSensorVCC = 5;
byte buttons;

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
  pinMode(moistureSensorVCC, OUTPUT);
  digitalWrite(moistureSensorVCC, LOW);

}

int readMoistureSensor()
{
  digitalWrite(moistureSensorVCC, HIGH);
  //delay(500);
  int value = analogRead(moistureSensorPin);
  digitalWrite(moistureSensorVCC, LOW);
  return 1023 - value;
}


void loop() {

  buttons=module.getButtons();
  
  float h = dht.readHumidity();
  // Read temperature as Celsius (the default)
  float t = dht.readTemperature();
  int m = analogRead(A0);
  //int mo = readMoistureSensor();
  String waterMe;
  
  int l = analogRead(A1);
  float li = l;
  li = li / 10;

  String tempString;
  String humString;
  String moistString;
  String lightString;
  tempString = String(t);
  humString = String(h);
  moistString = String(m);
  lightString = String(li);
  
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

delay(1000);

  if(buttons==1)
  {
  module.setDisplayToString("t "+tempString);
  }
  if(buttons==2)
  {
    module.setDisplayToString("h "+humString);
  }
  if(buttons==4)
  {
    module.setDisplayToString("l "+lightString);
  }
   if(buttons==8)
  {
    if (m >= 600)
  {
    waterMe = "H2O PLS";
  }
  else if (m < 600)
  {
    waterMe = "NO H2O  ";
  }
    module.setDisplayToString(waterMe);
  }
 
}
