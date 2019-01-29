 #include <SoftwareSerial.h>
 
 SoftwareSerial mySerial(D3, D4); // RX, TX
 

void setup() {
  Serial.begin(9600);
  while (!Serial) { ; }
  mySerial.begin(9600);
}

void loop() {
  
  mySerial.println();
  if (mySerial.available()) {
    Serial.write(mySerial.read());
  }
  if (Serial.available()) {
    mySerial.write(Serial.read());
  }
}
