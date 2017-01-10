## GitHub API / Larevel Demo

This is a basic demo showing usage of the GitHub API. On page load, the api is called, and the database is updated with data from the most starred php repositories. Rather than sending the data directly to the client on page load, an ajax request is made to the server to get the data, and populate the table. In a real app this might be redundant, but it is to demonstrate front-end techniques in addition to the standard project requirements.

### Built Using

[Lumen](http://lumen.laravel.com)

[Vue.js](http://vuejs.org/)

[Bootstrap](http://getbootstrap.com/)

###Installation Options

[MAMP](#mamp-heading)

[Vagrant](#vagrant-heading)

###MAMP<a name="mamp-heading"></a>

####Initial Setup
- Install MAMP [from here](https://www.mamp.info/en/downloads/)
- Clone the repo to the webroot 
	- On OSX `/Applications/MAMP/htdocs/`
	- On Windows `C:\MAMP\htdocs\`
- Using the MAMP UI pane, select "Preferences" and navigate to the "Web Server" tab.
- Select "Document Root" and navigate to the project folder and select the `public` directory.
	- e.g. on OSX `/Applications/MAMP/htdocs/github_api_laravel_demo/public`

#### Database Setup
- To connect to MAMP's MySQL server from your host machine via Navicat or Sequel Pro, you should connect to `127.0.0.1` and port `8889`. 
	- The username and password is `root` / `root`.
	- You can verify the correct port from the MAMP UI pane, select "Preferences" and navigate to the "Ports" tab.
- Within your MySQL client create a database called `github_api_laravel_demo`.
- Use the raw sql in `create-repos.sql` file located in the project's `database/` directory to create the application's tables.
- Within the project's `.env` file, set the database connection information as follows.

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=8889
DB_DATABASE=github_api_laravel_demo
DB_USERNAME=root
DB_PASSWORD=root
```

> NOTE: I have included the .env file for ease of use. Always add it to your `.gitignore` file in a "real" application.

- Navigate to the web root to view the application `http://localhost:8888/`

###Vagrant<a name="vagrant-heading"></a>
#### Initial Setup
- Download and install Vagrant following the instructions [here](https://www.vagrantup.com/docs/installation/) (requires VirtualBox)
- Follow the instructions [here](https://laravel.com/docs/5.2/homestead) to download and configure the Laravel Homestead.
- Once installed clone this repo to the shared directory that you configured when [configuring Homestead](https://laravel.com/docs/5.2/homestead#configuring-homestead).
- In your `Homestead.yaml` file map the project to a domain of your choice (e.g. github_api_laravel_demo.app).

```
sites:
    - map: github_api_laravel_demo.app
      to: /home/vagrant/Code/github_api_laravel_demo/public
```

- Edit your hosts file, adding an entry for the domain `192.168.10.10  github_api_laravel_demo`
	- On Mac and Linux, this file is located at `/etc/hosts`. On Windows, it is located at `C:\Windows\System32\drivers\etc\hosts`.

#### Launching the VM

- Run `vagrant up` from inside the `Homestead` directory
	- (From when you cloned it in the "Installing Homestead" section [here](https://laravel.com/docs/5.2/homestead#first-steps))

#### Database Setup
- To connect to Homestead's MySQL server from your host machine via Navicat or Sequel Pro, you should connect to `127.0.0.1` and port `33060`. 
	- The username and password is `homestead` / `secret`.
- Within the projects `.env` file, set the database connection information as follows.
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=github_api_laravel_demo
DB_USERNAME=homestead
DB_PASSWORD=secret
```
> NOTE: I have included the .env file for ease of use. Always add it to your `.gitignore` file in a "real" application.

- Navigate to the web root to view the application `http://localhost:8888/`
- Run `vagrant ssh` to ssh into the machine and `cd` into the shared directory then into the project.
	- e.g. `cd Code/github_api_laravel_demo`
- Run `php artisan migrate` to create the database tables
- Now navigate to the application (`github_api_laravel_demo.app`)
