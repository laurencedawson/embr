 #! /bin/sh

# alert the user
echo "Setting up embr";
# grab a copy of ci reactor
curl -OL https://github.com/philsturgeon/codeigniter-reactor/tarball/master
# extract the tarball
tar -zxvf master
# remove the tarball
rm master
# copy the system folder into embr
cp -r philsturgeon-codeigniter-reactor-*/system system 
# merge cis application folder with embrs 
cp -nr philsturgeon-codeigniter-reactor-*/application/* application/ 
# remove the ci folder
rm -r philsturgeon-codeigniter-reactor-*/
# move into the app folder
cd application
# grab a copy of the ci templater
curl -OL http://williamsconcepts.com/ci/codeigniter/libraries/template/Template_1.4.1.zip
# unzip the archive
unzip Template_1.4.1.zip -x config/* docs/* views/*
# remove the template folder
rm Template_1.4.1.zip

# change directory
cd config
# clear the screen
clear

# print welcome info
echo "\n\nWelcome to embr!\n\n"

# ask for the username 
echo "Enter your database username:"
# get the username 
read line
# set the username in the database file
perl -pi -e 's/USERNAME/'$line'/g' 'database.php'

# ask for the password 
echo "\nEnter your database password:"
# get the password
read line
# set the password in the database file
perl -pi -e 's/PASSWORD/'$line'/g' 'database.php'

# set the cache as writable
cd ..
chmod 777 cache

# tell the user the default account details
echo "\nThe default email login is: test@embr.co\n";
echo "\nThe default password is: qwerty\n";


# all done
echo "\nembr is ready to go, have fun!\n";