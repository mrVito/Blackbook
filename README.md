# Blackbook

A test application to compare front-end frameworks

## How can I run this?

First you need to clone this repo. Anywhere.

Then just cd into the project dir and run `vagrant up`.
Wait for it to download the box and install...

After that's done, run `vagrant ssh` and cd into `/var/www` dir.

While in that directory run `composer install` and `npm install` (optional),

Then cd into `db` dir and run `bash migrate.sh`.

When all of that is done exit the ssh session and add these entries into your`/etc/hosts` file:

    192.168.30.100 jquery.blackbook.dev
    192.168.30.100 angular.blackbook.dev
    192.168.30.100 vue.blackbook.dev
    
You can change the IP address in `vagrant/vagrant.yml` file.

You're all done! Test the app by visiting jquery.blackbook.dev for jQuery version,
angular.blackbook.dev for Angular.js version and vue.blackbook.dev for Vue.js version.
