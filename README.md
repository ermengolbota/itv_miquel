# MyITV #

MyITV allows you to create and manage ITV appointments with IAMotors.

## Flux ##
[Moqup](https://app.moqups.com/a15aracarjim@iam.cat/KabVlsjmo6/view)

## Day to day progress ##
[Google Doc](https://docs.google.com/spreadsheets/d/1od5VMq7LUFvB5YwrHTJeQLIcSghE2O_U5xCjoScAMh4)

## Labs URL ##
[Labs](http://labs.iam.cat/~a15miqvidgom/myitv/)

## Getting Started ##

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites ###
- A web server
- An empty database

### Installing ###
1. On your web server navigate to your web directory, and use the next command: git clone https://a15miqvidgom@bitbucket.org/a15miqvidgom/myitv.git
2. Create a new empty database, we recommend the name 'IAMotors'
3. Import on your database the file createDatabase.sql located on the path myitv/doc/sql
  * IMPORTANT, if the recommended name can't or it's not used, change the first line of the file to USE [used database name];
4. [Optional] If you want test data, import on your database the file testData.sql located on the path myitv/doc/sql
  * IMPORTANT, if the recommended name can't or it's not used, change the first line of the file to USE [used database name]; 
5. [Optional] If you want to change password of the admin part, we recommend doing so, navigate to the myitv directory an run the following command: htpasswd .htpasswd admin
6. Change the the variables $db_database, db_username, and db_password, located on the path myitv/php/config.php to fit your database
7. Change the permissions, at least, on the web directory to 755

## Running the tests ##
WIP

### Break down into end to end tests ###
WIP

### And coding style tests ###
WIP

## Deployment ##
WIP

## Built With ##
WIP

## Contributing ##
Please read CONTRIBUTING.md for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning ##
WIP

## Authors ##
* Joan Calafat Sastre
* Arantxa Cardona Jim�nez
* Miquel Vidal Gomila

## License ##
This project is licensed under the GPLv3 - see the [LICENSE.md](https://bitbucket.org/a15miqvidgom/myitv/src/09529a05e822ba19ef24e9dda9035bbafccc9eb2/LICENSE.md) file for details.

## Acknowledgments ##
WIP
