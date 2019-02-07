#include <SoftwareSerial.h>



const int arduinoRXpin = 6;  //connect to blueSMIRF TX
const int arduinoTXpin = 7;  //connect to blueSMIRF RX


char chIn ;
char chOut;
char cr = 0x0D;
int potpin = 0;  // analog pin used to connect the potentiometer
int val;    // varia
bool s1=true;
bool s2, s3, s4=false;
SoftwareSerial smirf(arduinoRXpin, arduinoTXpin);

void setup(){
  Serial.begin(9600);
  Serial.println(F("Starting blueSmirf Tester." ) );

  pinMode(arduinoRXpin, INPUT);
  pinMode(arduinoTXpin, OUTPUT);
 

  smirf.begin(9600);
  smirf.listen();
 

}




void loop(){
  if(s1==true){
    int sensorValue = analogRead(A0);    
    Serial.println("M");
    Serial.println(sensorValue);
    smirf.println("M"); 
    smirf.println(400, DEC);
    s1=false;
    s2=true;
    s3=false;
    s4=false; 
  }
  else if(s2==true){
    int sensorValue = analogRead(A0);    
    Serial.println("H");
    Serial.println(sensorValue);
    smirf.println("H"); 
    smirf.println(300, DEC);
    s1=false;
    s2=false;
    s3=true;
    s4=false; 
  }
  else if(s3==true){
    int sensorValue = analogRead(A0);    
    Serial.println("T");
    Serial.println(sensorValue);
    smirf.println("T"); 
    smirf.println(200, DEC);
    s1=false;
    s2=false;
    s3=false;
    s4=true; 
  }
  else if(s4==true){
    int sensorValue = analogRead(A0);    
    Serial.println("L");
    Serial.println(sensorValue);
    smirf.println("L"); 
    smirf.println(100, DEC);
    s1=true;
    s2=false;
    s3=false;
    s4=false; 
  }

delay(1000);
}
