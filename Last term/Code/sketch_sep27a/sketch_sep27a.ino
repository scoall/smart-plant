
void setup() {
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
  Serial.println("Goodnight moon!");
  pinMode(LED_BUILTIN, OUTPUT); 

}

void loop() { // run over and over
  
  delay(1000);
  Serial.write("This is the uno ");
  delay(1000);
}
