APP MCV
=======

Handmade PHP MVC Framework for our ISEP web development course (2017). 

Development
-------------

To start developing with this framework, serve the `app` folder with a web server, or simply use Docker. 

### Development with Docker

To develop with Docker, you need to install Docker and Docker-Compose. 
Then use `docker-compose up` to run docker containers all together.

The site will be served on port 8080.

### Development with Wamp

Go to the system tray, and navigate in the Wamp menu -> Apache -> httpd-vhosts.conf
Replace lines 6 and 7 `/ www` by` / www / APPMVC / app / www`
Save, restart Apache service and go to the address `http: // localhost: 8080`
