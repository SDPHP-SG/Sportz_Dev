Sportz
===============

A web app for users addicted to sports.

Quick start for setting up your development environment.
---------------------------------------

- Create a new directory under your web root called "sportz".
- Clone a copy of the "develop" branch of the sportz repo to your new "sportz" directory.
- Create a mysql database using the database/sql/create_database.sql script.
- Create the database tables using the database/sql/create_tables.sql script.
- Create a new database user if needed and give the user permission to access the database.
- Modify the application/config/development/database.php file with your database and db user info.
- Add a line to your hosts file (windows only) e.g. : "127.0.0.1 gt.loc" .
- Add an entry to your http vhosts file to reflect the name you used in the hosts file e.g. :
```
<VirtualHost *:80>
   DocumentRoot "e:/www/sportz"
   ServerName sportz.loc
</VirtualHost>
```
- Modify application/config/config.php: set your base_url to the same as in your hosts file e.g "sportz.loc" .
- Remember to allow cookies for your site.
- Point your browser to the url you used in your hosts file e.g. "sportz.loc" and you should see the sportz site.

**See the docs/setup.md for more detailed instructions for setting up your environment.

Committing To The Sportz Repo
-----------------------------

See the docs/git/workflow.pdf to see the currently recommended workflow for contributing.