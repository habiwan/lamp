# lamp
simple lamp on portainer demo

made for bazzite / podman

Create /var/home/$USER/lamp/www and place index.php there:

On your bazzite host, create the directory and copy index.php into it (or pull your repo and copy www/index.php to /var/home/$USER/lamp/www/index.php):

Bash

mkdir -p "/var/home/$USER/lamp/www"
cp www/index.php "/var/home/$USER/lamp/www/index.php"


