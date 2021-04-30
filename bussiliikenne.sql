DROP DATABASE IF EXISTS bussiliikenne; 
CREATE DATABASE bussiliikenne; 
USE bussiliikenne; 

CREATE TABLE tyontekija ( 
tyontektunnus INT PRIMARY KEY AUTO_INCREMENT, 
nimi VARCHAR(50) NOT NULL, 
henktunnus INT NOT NULL, 
puh INT NOT NULL ); 

CREATE TABLE tyosuhde ( 
Tyontektunnus INT AUTO_INCREMENT,  
tyonimike VARCHAR(50), 
Aloituspvm DATE NOT NULL, 
Lopetuspvm DATE, 
CONSTRAINT tyosuhde_pk PRIMARY KEY (tyontektunnus, aloituspvm)); 

CREATE TABLE halli ( 
hallinro INT PRIMARY KEY, 
sijainti VARCHAR(30) ); 

CREATE TABLE ajoneuvo ( 
ajoneuvo_nro INT PRIMARY KEY, 
rekisteri VARCHAR(10), 
hallinro INT, 
malli VARCHAR(50), 
kapasiteetti INT, 
CONSTRAINT hallinro_viite FOREIGN KEY (hallinro) REFERENCES halli (hallinro)); 

CREATE TABLE huolto ( 
huoltonro INT PRIMARY KEY AUTO_INCREMENT, 
huoltopvm DATE NOT NULL, 
ajoneuvo_nro INT, 
huoltopaikka VARCHAR(50), 
tilanne VARCHAR(50), 
ongelma VARCHAR(255), 
CONSTRAINT ajoneuvo_viite1 FOREIGN KEY (ajoneuvo_nro) REFERENCES ajoneuvo (ajoneuvo_nro)); 

CREATE TABLE tyovuoro ( 
tyontektunnus INT, 
alkamisaika DATETIME NOT NULL, 
loppumisaika DATETIME NOT NULL, 
CONSTRAINT tyotunnit_pk PRIMARY KEY (tyontektunnus, alkamisaika), 
CONSTRAINT tyontektunnus_viite FOREIGN KEY (tyontektunnus) REFERENCES tyontekija (tyontektunnus)); 

CREATE TABLE asiakas ( 
asiakastunnus INT PRIMARY KEY AUTO_INCREMENT, 
nimi VARCHAR(50) NOT NULL, 
puh INT NOT NULL, 
sahkoposti VARCHAR(50)); 

CREATE TABLE tilausajo ( 
tilausnro INT PRIMARY KEY AUTO_INCREMENT, 
asiakastunnus INT, 
tyontektunnus INT, 
ajoneuvo_nro INT,
asiakasmaara INT, 
lähtöpaikka VARCHAR(255), 
maali VARCHAR(255), 
aloitusaika DATETIME, 
lopetusaika DATETIME, 
CONSTRAINT asiakas_viite FOREIGN KEY (asiakastunnus) REFERENCES 
asiakas (asiakastunnus), 
CONSTRAINT työntek_viite FOREIGN KEY (tyontektunnus) REFERENCES 
tyontekija (tyontektunnus), 
CONSTRAINT ajoneuvo_viite2 FOREIGN KEY (ajoneuvo_nro) REFERENCES ajoneuvo (ajoneuvo_nro)); 