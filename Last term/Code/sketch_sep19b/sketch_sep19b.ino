#include <ESP8266WiFi.h>
#include <ESP8266mDNS.h>
#include <WiFiUdp.h>
#include <WiFiUdp.h>
#include <WiFiClient.h>

#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>

const char* ssid     = "AndroidAP";
const char* password = "nader123";                //!!!!!!!!!!!!!!!!!!!!!modify this

WiFiClient client;
MySQL_Connection conn((Client *)&client);

  
IPAddress server_addr(18,188,120,255);          // MySQL server IP,
char user[] = "nader";           // MySQL user
char sqlpassword[] = "arduinoproject";

char INSERT_SQL[] = "USE DDNS_DB; INSERT INTO plant VALUES (1);";
char query[128];
 

WiFiServer server(80);
 
void setup() {
  pinMode(LED_BUILTIN, OUTPUT); 
  Serial.begin(115200);
  delay(10);
 

 
  // Connect to WiFi network
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
 
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
 
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print("jdghfsjd ");
  }
  Serial.println("");
  Serial.println("WiFi connected");
 
  // Start the server
  server.begin();
  Serial.println("Server started");
 
  // Print the IP address
  Serial.print("Use this URL : ");
  Serial.print("http://");
  Serial.print(WiFi.localIP());
  Serial.println("/");

  
  while (conn.connect(server_addr, 3306, user, sqlpassword) != true) {
      Serial.print ( " sql connect failed " );
  }
 
}

 
void loop() {

   
   
  // Check if a client has connected
  WiFiClient client = server.available();
  if (!client) {
    return;
  }
 
  // Wait until the client sends some data
  Serial.println("new client");
  while(!client.available()){
    delay(1);
  }
 
  // Read the first line of the request
  String request = client.readStringUntil('\r');
  Serial.println(request);
  client.flush();

  int value = LOW;
  if (request.indexOf("/LED=ON") != -1) {
    digitalWrite(LED_BUILTIN, LOW); 
    value = HIGH;
    client.print("<p>HELLO GUYS</p>");
  } 
  if (request.indexOf("/LED=OFF") != -1){
    digitalWrite(LED_BUILTIN, HIGH); 
    value = LOW;
    
    //float t = dht.readTemperature();
  
    //Serial.println(t);
    
    sprintf(query, INSERT_SQL);
    //sprintf(query, INSERT_SQL, soil_hum, t);
  
    Serial.println("Recording data.");
    Serial.println(query);
    
    MySQL_Cursor *cur_mem = new MySQL_Cursor(&conn);
    
    cur_mem->execute(query);
    client.print("<p>BYE GUYS</p>");
  }
  
 
 
  // Return the response
  client.println("HTTP/1.1 200 OK");
  client.println("Content-Type: text/html");
  client.println(""); //  do not forget this one
  client.println("<!DOCTYPE HTML>");
  client.println("<html>");
 

 
  if(value == HIGH) {
    client.print("On");  
  } else {
    client.print("Off");
  }
  client.println("<br><br>");
  client.println("Click <a href=\"/LED=ON\">here</a> turn the LED on pin 4 ON<br>");
  client.println("Click <a href=\"/LED=OFF\">here</a> turn the LED on pin 4 OFF<br>");
  client.println("</html>");
  
 
  delay(1);
  Serial.println("Client disconnected");
  Serial.println("");
 
}
