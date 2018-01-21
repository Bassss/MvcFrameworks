# MVC Frameworks README - Bas Schoenmaker

Important to note is that the start of this project is a School Project. The framework that has been used for this 
project is Phalcon. You can find the full documentation of Phalcon [here](https://docs.phalconphp.com/en/3.2).

## Contents

- [Setup](#setup)
  - [Windows](#windows)
- [OTAP](#otap)
- [Production](#production)

### Setup

/// iets?

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
and search for a section mentioning the Phalcon extension.

### OTAP

Since this project is created with the use of the framework Phalcon it is important to note that PHP has to be enabled on your
hosting platform / system. If you are unsure of this, please contact your host.


### Production

tekst
```
if (isAwesome){
  return true
}
```
