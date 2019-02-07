#include <SoftwareSerial.h>
 SoftwareSerial mySerial(10, 11); // RX, TX
void setup() {
  // Open serial communications and wait for port to open:
  Serial.begin(115200);
  mySerial.begin(115200);
  Serial.println("Goodnight moon!");
  pinMode(LED_BUILTIN, OUTPUT); 

}

void loop() { // run over and overUN
  delay(1000);
  mySerial.println("UNO UNO UNO");
  Serial.println("This is the uno ");
  delay(1000);
}
