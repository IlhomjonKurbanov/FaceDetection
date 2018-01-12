1. [Introduzione](#introduzione)

  - [Informazioni sul progetto](#informazioni-sul-progetto)

  - [Abstract](#abstract)

  - [Scopo](#scopo)

1. [Analisi](#analisi)

  - [Analisi del dominio](#analisi-del-dominio)
  
  - [Analisi dei mezzi](#analisi-dei-mezzi)

  - [Analisi e specifica dei requisiti](#analisi-e-specifica-dei-requisiti)

  - [Use case](#use-case)

  - [Pianificazione](#pianificazione)

1. [Progettazione](#progettazione)

  - [Design dell’architettura del sistema](#design-dell’architettura-del-sistema)

  - [Design dei dati e database](#design-dei-dati-e-database)

1. [Implementazione](#implementazione)

1. [Test](#test)

  - [Protocollo di test](#protocollo-di-test)

  - [Risultati test](#risultati-test)

  - [Mancanze/limitazioni conosciute](#mancanze/limitazioni-conosciute)

1. [Consuntivo](#consuntivo)

1. [Conclusioni](#conclusioni)

  - [Sviluppi futuri](#sviluppi-futuri)

  - [Considerazioni personali](#considerazioni-personali)

1. [Sitografia](#sitografia)

1. [Allegati](#allegati)


## Introduzione

### Informazioni sul progetto

 - **Progetto svolto da:** Gionata Battaglioni, Fabio Gola,Gabriele     	Dominelli, Lucas Previtali
 - **Mandanti del progetto:** Luca Muggiasca
 - **Docente Responsabile:** Luca Muggiasca
 - **Scuola:** Arti e Mestieri Trevano
 - **Sezione:** Informatica
 - **Classe:** I3AA
 - **Data d’inizio:** 10.11.2017
 - **Termine della consegna:** 19.01.2018


### Abstract

  E’ una breve e accurata rappresentazione dei contenuti di un documento,
  senza notazioni critiche o valutazioni. Lo scopo di un abstract efficace
  dovrebbe essere quello di far conoscere all’utente il contenuto di base
  di un documento e metterlo nella condizione di decidere se risponde ai
  suoi interessi e se è opportuno il ricorso al documento originale.

  Può contenere alcuni o tutti gli elementi seguenti:

  -   **Background/Situazione iniziale**

  -   **Descrizione del problema e motivazione**: Che problema ho cercato
      di risolvere? Questa sezione dovrebbe includere l'importanza del
      vostro lavoro, la difficoltà dell'area e l'effetto che potrebbe
      avere se portato a termine con successo.

  -   **Approccio/Metodi**: Come ho ottenuto dei progressi? Come ho
      risolto il problema (tecniche…)? Quale è stata l’entità del mio
      lavoro? Che fattori importanti controllo, ignoro o misuro?

  -   **Risultati**: Quale è la risposta? Quali sono i risultati? Quanto è
      più veloce, più sicuro, più economico o in qualche altro aspetto
      migliore di altri prodotti/soluzioni?

  Esempio di abstract:

  > *As the size and complexity of today’s most modern computer chips
  > increase, new techniques must be developed to effectively design and
  > create Very Large Scale Integration chips quickly. For this project, a
  > new type of hardware compiler is created. This hardware compiler will
  > read a C++ program, and physically design a suitable microprocessor
  > intended for running that specific program. With this new and powerful
  > compiler, it is possible to design anything from a small adder, to a
  > microprocessor with millions of transistors. Designing new computer
  > chips, such as the Pentium 4, can require dozens of engineers and
  > months of time. With the help of this compiler, a single person could
  > design such a large-scale microprocessor in just weeks.*

### Scopo

  Lo scopo del progetto è di creare un sistema di riconoscimento facciale tramite una webcam. Questo sistema serve per quantificare il numero di persone che visitano uno stand di Espoprofessioni. Il sistema deve essere in grado di riconoscere le persone che entrano nel campo visivo della webcam.


## Analisi

### Analisi del dominio

  Il progetto completo verrà presentato alla prossima edizione di Espoprofessioni, perciò sarà presentato principalmente a un pubblico di ragazzi e ragazze non per forza appassionati di informatica (in generale il gli “utenti” saranno variegati). Il pubblico presente sarà lì soprattutto per vedere diverse professioni e molti saranno studenti. Per capire il funzionamento del sistema non bisogna essere per forza esperti o appassionati di informatica.

  
### Analisi e specifica dei requisiti

  Il committente richiede una pagina web che effettua un riconoscimento facciale. Una volta che la faccia viene riconosciuta dalla pagina viene salvata all`interno di una variabile e a sua volta salvata in un database. In base al numero di persone riconosciute e al tempo che le persone rimangono ferme davanti alla web cam viene redatto un grafico. Mentre un secondo grafico veiene redatto in base al numero di persone che sono state riconosciute dalla webcam e alla fascia oraria. 

  -   Quali sono i bisogni del committente?

  -   Quali funzioni deve svolgere il prodotto?

  -   Come devono essere implementate?

  -   L’utente, come vorrebbe/dovrebbe interagire con il prodotto?

  -   Come verrà utilizzato il prodotto?

  -   Che tipo di interfaccia si immagina?

  -   Che prestazioni minime deve fornire il prodotto?

  -   Che grado di sicurezza deve avere il prodotto?

  -   …

  


  |ID  |REQ-001                                        |
  |----|------------------------------------------------|
  |**Nome**    |Face Detection |
  |**Priorità**|1                     |
  |**Versione**|1.0                   |
  |**Note**    ||
  |**Sub-ID**    | Requisito|
  |**001**      | Creazione macchina virtuale  |
  |**002**      | Creazione pagina Web per webcam             |
  |**003**      | Creazione pagina Web per grafici            |
  |**004**      | Creazione pagina web per gestione dell’admin|                
  |**005**      | Creare una banca dati                |
  |**006**      | Ricerca di nuovi volti               |
  |**007**      | Salvataggio delle persone su DB             |
  |**008**      | Utilizzo del prodotto su RaspBerry          |

  |ID  |REQ-002                                        |
  |----|------------------------------------------------|
  |**Nome**    |Creazione macchina virtuale |
  |**Priorità**|1                     |
  |**Versione**|1.0                   |
  |**Note**    ||
  |**Sub-ID**    |Requisito |
  |**001**      | Si deve creazione macchina virtuale su “Virtual Box” |
  |**002**      | Si deve installare di XAMPP v7.0.2            |
  |**003**      | Si deve creare la struttura in cartelle che ospita i file   del progetto.           |
  
   |ID  |REQ-003                                        |
  |----|------------------------------------------------|
  |**Nome**    |Creazione pagina Web per webcam |
  |**Priorità**|1                     |
  |**Versione**|1.0                   |
  |**Note**    ||
  |**Sub-ID**    |Requisito |
  |**001**      |Si deve implementare una rappresentazione della webcam|
  |**002**      | Si deve organizzare e realizzare una interfaccia grafica    |
  
  |ID  |REQ-004                                        |
  |----|------------------------------------------------|
  |**Nome**    |Creazione pagina Web per grafici |
  |**Priorità**|1                     |
  |**Versione**|1.0                   |
  |**Note**    ||
  |**Sub-ID**    |Requisito |
  |**001**      | Si deve implementare la lettura dal DB |
  |**002**      | Si devono creare 2 grafici: Numero di persone rilevate in ogni ora del giorno. Tempo medio di una persona di fronte all’obiettivo.|
  |**003**      | Si deve poter utilizzare un form di log in per il REQ-005           |
  
   |ID  |REQ-005                                        |
  |----|------------------------------------------------|
  |**Nome**    |Creazione pagina Web per gestione dell’admin |
  |**Priorità**|2                     |
  |**Versione**|1.0                   |
  |**Note**    ||
  |**Sub-ID**    |Miglioria |
  |**001**      |Si deve creare un pannello di gestione per le impostazioni della WebCam.|
  |**002**      | Si deve creare un pannello di gestione per le impostazioni di Tracking.    |
  
  |ID  |REQ-006                                        |
  |----|------------------------------------------------|
  |**Nome**    |Creare una banca dati |
  |**Priorità**|1                     |
  |**Versione**|1.0                   |
  |**Note**    ||
  |**Sub-ID**    |Miglioria |
   |**001**      |Si deve creare un DB che ospiterà le persone tramite: 	Tempo di fronte all’obiettivo e ora del tracking.|
   
   |ID  |REQ-007                                        |
  |----|------------------------------------------------|
  |**Nome**    |Ricerca di nuovi volti |
  |**Priorità**|1                     |
  |**Versione**|1.0                   |
  |**Note**    ||
  |**Sub-ID**    |Requisito |
  |**001**      | Si deve scegliere la libreria migliore per il tracking dei volti: openCV, tracking.js |
  |**002**      |Si deve implementare il codice JavaScript per l’individuazione dei dati tramite libreria.|
  |**003**      | La webcam deve eseguire la ricerca di nuovi volti ogni 15 secondi e se rileva dei volti nelle coordinate vicine a quelle vecchie, non ne terrà conto.|
  
  |ID  |REQ-008                                        |
  |----|------------------------------------------------|
  |**Nome**    |Salvataggio delle persone sul DB |
  |**Priorità**|1                     |
  |**Versione**|1.0                   |
  |**Note**    ||
  |**Sub-ID**    |Miglioria |
   |**001**      |Si deve gestire il codice PHP del sito web per il corretto invio dei dati al DB.|
  
  |ID  |REQ-009                                        |
  |----|------------------------------------------------|
  |**Nome**    |Utilizzo del prodotto su RaspBerry |
  |**Priorità**|1                     |
  |**Versione**|1.0                   |
  |**Note**    ||
  |**Sub-ID**    |Requisito |
  |**001**      | Si deve allestire un webserver Linux su RaspBerry|
  |**002**      |Si deve trasporre l’intero codice del progetto su RaspBerry|
  |**003**      | Si deve poter connettere 1 WebCam e 2 schermi contemporaneamente per input e output.|

 


### Use case

I casi d’uso rappresentano l’interazione tra i vari attori e le
funzionalità del prodotto.

### Pianificazione

Questo é il Gantt che abbiamo realizzato in base alla lista dei requisiti che abbiamo redatto e al tempo a disposizione.
![Gantt Preventivo](Analisi/GANTT_preventivo.jpg)




### Analisi dei mezzi
Come prodotti finisci abbiamo usato i seguenti:

| Proodotto | Caratteristiche |
|    :--    |    --:    |
|  Raspberry Pi3  |  so. raspbian 9.0  |
|  tastiera K200  |  Logitech  |
|  Mouse  |  Lenovo  |
|  Monitor HDMI  |  Asus  |
|  Televisore (da definire) |  XXXXXX  |
|  Webcam (XXX) |  Logitech  |

Mentre come prodotti virtuali abbiamo usato la libreria [tracking.js](https://trackingjs.com/).
Il Raspberry é stato trasformato in un webserver, all`intreno abbiamo scaricato le seguenti versioni: 

| Pacchetto| Versione |
|    :--    |    --:    |
|  Apache  |   2.4.25 |
|  Php  |  7.0.19  |
|  MariaDB  |  10.1.23  |

### Analisi dei costi
#### Costo per persona:
È stimato che un apprendista al nostro stesso livello guadagni circa 80 franchi all`ora.

|Costo per ora:    |Ore        |Totale        |
|------------------|-----------|--------------|
|60                |48         |2880 fr.      |


#### Costo totale (dipendenti):
Essendo quattro persone a lavorare in questo progetto, i costi vanno moltiplicati.

|Costo per ora   |Ore   |persone  |Totale     |
|----------------|------|---------|-----------|
|60              |48    |4        |11520 fr.  |


#### Costo webcam:
Dopo qualche ricerca abbiamo trovato la webcam adatta al nostro progetto e il presso é di:

|Totale          |
|----------------|
|29 fr.          |


#### Costo totale:
Facendo una somma dei vari totali arriviamo al costo totale finale di questo progetto.

|Totale          |
|----------------|
|11560 fr.       |


## Progettazione

Questo capitolo descrive esaustivamente come deve essere realizzato il
prodotto fin nei suoi dettagli. Una buona progettazione permette
all’esecutore di evitare fraintendimenti e imprecisioni
nell’implementazione del prodotto.

### Design dell’architettura del sistema

Descrive:

-   La struttura del programma/sistema lo schema di rete...

-   Gli oggetti/moduli/componenti che lo compongono.

-   I flussi di informazione in ingresso ed in uscita e le
    relative elaborazioni. Può utilizzare *diagrammi di flusso dei
    dati* (DFD).

-   Eventuale sitemap

### Design dei dati e database

Descrizione delle strutture di dati utilizzate dal programma in base
agli attributi e le relazioni degli oggetti in uso.

### Schema E-R, schema logico e descrizione.

Questo é il diagramma ER del database generato per consentire lo scambio dei dati tramite le varie pagine web.
![Pagina WebCam](Analisi/schemaER.png)

### Design delle interfacce

Prima di iniziare a scrivere il codice abbiamo scelto assime al gurppo una truttura base sel sito, di come vorremmo che esso diventi. 
Per la pagina che riguarda la webcam, cioè dove l`utente vede sè stesso abbiamo pensato a un approccio molto minimale.
![Pagina WebCam](Analisi/MockupCam.PNG)

Mentre per la pagina dove verranno inseriti i grafici abbiamo pensato a un approccio un po meno minimale ma più adatto alla situazione.
![Pagina Gafici](Analisi/MockuoGrafici.png)

Per la terza e ultima pagina cioè la pagina dove l` amminitratore potrà cambiare le impostazioni della webcam o della pagina. Come prima cosa dovrà coparire la pagina di login:
![Pagina Gafici](Analisi/Mockup_Login.png)

Secondariamente una volta effettuato il login. L` amministratore avrà il diritto di cambiare le impostazioni a suo piacimento.
![Pagina Gafici](Analisi/Mockup_Settings.png)

### Design procedurale

Descrive i concetti dettagliati dell’architettura/sviluppo utilizzando
ad esempio:

-   Diagrammi di flusso e Nassi.

-   Tabelle.

-   Classi e metodi.

-   Tabelle di routing

-   Diritti di accesso a condivisioni …

Questi documenti permetteranno di rappresentare i dettagli procedurali
per la realizzazione del prodotto.

## Implementazione

In questo capitolo dovrà essere mostrato come è stato realizzato il
lavoro. Questa parte può differenziarsi dalla progettazione in quanto il
risultato ottenuto non per forza può essere come era stato progettato.

Sulla base di queste informazioni il lavoro svolto dovrà essere
riproducibile.

In questa parte è richiesto l’inserimento di codice sorgente/print
screen di maschere solamente per quei passaggi particolarmente
significativi e/o critici.

Inoltre dovranno essere descritte eventuali varianti di soluzione o
scelte di prodotti con motivazione delle scelte.

Non deve apparire nessuna forma di guida d’uso di librerie o di
componenti utilizzati. Eventualmente questa va allegata.

Per eventuali dettagli si possono inserire riferimenti ai diari.

## Test

### Protocollo di test

Definire in modo accurato tutti i test che devono essere realizzati per
garantire l’adempimento delle richieste formulate nei requisiti. I test
fungono da garanzia di qualità del prodotto. Ogni test deve essere
ripetibile alle stesse condizioni.


|Test Case      | TC-001                               |
|---------------|--------------------------------------|
|**Nome**       |Import a card, but not shown with the GUI |
|**Riferimento**|REQ-012                               |
|**Descrizione**|Import a card with KIC, KID and KIK keys with no obfuscation, but not shown with the GUI |
|**Prerequisiti**|Store on local PC: Profile\_1.2.001.xml (appendix n\_n) and Cards\_1.2.001.txt (appendix n\_n) |
|**Procedura**     | - Go to “Cards manager” menu, in main page click “Import Profiles” link, Select the “1.2.001.xml” file, Import the Profile - Go to “Cards manager” menu, in main page click “Import Cards” link, Select the “1.2.001.txt” file, Delete the cards, Select the “1.2.001.txt” file, Import the cards |
|**Risultati attesi** |Keys visible in the DB (OtaCardKey) but not visible in the GUI (Card details) |


### Risultati test

Tabella riassuntiva in cui si inseriscono i test riusciti e non del
prodotto finale. Se un test non riesce e viene corretto l’errore, questo
dovrà risultare nel documento finale come riuscito (la procedura della
correzione apparirà nel diario), altrimenti dovrà essere descritto
l’errore con eventuali ipotesi di correzione.

### Mancanze/limitazioni conosciute

Descrizione con motivazione di eventuali elementi mancanti o non
completamente implementati, al di fuori dei test case. Non devono essere
riportati gli errori e i problemi riscontrati e poi risolti durante il
progetto.

## Consuntivo

Consuntivo del tempo di lavoro effettivo e considerazioni riguardo le
differenze rispetto alla pianificazione (cap 1.7) (ad esempio Gannt
consuntivo).

## Conclusioni

Quali sono le implicazioni della mia soluzione? Che impatto avrà?
Cambierà il mondo? È un successo importante? È solo un’aggiunta
marginale o è semplicemente servita per scoprire che questo percorso è
stato una perdita di tempo? I risultati ottenuti sono generali,
facilmente generalizzabili o sono specifici di un caso particolare? ecc

### Sviluppi futuri
  Migliorie o estensioni che possono essere sviluppate sul prodotto.

### Considerazioni personali
  Cosa ho imparato in questo progetto? ecc

## Bibliografia

### Bibliografia per articoli di riviste
1.  Cognome e nome (o iniziali) dell’autore o degli autori, o nome
    dell’organizzazione,

2.  Titolo dell’articolo (tra virgolette),

3.  Titolo della rivista (in italico),

4.  Anno e numero

5.  Pagina iniziale dell’articolo,

### Bibliografia per libri


1.  Cognome e nome (o iniziali) dell’autore o degli autori, o nome
    dell’organizzazione,

2.  Titolo del libro (in italico),

3.  ev. Numero di edizione,

4.  Nome dell’editore,

5.  Anno di pubblicazione,

6.  ISBN.

### Sitografia

1.  URL del sito (se troppo lungo solo dominio, evt completo nel
    diario),

2.  Eventuale titolo della pagina (in italico),

3.  Data di consultazione (GG-MM-AAAA).

**Esempio:**

-   http://standards.ieee.org/guides/style/section7.html, *IEEE
    Standards Style Manual*, 07-06-2008.

## Allegati

Elenco degli allegati, esempio:

-   Diari di lavoro

-   Codici sorgente/documentazione macchine virtuali

-   Istruzioni di installazione del prodotto (con credenziali
    di accesso) e/o di eventuali prodotti terzi

-   Documentazione di prodotti di terzi
 
-   Eventuali guide utente / Manuali di utilizzo

-   Mandato e/o Qdc

-   Prodotto

-   …
