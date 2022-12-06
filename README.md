#PHP MVC SYSTEM
Using php to create a movie renting website <br /> <br />
With mvc structure we divide project into many folder: <br />

./bootstrap: contain bootstrap framework. <br />
./font: contain font. <br />
./img: contain img. <br />
./views: contain files to display front-end. <br />
./models: contain php files to deploy back-end. <br />
./controllers: contain php to deploy back-end. <br />
./migrations: update database. <br />
./middlewares: contain middleware. <br />
./core: contain the core classes. <br />

## SET UP
### Installation
1. To run php and mysql conveniently together install XAMPP: 
    - https://www.apachefriends.org/download.html
2. Add ~/xampp/php to Global environment variables path.
2. After that install Composer (a PHP package manager):
    - https://getcomposer.org/download/
3. Restart computer
4. Delete *vendor* folder if exist
5. Check for Composer version:
```
composer --version
```
6. Install project packages:

```
composer install
```
### Generating MySQL Database:
MySQL Config:
```
Server host : localhost
Database : ecom
Port : 3306
Username : root
Password : ''
```

### Creating dotenv

In folder project, create file .env with the following config:

```bash
DB_DSN=mysql:host=localhost;dbname=ecom
DB_USER=root
DB_PASSWORD=''
```

### Run MySQL DBMS
Turn on XAMPP
+ Start Apache
+ Start MySQL
### Run migration:
In terminal:
```bash
php migrations.php
```
The terminal should return:
```bash
[2021-10-28 19:10:49] - Applying migration m0001_initial.php
[2021-10-28 19:10:49] - Applyied migration m0001_initial.php
```

Else, drop all table in database and re-run migration
## Run project

Change the httpd.conf, 'Documentroot' both fields and restart Apache server 

```bash
~/E-com-221/public 
```

\item Github page: \href{https://github.com/Dansky0402/E-com-221.git}{Link}
    \item Set up an XAMPP server. Clear out $xampp\backslash htdocs$.
    \item Extract the supplied archive into $xampp\backslash htdocs$.
    \item Add $path\_to\_/XAMPP/php$ to Global variable path. 
    \item Install latest version of Composer in  \href{https://getcomposer.org/download/}{Link} and run "composer install" in terminal.
    \item Create .env file in the root directory of the system and add the following:
    \begin{lstlisting}[caption=Database Config, style=mystyle]
    DB_DSN=mysql:host=localhost;dbname=ecom
    DB_USER=root
    DB_PASSWORD=''
    \end{lstlisting}
    \item Start XAMPP, enable Apache and MYSQL webserver.
    \item Open terminal, run \colorbox{lightgray}{php migrations.php}. 
    If error, go to Phpmyadmin, create a table name "ecom" and repeat this step.
    \item Change Apache config, httpd.conf, 'documentroot' to the directory + /public.
    \item Restart Apache webserver and go to http://localhost and http://localhost/admin for user and admin interface. 
