# PROGETTO | Diario di lavoro - 19.01.2018
##### Gionata Battaglioni
##### Gabriele Dominelli
##### Fabio Gola
##### Lucas Previtali
### Canobbio, [19.01.2018]

## Lavori svolti
Gionata


|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 11:35 |Creazione implementazione documentazione|                 
|13:15 - 14:45 |Scrittura abstract, e rilettura documentazione con eventuale modifica|
|15:00 - 16:30 |trascrizione dei test sulla documentazione e creazione di un manuale utenti, caricamento file su raspberry|

Gabriele

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 14:15 |Collegamento pagina web cam al database, ulteriore modifica alla logica del tracking|                 
|14:15 - 14:45 |scrittura implementazione nella documentazione|

Fabio

|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 10:30 |Calcolo e inserimento dati dal database ai grafici|
|10:30 - 11:35 |collegamento database con il primo grafico(funzionante)|                         
|13:15 - 16:30 |scrittura implementazione su documentazione|


Lucas


|Orario        |Lavoro svolto                 |
|--------------|------------------------------|
|10:05 - 14:45 |presentazione progetto|                        
|14:45 - 16:30 |scrittura parte implementazione e caricamento file su raspberry|


##  Problemi riscontrati e soluzioni adottate


##  Punto della situazione rispetto alla pianificazione


## Programma di massima per la prossima giornata di lavoro

~~~
		var dataNumeroVisite = {
			labels: ["09:00", "10:00", "11:00", "12:00", "13:00", 
			"14:00", "15:00", "16:00", "17:00", "18:00", "19:00", 
			"20:00", "21:00", "22:00"],
			datasets: [{
				label: "Numero di visite",
				backgroundColor: "rgba(255,99,132,0.2)",
				borderColor: "rgba(255,99,132,1)",
				borderWidth: 2,
				hoverBackgroundColor: "rgba(255,99,132,0.4)",
				hoverBorderColor: "rgba(255,99,132,1)",
				data: [<?php echo $countUsers[0]; ?>, 
						<?php echo $countUsers[1]; ?>, 
						<?php echo $countUsers[2]; ?>, 
						<?php echo $countUsers[3]; ?>, 
						<?php echo $countUsers[4]; ?>, 
						<?php echo $countUsers[5]; ?>, 
						<?php echo $countUsers[6]; ?>, 
						<?php echo $countUsers[7]; ?>, 
						<?php echo $countUsers[8]; ?>, 
						<?php echo $countUsers[9]; ?>, 
						<?php echo $countUsers[10]; ?>, 
						<?php echo $countUsers[11]; ?>, 
						<?php echo $countUsers[12]; ?>,0]
			}]
		};
~~~

