 #include <SoftwareSerial.h>
 
 SoftwareSerial mySerial(7, 8); // RX, TX
 

void setup() {
  Serial.begin(115200);
  while (!Serial) { ; }
  mySerial.begin(115200);
}

void loop() {
  int sensorValue = analogRead(A0);
  if (sensorValue!=analogRead(A0)){
  Serial.println(sensorValue);
  }
  mySerial.println();
  if (mySerial.available()) {
    Serial.write(mySerial.read());
  }
  if (Serial.available()) {
    mySerial.write(Serial.read());
  }
}
