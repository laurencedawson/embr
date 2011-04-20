About
-------
Lightweight blog built using the CodeIgniter framework. As it's very early days the list of features is very minimal but currently supports: Basic posts, post indexing and recent posts. Commenting provided by Disqus. Currently there is no graphical CMS for post creation, deletion etc - SQL for now.

Example
-------
A working example can be viewed [here](http://blog.laurencedawson.com/).

Requires
-------
[Codeigniter 2.0.2](http://codeigniter.com/download_files/reactor/CodeIgniter_2.0.2.zip)

[CI Template Library](http://williamsconcepts.com/ci/codeigniter/libraries/template/)

Installation
-------

1. Deploy Codeigniter 2.0.2 to your site

2. Install [CI Template Library](http://williamsconcepts.com/ci/codeigniter/libraries/template/) - instructions can be viewed online [here](http://williamsconcepts.com/ci/codeigniter/libraries/template/start.html).

3. Copy the contents of application to your CI application directory

4. Copy the themes directory to the base of your install

5. Create a new database and import 'tables.sql'; update your database details in application/config/database

6. Edit the values in appication/config/blog.php

7. Copy the contents of htaccess.txt into the .htaccess file in the base of your installation, swapping blog.laurencedawson.com for your site domain

      
Features Comming Soon
-------

      - Graphical CMS
      
      - META tags
      
      - Facebook Graph Tags