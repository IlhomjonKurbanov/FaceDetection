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
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "facedetection";
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT Orario_inizio, Orario_fine, Data FROM webcam";
			$result = $conn->query($sql);
			
			$Orario_inizio=array();
			$Orario_fine=array();
			$Data=array();
			$arrayIndex = 0;
			
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					array_push($Orario_inizio, $row["Orario_inizio"]);
					array_push($Orario_fine, $row["Orario_fine"]);
					array_push($Data, $row["Data"]);
				}
			} else {
				echo "0 results";
			}
~~~

