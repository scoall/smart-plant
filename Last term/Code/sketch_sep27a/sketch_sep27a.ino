
void setup() {
  // Open serial communications and wait for port to open:
  Serial.begin(115200);
  Serial.println("Goodnight moon!");
  pinMode(LED_BUILTIN, OUTPUT); 

}

void loop() { // run over and over
  
  delay(1000);
  digitalWrite(LED_BUILTIN, LOW); 
  delay(1000);
  Serial.write("THIS IS THE WEMOS");
  digitalWrite(LED_BUILTIN, HIGH); 
  delay(1000);
}
