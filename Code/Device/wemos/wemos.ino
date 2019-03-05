//--------------------------------------------------

/*
Cellular Shield - Pass-Through Sample Sketch

In this sketch serial commands are passed from a terminal program to the SM5100B cellular module; and responses from the cellular module are posted in the terminal. More information is found in the sketch comments.


An activated SIM card must be inserted into the SIM card holder on the board in order to use the device!

*/
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
const char* password = "nader123";                //!!!!!!!!!!!!!!!!!!!!!modify this

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
  while (conn.connect(server_addr, 3306, user, sqlpassword) != true) {
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
  //If a character is coming from the terminal to the Arduino...
  if(Serial.available() >0)
  {
    incoming_char=Serial.read();  //Get the character coming from the terminal
    cell.print(incoming_char);    //Send the character to the cellular module.
    
  }
}


/* SM5100B Quck Reference for AT Command Set
*Unless otherwise noted AT commands are ended by pressing the 'enter' key.

1.) Make sure the proper GSM band has been selected for your country. For the US the band must be set to 7.
To set the band, use this command: AT+SBAND=7

2.) After powering on the Arduino with the shield installed, verify that the module reads and recognizes the SIM card.
With a terimal window open and set to Arduino port and 9600 buad, power on the Arduino. The startup sequence should look something
like this:

Starting SM5100B Communication...
    
+SIND: 1
+SIND: 10,"SM",1,"FD",1,"LD",1,"MC",1,"RC",1,"ME",1

Communication with the module starts after the first line is displayed. The second line of communication, +SIND: 10, tells us if the module
can see a SIM card. If the SIM card is detected every other field is a 1; if the SIM card is not detected every other field is a 0.

3.) Wait for a network connection before you start sending commands. After the +SIND: 10 response the module will automatically start trying
to connect to a network. Wait until you receive the following repsones:

+SIND: 11
+SIND: 3
+SIND: 4

The +SIND response from the cellular module tells the the modules status. Here's a quick run-down of the response meanings:
0 SIM card removed
1 SIM card inserted
2 Ring melody
3 AT module is partially ready
4 AT module is totally ready
5 ID of released calls
6 Released call whose ID=<idx>
7 The network service is available for an emergency call
8 The network is lost
9 Audio ON
10 Show the status of each phonebook after init phrase
11 Registered to network

After registering on the network you can begin interaction. Here are a few simple and useful commands to get started:

To make a call:
AT command - ATDxxxyyyzzzz
Phone number with the format: (xxx)yyy-zzz

If you make a phone call make sure to reference the devices datasheet to hook up a microphone and speaker to the shield.

To send a txt message:
AT command - AT+CMGF=1
This command sets the text message mode to 'text.'
AT command = AT(carriage return)'Text to send'(CTRL+Z)
This command is slightly confusing to describe. The phone number, in the format (xxx)yyy-zzzz goes inside double quotations. Press 'enter' after closing the quotations.
Next enter the text to be send. End the AT command by sending CTRL+Z. This character can't be sent from Arduino's terminal. 

Use an alternate terminal program like Hyperterminal,
Tera Term, Bray Terminal, X-CTU, or Putty.

*/
//-----------------------------------------------------------
