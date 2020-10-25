### Task
Creare un semplice report che mostri le transazioni per un customer id
specificato come argomento da linea di comando.

# Ambiente di sviluppo
Vagrant + Homestead + Laravel 7
Si rimanda alle documentazioni ufficiali per la configurazione degli strumenti sopra elencati

# Installazione
git clone https://github.com/devstefanoricci/task-transactions.git

```
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate 
php artisan db:seed

```
Nel file creato .env modificare DB_CONNECTION=sqlite
Creare un file database.sqlite nella cartella database del progetto

# Funzionamento
```
php artisan serve
Attiva un webserver del progetto

tutti i Customers
127.0.0.1:8000/customers

singolo Customer
127.0.0.1:8000/customers/1

tutti le Transazioni
127.0.0.1:8000/transactions

singola Transazione
127.0.0.1:8000/transactions/1

tutte le Transazioni per Customer
127.0.0.1:8000/customers/1/transactions/
```


# Comandi
Dalla Root del progetto è possibile digitare il comando curl per leggere le risposte ed eventualmente redirezionare l'output verso un file (.json):
Il progetto è configurato per un environment locale, quindi con un pacchetto di debug attivo