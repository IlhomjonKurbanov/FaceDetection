# PROGETTO | Diario di lavoro - 15.12.2017
##### Gionata Battaglioni
##### Gabriele Dominelli
##### Fabio Gola
##### Lucas Previtali
### Canobbio, [15.12.2017]

## Lavori svolti
Gionata


|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 11:35 |Riunione con committente, scelta di cosa aggiungere al progetto, modifica documentazione|                  
|13:15 - 14:45 |Controllo raspberry web server, aggiunta nome utente e password a maria.db Username: web password: web|
|15:00 - 16:30 |Continuo lavoro sulla documentazione|

Gabriele

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 11:35 |Implementata la logica della sovrapposizione dei rettangoli nella pagina con webcam			        |
|13:15 - 13:50 |Implementato un tempo massimo prima di inviare le informazioni al DB|
|13:50 - 14:00 |Ripasso su come utilizzare ajax per collegare la logica di JavaScript della webcam con PHP.|
|14:00 - 14:30 |Ricerca di una valida libreria per la rappresentazione di grafici sul web|
|14:30 - 16:30 |Trovata la libreria [Chart.js](http://www.html.it/articoli/chart-js-creare-grafici-interattivi/)|


Fabio

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 10:30 |Riunione					      |
|10:30 - 11:35 |Implementazione salvataggio persone su database					      |                         
|13:15 - 16:30 |Sviluppo ricezione dati da sito a database|


Lucas


|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 16:30 |Assente			        |



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
