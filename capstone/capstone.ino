#include <SoftwareSerial.h>

#include <SPI.h>
#include <MFRC522.h>

#define RST_PIN 9
#define SS_PIN 10
String temp;

SoftwareSerial mySerial(2, 3); //RX,TX
MFRC522 mfrc(SS_PIN, RST_PIN);

String ssid = "New_Mobile_3";
String PASSWORD = "0536509250";
String host = "220.67.2.21";

void connectWifi()
{
    String join = "AT+CWJAP=\"" + ssid + "\",\"" + PASSWORD + "\"";

    Serial.println("Connect Wifi...");
    mySerial.println(join);
    delay(10000);
    if (mySerial.find("OK"))
    {
        Serial.print("WIFI connect\n");
    }
    else
    {
        Serial.println("connect timeout\n");
    }
    delay(1000);
}

void httpclient(String char_input)
{
    delay(100);
    Serial.println("connect TCP...");
    mySerial.println("AT+CIPSTART=\"TCP\",\"" + host + "\",8787");
    delay(500);
    if (Serial.find("ERROR"))
        return;

    Serial.println("Send data...");
    String url = char_input;
    String cmd = "GET /process.php?temp=" + url + " HTTP/1.0\r\n\r\n";
    mySerial.print("AT+CIPSEND=");
    mySerial.println(cmd.length());
    Serial.print("AT+CIPSEND=");
    Serial.println(cmd.length());
    if (mySerial.find(">"))
    {
        Serial.print(">");
    }
    else
    {
        mySerial.println("AT+CIPCLOSE");
        Serial.println("connect timeout");
        delay(1000);
        return;
    }
    delay(500);
    mySerial.println(cmd);
    Serial.println(cmd);
    delay(100);

    if (Serial.find("ERROR"))
        return;

    mySerial.println("AT+CIPCLOSE");
    delay(100);
}

void setup(){
  Serial.begin(9600);
  SPI.begin();
  mfrc.PCD_Init();

  mySerial.begin(9600);
  connectWifi();
  delay(500);
}

void loop(){
  if(!mfrc.PICC_IsNewCardPresent() || !mfrc.PICC_ReadCardSerial()){
    delay(500);
    return;
  }
  
  Serial.print("Card UID");
  for(byte i=0; i<4; i++){
    temp+=mfrc.uid.uidByte[i];
    //Serial.print(mfrc.uid.uidByte[i]);
    Serial.print(" ");
  }
  Serial.print(temp);
  String str_output = temp;
  httpclient(str_output);
  temp="";
  Serial.println();
}
