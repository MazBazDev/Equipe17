#include <HCSR04.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

UltraSonicDistanceSensor distanceSensor(D7, D8);
int distanceInitial = distanceSensor.measureDistanceCm();

const char* ssid = "wifi-ssid";
const char* password = "wifi-password";

//Your Domain name with URL path or IP address with path
String serverName = "https://eonsc6s68vwvihf.m.pipedream.net";

unsigned long lastTime = 0;
unsigned long timerDelay = 5000;


void setup () {
  Serial.begin(9600);
  WiFi.begin(ssid, password);
  Serial.println("Try to connect");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("Connected to WiFi network");
}

void loop () {
  delay(100);
  int distanceCalcule = distanceSensor.measureDistanceCm();
  if (distanceCalcule <= distanceInitial - 1) {
    Serial.println("GOAL");
    if(WiFi.status()== WL_CONNECTED){
      WiFiClient client;
      HTTPClient http;
      
      // Your Domain name with URL path or IP address with path
      http.begin(client, serverName);
      
      // Specify content-type header
      http.addHeader("Content-Type", "application/json");
      // Data to send with HTTP POST
      String httpRequestData = "{\"?goal=rouge\"}";         
      // Send HTTP POST request
      int httpResponseCode = http.POST(httpRequestData);
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
        
      // Free resources
      http.end();
    }
    else {
      Serial.println("WiFi Disconnected");
    }
    delay(1000);
  } 
}