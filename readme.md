
# ECF Studi - Zoo Arcadia

L'application a été déployée dans le cadre de ma formation Studi Graduate Développeur Flutter. 
/ This app was designed for a Graduate in Web Dev.
## Author / Auteur

- Loris Buchelet - [@Pandaru62](https://github.com/Pandaru62/studi-arcadia)





## Run Locally / En local

Clone the project / Cloner le projet

```bash
  git clone https://github.com/Pandaru62/studi-arcadia.git
```

Go to the project directory / Aller dans le dossier du projet

```bash
  cd my-project
```

Make sure composer is installed, if not go to terminal and type : / Assurez-vous que composer soit intallé, sinon tapez sur le terminal :

```
composer update
composer install
```

If you get an error, check your php.ini file and make sure both lines are present or uncommented
/ En cas d'erreur vérifiez le fichier php.ini et vérifiez si les lignes ci-dessous sont présentes ou non commentées.

> extension=mysqli
> extension=mongodb


If you need to install mongodb, download the php driver for mongodb
https://pecl.php.net/package/mongodb 
Then extract the 'php_mpngodb.dll' file into the extension folder used by your php.ini config.

Install dependencies / Installer les dépendances

Make sure Node.js is installed, if not go to https://nodejs.org

```bash
  npm install
```

Start the server / Démarrer le serveur

```bash
  npm run 
```


## Environment Variables

To run this project, you need to create a .env file at the root of your folder and add the following environment variables.

### Env Variables for e-mail

`SMTP_HOST` (example: smtp.gmail.com)

`SMTP_PORT` (587 by default)

`SMTP_USER` (your e-mail address)

`SMTP_PASS` (your e-maiil address' password)

### Env Variables for Mysql DB connection (locally)

`MYSQL_HOST` (example: localhost)
`MYSQL_USER`
`MYSQL_PASSWORD`
`MYSQL_DBNAME`
`MYSQL_PORT`

### Else, when deploying if using JAWSDB, you can use:

`JAWSDB_URL`

### Env Variables for Mongo DB Connection 

`MONGODB_URI`