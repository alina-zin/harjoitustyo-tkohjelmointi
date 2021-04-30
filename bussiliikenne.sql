DROP DATABASE IF EXISTS bussiliikenne; 
CREATE DATABASE bussiliikenne; 
USE bussiliikenne; 

CREATE TABLE tyontekija ( 
tyontektunnus INT PRIMARY KEY AUTO_INCREMENT, 
nimi VARCHAR(50) NOT NULL, 
henktunnus VARCHAR(11) NOT NULL, 
puh VARCHAR(13) NOT NULL ); 

INSERT INTO tyontekija (nimi, henktunnus, puh) VALUES ("Matti Meikäläinen","010180-4567", 0509876543);
INSERT INTO tyontekija (nimi, henktunnus, puh) VALUES ("Ville Meikäläinen","121290-1343", 0509871234);


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

INSERT INTO ajoneuvo (ajoneuvo_nro, rekisteri, malli, kapasiteetti) VALUES (1, "IIK-001","Bussi L",66);
INSERT INTO ajoneuvo (ajoneuvo_nro, rekisteri, malli, kapasiteetti) VALUES (2, "IIK-017","Bussi M",54);
INSERT INTO ajoneuvo (ajoneuvo_nro, rekisteri, malli, kapasiteetti) VALUES (3, "IIK-114","Bussi S",25);

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
puh VARCHAR(13) NOT NULL, 
sahkoposti VARCHAR(50));

INSERT INTO asiakas (nimi, puh, sahkoposti) VALUES ("Emma Virtanen", 0449872356, "emma@posti.fi");
INSERT INTO asiakas (nimi, puh, sahkoposti) VALUES ("Kalle Järvi", 0449123356, "kalle@jarvi.fi");


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

INSERT INTO tilausajo (asiakastunnus, tyontektunnus, ajoneuvo_nro, asiakasmaara, lähtöpaikka, maali, aloitusaika, lopetusaika) VALUES (1, 2, 1, 59, "OAMK Linnanmaa", "Rovaniemi", '2021-02-10 12:30:00', '2021-02-10 15:00:00');
INSERT INTO tilausajo (asiakastunnus, tyontektunnus, ajoneuvo_nro, asiakasmaara, lähtöpaikka, maali, aloitusaika, lopetusaika) VALUES (1, 2, 1, 59, "Rovaniemi", "OAMK Linnanmaa", '2021-02-12 12:30:00', '2021-02-12 15:00:00');
INSERT INTO tilausajo (asiakastunnus, tyontektunnus, ajoneuvo_nro, asiakasmaara, lähtöpaikka, maali, aloitusaika, lopetusaika) VALUES (2, 1, 2, 40, "Oulu Linja-autoas.", "Helsinki", '2021-04-29 09:00:00', '2021-05-02 15:00:00');