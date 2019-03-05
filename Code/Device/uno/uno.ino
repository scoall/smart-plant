#include <SoftwareSerial.h>



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


  smirf.begin(9600);
  smirf.listen();


}




void loop() {
  if (s1 == true) {
    int sensorValue = analogRead(A0);
    Serial.println("M");
    Serial.println(400);
    smirf.print('M');
    smirf.print(400, DEC);
    s1 = false;
    s2 = true;
    s3 = false;
    s4 = false;
  }
  else if (s2 == true) {
    int sensorValue = analogRead(A0);
    Serial.println("H");
    Serial.println(300);
    smirf.print('H');
    smirf.print(300, DEC);
    s1 = false;
    s2 = false;
    s3 = true;
    s4 = false;
  }
  else if (s3 == true) {
    int sensorValue = analogRead(A0);
    Serial.println("T");
    Serial.println(200);
    smirf.print('T');
    smirf.print(200, DEC);
    s1 = false;
    s2 = false;
    s3 = false;
    s4 = true;
  }
  else if (s4 == true) {
    int sensorValue = analogRead(A0);
    Serial.println("L");
    Serial.println(100);
    smirf.print('L');
    smirf.print(100, DEC);
    s1 = true;
    s2 = false;
    s3 = false;
    s4 = false;
   // smirf.print("NAder and aScott")
  }

  delay(1000);
}
