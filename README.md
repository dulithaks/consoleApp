## Console application
The PHP console application is written for code challenge.

### How to setup
I have used composer to keep packages. So please use below command to setup the project
- ``composer install``
  

### How to run application
Please run below command inside the project folder to start the program. 
Then follow the instructions.

- ``php challenge.php``

### How to run tests
- ``vendor/bin/phpunit tests``


### Assumptions
- I assume that organization's user name is that name associate with tickets's submitter user.
- The true/false search keys expect 0 or 1 as input. For the time being no validation is implemented.

### Software versions 
The software versions used;
- PHP 7.3.2
- PHPUnit 9.0.1

### Todo
- Empty result is displayed as empty table. It is better to show proper message.