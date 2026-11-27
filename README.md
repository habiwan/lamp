# lamp
simple lamp on portainer demo

made for bazzite / podman

Create /var/home/$USER/lamp/www and place index.php there:

On your bazzite host, create the directory and copy index.php into it (or pull your repo and copy www/index.php to /var/home/$USER/lamp/www/index.php):

Bash

mkdir -p "/var/home/$USER/lamp/www"

cp www/index.php "/var/home/$USER/lamp/www/index.php"

In Portainer under the lamp stack's Environment variables, add 
WWW_HOST_PATH=/var/home/<youruser>/lamp/www 
HTTP_PORT=8080
MYSQL_ROOT_PASSWORD=mysql_root_secure_password
MYSQL_DATABASE=lamp
MYSQL_USER=mysql_user
MYSQL_PASSWORD=mysql-user_password
