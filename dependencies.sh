sudo dnf update
sudo dnf upgrade
sudo dnf install git mariadb mariadb-server composer nginx vim

mysql_secure_installation

echo "PATH='$PATH:$HOME/.composer/vendor/bin'" >> ~/.bashrc
source ~/.bashrc

composer global require "laravel/installer"

mkdir Git
cd Git
git clone https://github.com/BraydonKains/GameGab.git
cd GameGab
composer update
