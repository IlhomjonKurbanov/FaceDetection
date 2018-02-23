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
|13:15 - 16:30 |-|


Gabriele

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|08:20 - 16:30 |- |


Fabio

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:30 - 16:30 |-|


Lucas


|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|8:20 - 9:00 |colloquio con Mussi per decidere i turni per la settimana di espo-professioni |
|9:00 - 11:35 |ricerca errore di collegamento di sql sul rasperry |
|13:15 - 16:30 |collegamento della webcam con il database per il cambio di impostazioni |



##  Problemi riscontrati e soluzioni adottate
1. Abbiamo risolto il problema "access denied for root@localhost" che non permetteva il funzionamento di nessuna pagina sul raspberry. 
Per fare questo ho creato un nuovo utente "faceroot" con i tutti i permessi su tutti i database e ho assegnato questo utente alle varie pagine.

```sql

CREATE USER 'faceroot'@'localhost' IDENTIFIED BY 'root';

set password for 'faceroot'@'localhost' = PASSWORD('root');

GRANT ALL ON *.* TO 'faceroot'@'localhost';

FLUSH PRIVILEGES;

```

##  Punto della situazione rispetto alla pianificazione
- in ritardo

## Programma di massima per la prossima giornata di lavoro
- -
