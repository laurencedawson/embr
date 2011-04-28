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

Development Installation
-------

1. Deploy Codeigniter 2.0.2 to your site

2. Install [CI Template Library](http://williamsconcepts.com/ci/codeigniter/libraries/template/) - instructions can be viewed online [here](http://williamsconcepts.com/ci/codeigniter/libraries/template/start.html).

3. Edit application/config/config.php (line 17) to match your base URL

4. Clone codeigniter-blog

		$ git clone git://github.com/laurencedawson/codeigniter-blog.git


5. Merge the contents of /codeigniter-blog with the base of your active CI installation

6. Create a new database and import 'tables.sql'; update your database details in application/config/database

7. Edit the values in appication/config/blog.php (sign up with [DISQUS](http://disqus.com/admin/register/) if you haven't already registered your site)

Automated Installation
-------
1. Execute this mammoth script:

		$ curl -OL https://github.com/philsturgeon/codeigniter-reactor/tarball/master && tar -zxvf master && mv philsturgeon-codeigniter-reactor-*/* . && rm master && rm -r phil* && curl -OL https://github.com/laurencedawson/codeigniter-blog/tarball/master && tar -zxvf master && rm master && cd laurencedawson-codeigniter-blog-* && ditto application ../application && rm -r application && mv * .. && mv .htaccess .. && cd .. && rm -r laurencedawson-codeigniter-blog-* && cd application && curl -OL http://williamsconcepts.com/ci/codeigniter/libraries/template/Template_1.4.1.zip && unzip Template_1.4.1.zip -x config/template.php views/template.php && rm Template_1.4.1.zip

2. Edit application/config/config.php (line 17) to match your base URL

3. Edit the values in appication/config/blog.php (sign up with [DISQUS](http://disqus.com/admin/register/) if you haven't already registered your site)

4. Create a new database and import 'tables.sql' (or 'example.sql'); update your database details in application/config/database


      
Features Comming Soon
-------

      - Graphical CMS
      
      - META tags
      
      - Facebook Graph Tags