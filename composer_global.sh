<<<<<<< HEAD
=======
#!/bin/sh
>>>>>>> 1283aaa (first)
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
php -r "unlink('composer.lock');"
rm composer.lock
rm package-lock.json

<<<<<<< HEAD
#cs fixer
php -d memory_limit=-1 composer.phar global require -W friendsofphp/php-cs-fixer
php -d memory_limit=-1 composer.phar global require -W phpro/grumphp
php -d memory_limit=-1 composer.phar global require -W --dev larastan/larastan
=======
#cs fixer 
php -d memory_limit=-1 composer.phar global require -W friendsofphp/php-cs-fixer
#grumphp
php -d memory_limit=-1 composer.phar global require -W phpro/grumphp
#phpstan
php -d memory_limit=-1 composer.phar global require -W --dev nunomaduro/larastan
>>>>>>> 1283aaa (first)
php -d memory_limit=-1 composer.phar global require -W --dev phpstan/phpstan
