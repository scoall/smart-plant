
#include <ESP8266WiFi.h>
#include <ESP8266mDNS.h>
#include <WiFiUdp.h>
#include <WiFiUdp.h>
#include <WiFiClient.h>
#include <SoftwareSerial.h>  //Include the NewSoftSerial library to send serial commands to the cellular module.
#include <string.h>         //Used for string manipulations
#include <ArduinoJson.h>


#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>

const char* ssid     = "AndroidAP";
const char* password = "nader123";                

WiFiClient client;
MySQL_Connection conn((Client *)&client);

IPAddress server_addr(35,178,39,124);          // MySQL server IP,
char user[] = "nader";           // MySQL user
char sqlpassword[] = "arduinoproject";

WiFiServer server(80);

char incoming_char = 0;      //Will hold the incoming character from the Serial Port.
//StaticJsonDocument<1024> jsonBuffer;
DynamicJsonDocument jsonBuffer(2048);
SoftwareSerial cell(D2,D3);  //Create a 'fake' serial port. Pin 2 is the Rx pin, pin 3 is the Tx pin.
bool moisture, humidity, light, temp = false;
char m='X'; char h='X'; char l='X'; char t='X';
int mvalue1=0; int hvalue1=0; int lvalue1=0; int tvalue1=0;
String mresult="";String lresult="";String tresult="";String hresult="";
int count = 0;
char jsonstr;
void setup()
{
  //Initialize serial ports for communication.
  Serial.begin(9600);
  cell.begin(9600);
  Serial.print(WiFi.macAddress());
  //Let's get started!
  Serial.println(" Starting SM5100B Communication...");
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.println("No connect ");
  }
  server.begin();
  while (conn.connect(server_addr, 10000, user, sqlpassword) != true) {
      Serial.print ( " sql connect failed " );
  }
}


void loop() {
  char check;
  char value;
  //If a character comes in from the cellular module...
  if(cell.available())
  {
    
    incoming_char=cell.read();
    if (incoming_char =='L'){
      if (lresult!=""){
      Serial.println("L"+lresult);
      }
      lresult="";
      Serial.println();
      count=count+1;
      l='L';
      check = incoming_char;
      moisture=false;
      humidity=false; light=true; temp = false;
    }
    else if (incoming_char =='M'){
       if (mresult!=""){
      Serial.println("M"+mresult);
       }
      mresult="";
      Serial.println();
      count=count+1;
      m='M';
      check = incoming_char;
      humidity=false;
      moisture=true; light=false; temp = false;
    }
    else if (incoming_char =='H'){
       if (hresult!=""){
      Serial.println("H"+hresult);
       }
      hresult="";
      Serial.println();
      count=count+1;
      h='H';
      check = incoming_char;
      temp=false;
      moisture=false; light=false; humidity = true;
    }
    else if (incoming_char =='T'){
       if (tresult!=""){
      Serial.println("T"+tresult);
       }
      tresult="";
      Serial.println();
      count=count+1;
      t='T';
      check = incoming_char;
      light=false;
      moisture=false; humidity=false; temp = true;
    }
    
    else{    
      value = value+incoming_char;       
      if (moisture==true){
        mresult=mresult+value;
        mvalue1=mvalue1+1;
      }
      else if (humidity==true){
        hresult=hresult+value;
        hvalue1=hvalue1+1;
      }
      else if (light==true){
        lresult=lresult+value;
        lvalue1=lvalue1+1;
      }
      else if (temp==true){
        tresult=tresult+value;
        tvalue1=tvalue1+1;
      }
    }
    if (mvalue1>=6 && tvalue1>=6 && lvalue1>=6 && hvalue1>=6){
    
        if (mresult=="" && hresult=="" && tresult=="" && lresult==""){
          digitalWrite(11, LOW);  
        }
        jsonBuffer["m"]=mresult;
        jsonBuffer["h"]=hresult;
        jsonBuffer["t"]=tresult;
        jsonBuffer["l"]=lresult;
        
        serializeJson(jsonBuffer, Serial);
        String jsonstr="";
        serializeJson(jsonBuffer, jsonstr);
        MySQL_Cursor *cur_mem = new MySQL_Cursor(&conn);
        String q = "INSERT INTO DDNS_DB.plant_readings(device, time, readings) VALUES ('"+WiFi.macAddress()+"',NOW(),'"+jsonstr+"');";
        char query[512];
        q.toCharArray(query, 512);
        cur_mem->execute(query);
        jsonBuffer.clear();
        mvalue1=0;
        hvalue1=0;
        tvalue1=0;
        lvalue1=0;

    }
    
  }
  
}
