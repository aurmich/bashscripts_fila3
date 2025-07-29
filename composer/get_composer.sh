<<<<<<< HEAD
#!/bin/sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
=======
#!/bin/sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
>>>>>>> c142b7c (.)
php -r "unlink('composer-setup.php');"