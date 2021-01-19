##Installation Instructions

#Follow these steps to install the application:

Edit your 'Homestead.yaml' and the following: - map: college.api to:
/home/vagrant/WAF/MyLaravelProjects/CollegeApi/public. Also create the database in the Homestead.yaml 
file: - college_api

Next, duplicate '.env.example' and name it'.env'
Open .env and set the DB_DATABASE to the database you created in the Homestead yaml file and set the username and password to the correct credetentials.

Then run vagrant reload --provision to refresh the Homestead environment. Add college.api to your hosts file.

In the Homestead environment, cd into the application folder and run the following:

composer install
npm install
php artisan key:generate
php artisan passport:install

Then migrate and seed the database:

php artisan migrate --seed

And then initialise, add, and commit to Git:

git init
git add .
git commit -m "Initial commit"

Set your own remote repo and push your commits.
