# PROGETTO | Diario di lavoro - 26.01.2018
##### Gionata Battaglioni
##### Gabriele Dominelli
##### Fabio Gola
##### Lucas Previtali
### Canobbio, [26.01.2018]

## Lavori svolti
Gionata


|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|08:15 - 11:35 |Messa a punto della postazione Raspberry||10:30 -                   
|13:15 - 14:45 |Sistemazione postazione con nuovo schermo e webcam|
|15:00 - 16:30 |Installazione diver WebCam|

Gabriele

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|08:15 - 11:35 |Sviluppo ed implementazione dei file php sia per la lettura che per la scrittura al DataBase per la pagina della WebCam.|
|13:15 - 16:30 |Avanzamento della logica per l'individuamento di volti differenti.|


Fabio

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:30 - 11:35 |Creazione secondo grafico, ricezione e	calcolo valori ricevuti da database				      |                         
|13:15 - 16:30 |Finalizzazione pagina grafici ed implementazione della configurazione del refresh della pagina|


Lucas


|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:20 - 9:00 |Collegamento della pagina dell'admin al database |
|9:00 - 11:35 |lettura dei dati dal database e inserimento negli input della pagina dell'admin |
|13:15 - 14:00 |inserimento di nuove impostazioni per l'admin (conteggio secondi, giorni arretrati e refresh) |
|14:00 - 16:30 |invio dei dati dalla pagina al database (non completo) |



##  Problemi riscontrati e soluzioni adottate
1. La pagina della WebCam è ora in grado di distinguere due o più volti in contemporanea ma presenta un problema: ad ogni sfarfallio del Tracking vengono indipendentemente inviati i dati al DB.
2. la query usata per l'invio dei dati dalla pagina dell'admin al database funziona se scritta da linea di comando ma non funziona usando php e ajax (probabilmente a causa di qualche errore relativo alle variabili.

##  Punto della situazione rispetto alla pianificazione
-

## Programma di massima per la prossima giornata di lavoro
- finire l'implementazione dell'invio dei dati dalla pagina dell'admin al database

