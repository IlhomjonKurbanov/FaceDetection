# PROGETTO | Diario di lavoro - 1.12.2017
##### Gionata Battaglioni
##### Gabriele Dominelli
##### Fabio Gola
##### Lucas Previtali
### Canobbio, [1.12.2017]

## Lavori svolti
Gionata


|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 10:30 |Teoria su trello			        |
|10:30 - 11:35 |Ricerca e installazione di un programma per scrivere sulla scheda SD|                   
|13:15 - 14:45 |Installazione Raspbian sulla SD e risoluzione vari problemi|
|15:00 - 16:30 |Installazione XAMPP sul sistema operativo e prova funzionamento|

Gabriele

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 11:35 |Implementata la logica della sovrapposizione dei rettangoli nella pagina con webcam			        |
|13:15 - 13:50 |Implementato un tempo massimo prima di inviare le informazioni al DB|
|13:50 - 16:30 |Ricerca di una valida libreria per la rappresentazione di grafici sul web|


Fabio

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 10:30 |Ricezione informazioni su Trello						      |
|10:30 - 10:50 |Riunione						      |
|10:50 - 11:35 |Creazione ER [FaceDetectionER.xlsx](../FaceDetectionER.xlsx)|                           
|13:15 - 14:45 |Creazione guida per creazione e inserimento dati del database in PHP  [DatabasePHPAccess&Writing.docx](../DatabasePHPAccess&Writing.docx)|
|15:00 - 16:00 |Realizzazione di un database di prova ed interazione con i dati|
|16:00 - 16:30 |Implementazione salvataggio persone su database.|


Lucas


|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 10:30 |Teoria su trello			        |
|10:30 - 10:45 |[Analisi dei costi](../I3_COSTI_PROG2.md)|
|10:45 - 13:45 |Prova di OpenCV e raccolta informazioni sulla libreria|
|13:45 - 13:45 |Creazione macchina virtuale e installazione Debian|



##  Problemi riscontrati e soluzioni adottate
1. La pagina dedicata alla webcam presentava un ostacolo: capire quando una persona viene inquadrata dalla webcam.
2. La soluzione consiste nel controllare le posizioni dei rettangoli delle facce e se queste sono sovrapposte, si sta inquadrando la stessa persona.
1. OpenCV non è risultata una buona scelta per l'utilizzo di applicativi web.
4. Problema con la scrittura dell`immagine sulla SD. Cambiando il tipo di formattazione dell`SD e cambiando il programma della scrittura sull`SD ha funzionato.

##  Punto della situazione rispetto alla pianificazione
In anticipo. Abbiamo già cominciato la fase di Implementazione.

## Programma di massima per la prossima giornata di lavoro
Continuare e cominciare la logica programmatoria di:
- Pagina WebCam
- Pagina Grafici
- DataBase
- Raspberry
