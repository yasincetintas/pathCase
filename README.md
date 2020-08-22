
<!-- ABOUT THE PROJECT -->
## About The Project
Php Order  System.


<!-- GETTING STARTED -->
## Getting Started
### Prerequisites

This is  you need to use the softwares
* postresql
* openssl
* php
* composer

### Installation

```sh
git clone https://github.com/yasincetintas/pathCase.git
```
3. Install Symfony packages
```sh
php bin/console composer install
```


<!-- Xammpp Configure -->
## Xammpp Configure

Path  : C:\xampp\apache\conf\extra\httpd-vhosts.conf

```sh
<VirtualHost *:80>
		ServerName path.local
        DocumentRoot "C:\xampp\htdocs\pathCase\public"
        <Directory "C:\xampp\htdocs\pathCase\public">
			Options Indexes FollowSymLinks MultiViews
			AllowOverride None
			Order allow,deny
			allow from all
			<IfModule mod_rewrite.c>
				RewriteEngine On
				RewriteCond %{REQUEST_FILENAME} !-f
				RewriteRule ^(.*)$ index.php [QSA,L]
			</IfModule>
		</Directory>
        LogLevel warn
		SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1
</VirtualHost>
```

Path  : C:\Windows\System32\drivers\etc\hosts

```sh
127.0.0.1	path.local
```

<!-- USAGE EXAMPLES -->
## Usage

* Example Database Data and Table : [Database](https://github.com/yasincetintas/pathCase/blob/master/Postman/Yasin%20Cetintas%20Path%20Case.postman_collection.json)
* Postman Collection : [Postman Collection Path](https://github.com/yasincetintas/pathCase/blob/master/Postman/Yasin%20Cetintas%20Path%20Case.postman_collection.json)
* How to install or Generate OpenSSL : [Documentation](https://emirkarsiyakali.com/implementing-jwt-authentication-to-your-api-platform-application-885f014d3358?source=social.tw )

<!-- CONTACT -->
## Contact

Yasin Çetintaş - [@Linkedin  Profile](https://www.linkedin.com/in/yasincetintas/) - ysnctnts@gmail.com

