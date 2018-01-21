# MVC Frameworks README - Bas Schoenmaker

Important to note is that the start of this project is a School Project. The framework that has been used for this 
project is Phalcon. You can find the full documentation of Phalcon [here](https://docs.phalconphp.com/en/3.2).

## Contents

- [Setup](#setup)
  - [Windows](#windows)
- [OTAP](#otap)
  - [Production](#production)
- [Disclaimer](#disclaimer)

### Setup

Phalcon should require little effort to set up. 
For the instalation on Phalcon on Windows you can see the documentation below, else please see the [Phalcon](https://phalconphp.com/en/) website.

### Windows

To install Phalcon on Windows:

1. Download [Phalcon for Windows](https://phalconphp.com/en/download/windows)
2. Extract the DLL file and copy it to your PHP extensions directory
3. Edit your **php.ini** file and add this line:
   ```ini
   extension=php_phalcon.dll
   ```
4. Finally, restart your web server

**Hint:** To ensure that your Phalcon installation was successful, debug with
```php
<?php phpinfo(); ?>
```
and search for a section mentioning the [Phalcon](https://phalconphp.com/en/) extension.


### Production
To succesfully run Phalcon for yourself, please be aware of the following:

Since this project is created with the use of the framework [Phalcon](https://phalconphp.com/en/) it is important to note that PHP has to be enabled on your
hosting platform / system. If you are unsure of this, please contact your host.
tekst

### Disclaimer
Please be aware that this Github repository is part of a school project. 
