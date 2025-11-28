# wp-childtheme-demo
## Tema child WordPress dimostrativo con override template e layout custom.

### Tema Child WordPress — Demo Tecnica

**Autore:** *Simone Sugliano*
**Stato:** *In sviluppo*

---

#### Descrizione

Questo repository contiene un piccolo **tema child per WordPress**, creato come demo tcnica per mostrare competenze reali nello sviluppo WordPress tramite coice.

Il progetto include esempi pratici di:

* override dei template del tema principale
* funzioni PHP personalizzate
* layout costruiti da zero
* gestione CSS dedicata al tema child
* piccoli miglioramenti UX senza plugin esterni

**Demo online:**
[https://simone-dev.page.gd/](https://simone-dev.page.gd/)

---

#### Struttura del progetto

```
simone-dev-child/
│
├── style.css            → file principale del tema child (header + CSS)
├── functions.php        → caricamento del CSS del child theme
├── front-page.php       → override completo della home
└── single.php           → override del template degli articoli
```

---

#### Funzionalità implementate

##### 1. Override della Home (`front-page.php`)

La home page è interamente riscritta usando un template del tema child.

Include:

* layout personalizzato
* box informativo introduttivo
* griglia responsive con gli articoli recenti
* markup HTML + CSS scritti a mano

---

##### 2. Template Articoli Personalizzato (`single.php`)

Sostituisce completamente il template degli articoli del tema padre.

Aggiunge:

* box informativo con data + tempo di lettura
* impaginazione testuale migliorata
* box autore personalizzato
* **cards finali con altri articoli**, generate tramite `WP_Query`

---

##### 3. Funzioni e CSS del tema child

* intestazione corretta del child theme in `style.css`
* caricamento degli stili tramite `functions.php`
* override reale senza toccare i file del tema principale

---

#### Stato del progetto

Il progetto è **in evoluzione**: l’obiettivo è mostrare esempi di sviluppo WordPress fatti in modo pratico e leggibile, senza plugin superflui.

Prossimi step previsti:

* aggiunta di shortcode personalizzati
* funzioni extra nel child theme
* screenshot e documentazione avanzata
* eventuale pagina "Modifiche" dedicata
