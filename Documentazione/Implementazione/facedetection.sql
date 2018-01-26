
-- Dump della struttura del database facedetection
DROP DATABASE IF EXISTS `facedetection`;
CREATE DATABASE IF NOT EXISTS `facedetection` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `facedetection`;

-- Dump della struttura di tabella facedetection.amministratore
DROP TABLE IF EXISTS `amministratore`;
CREATE TABLE IF NOT EXISTS `amministratore` (
  `Nome_Utente` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`Nome_Utente`)
);

-- L’esportazione dei dati non era selezionata.
-- Dump della struttura di tabella facedetection.configurazione
DROP TABLE IF EXISTS `configurazione`;
CREATE TABLE IF NOT EXISTS `configurazione` (
  `Testo` varchar(50),
  `Valore` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`Testo`)
);

-- L’esportazione dei dati non era selezionata.
-- Dump della struttura di tabella facedetection.webcam
DROP TABLE IF EXISTS `visita`;
CREATE TABLE IF NOT EXISTS `visita` (
  `id_visita` int(11) NOT NULL AUTO_INCREMENT,
  `Orario_inizio` time DEFAULT NULL,
  `Orario_fine` time DEFAULT NULL,
  `Data` date DEFAULT NULL,
  PRIMARY KEY (`id_visita`)
);

INSERT INTO configurazione VALUES ('Densità_bordo','0.1');
INSERT INTO configurazione VALUES ("Scala_iniziale","4");
INSERT INTO configurazione VALUES ("Dimensione_step","2");
INSERT INTO configurazione VALUES ("Conteggio_secondi","3");
INSERT INTO configurazione VALUES ("Giorni_arretrati","5");
