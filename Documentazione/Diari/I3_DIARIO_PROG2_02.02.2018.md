# PROGETTO | Diario di lavoro - 02.02.2018
##### Gionata Battaglioni
##### Gabriele Dominelli
##### Fabio Gola
##### Lucas Previtali
### Canobbio, [02.02.2018]

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
|08:20 - 16:30 |assente. |


Fabio

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:30 - 11:35 |Creazione secondo grafico, ricezione e	calcolo valori ricevuti da database				      |                         
|13:15 - 16:30 |Finalizzazione pagina grafici ed implementazione della configurazione del refresh della pagina|


Lucas


|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:20 - 10:50 |finito l'invio dei dati dalla pagina dell'admin al database |
|10:50 - 15:00 |collegamento della pagina dell'admin con la pagina dei grafici. messa in funzione del login solo tramite username e password definiti nella tabella amministratore nel database |
|15:00 - 15:45 |spostamento delle pagine sul rasperry e prova delle due pagine (che al momento non funzionano correttamente sul rasperry)|
|15:45 - 16:30 | |



##  Problemi riscontrati e soluzioni adottate
1. la query usata per l'invio dei dati dalla pagina dell'admin al database non funzionava usando ajax (quindi con il codice scritto su un file php separato). Ho dovuto modificare la pagina, integrandola in un form per poter gestire l'inivo con il metodo "post".
2. le funzioni msql_query() e mysql_num_rows() usate per il controllo del nome utente e passsword dell'admin non funzionavano. Cercando in internet ho trovato un alternativa semplice, le funzioni msqli_query() e mysqli_num_rows()

##  Punto della situazione rispetto alla pianificazione
-

## Programma di massima per la prossima giornata di lavoro
- finire l'implementazione dell'invio dei dati dalla pagina dell'admin al database
