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
			<div class="testo" id="adminButton">
				<button onclick="document.getElementById('id01').style.display='block'" 
          style="width:auto;">Login</button>

				<div id="id01" class="modal">
				  
				  <form class="modal-content animate" action="login.php" target="_blank">
					<div class="imgcontainer">
					  <span onclick="document.getElementById('id01').style.display='none', 
              AdminLogin()" class="close" title="Close Modal">&times;    
            </span>
					</div>
					
					<div class="container">
					  <label><b>Username</b></label>
					  <input type="text" placeholder="Enter Username" name="uname" required>

					  <label><b>Password</b></label>
					  <input type="password" placeholder="Enter Password" name="psw" required>
						
					  <button id="adminLogin" type="submit">Login</button>
					  <input type="checkbox" checked="checked"> Remember me
					</div>
				  </form>
				</div>
			</div>
~~~

