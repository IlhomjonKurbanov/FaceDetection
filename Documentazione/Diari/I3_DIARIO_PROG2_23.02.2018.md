# PROGETTO | Diario di lavoro - 23.02.2018
##### Gionata Battaglioni
##### Gabriele Dominelli
##### Fabio Gola
##### Lucas Previtali
### Canobbio, [23.02.2018]

## Lavori svolti
Gionata

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:30 - 11:35 |Ho risolto il problema del collegamento creando un utente mysql chiamato faceroot e dandogli tutti i premessi|                
|13:15 - 16:30 |Caricamento file su raspberry e completamento parti di codice disconnesse in base hai collegamenti|


Gabriele

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|08:20 - 14:20 |Ho reso responsive la pagina della WebCam, in modo che sia possibile vederla su qualsiasi risoluzione di schermo.|
|14:20 - 14:30 |Aggiunta di un'animazione che accende e spegne all'infinito il pallino rosso "REC" nella pagina della WebCam.|
|14:30 - 14:45 |Caricamento della nuova versione della pagina WebCam su Raspberry.|
|14:45 - 16:30 | |


Fabio

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:30 - 16:30 |-|


Lucas


|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:20 - 10:00 | ricerca errore di sql sul raspberry |
|10:00 - 11:35 | cambiamento di due impostazioni per l'admin che impedivano la visualizzazione corretta della pagina della webcam |
|13:15 - 15:00 | integrazione della pagina dei grafici fatta da me con quella fatta da Fabio |
|15:00- 16:00 | prova del refresh della pagina dei grafici e dell'indice di gradimento |
|16:00- 16:30 | trasporto delle pagine sul raspberry e aggiornamento database |



##  Problemi riscontrati e soluzioni adottate
1. Abbiamo risolto il problema "access denied for root@localhost" che non permetteva il funzionamento di nessuna pagina sul raspberry. 
Per fare questo ho creato un nuovo utente "faceroot" con i tutti i permessi su tutti i database e ho assegnato questo utente alle varie pagine.

```sql

CREATE USER 'faceroot'@'localhost' IDENTIFIED BY 'root';

set password for 'faceroot'@'localhost' = PASSWORD('root');

GRANT ALL ON *.* TO 'faceroot'@'localhost';

FLUSH PRIVILEGES;

```
2. Le impostazioni densità bordo e scala iniziale impedivano di visualizzare bene il rettangolo che delimita le facce trovate.
Ho dovuto cambiare il range di possibilità. Anche questo ha generato un errore a causa di divisioni con numeri decimali.

##  Punto della situazione rispetto alla pianificazione
- 

## Programma di massima per la prossima giornata di lavoro
- -
