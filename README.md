[![Board Status](https://dev.azure.com/x691w21d1/242d51e0-eb18-4ceb-941f-468ee7abe630/2e43c3d5-a92c-4f5e-9029-48ae374c6b92/_apis/work/boardbadge/6313a900-19bb-4b09-92a8-44f2890d512c?columnOptions=1)](https://dev.azure.com/x691w21d1/242d51e0-eb18-4ceb-941f-468ee7abe630/_boards/board/t/2e43c3d5-a92c-4f5e-9029-48ae374c6b92/Microsoft.RequirementCategory/)

# How to initialize the backend

1. Clone repo in to local repository.

2. Navigate to new repository in your terminal.

* If you do not have Yarn add it now by running `brew install yarn` OR `curl -o- -L https://yarnpkg.com/install.sh | bash` OR [Go to Yarn Documentation](https://classic.yarnpkg.com/en/docs/install#mac-stable) For more info.

3. Run command `yarn` to acquire or update all required dependencies.

**Note you may have to configure the .env variable in the root project folder to match your setup**

* Create a file called .env in the root folder, structure it as follows :

```
# Server/Environment setup
NODE_ENV = the type of environment i.e: development or production

# Database Setup
SERVER_PORT = some port.. (8080 would be good)
DB_PORT = check your dbms setup if you're unsure
DB_USER = your mysql username
DB_PASSWORD = your mysql password
DB_HOST = an ip address, or localhost, check your dbms or mysql config
DB_NAME = the name of the database

# Auth0 Credentials
AUTH0_DOMAIN = The domain for auth0 with respect to our API.
AUTH0_AUDIENCE = The fully realized path for auth0 with respect to our API.
CLIENT_ID = Our Client ID
CLIENT_SECRET = Our Client Secret.
```

**You do not require quotations or anything when specifying .env variables**

4. Run `yarn start` to spin up server.

**NOTE:**
* A common bug we encountered when using .env variables to connect to the database (or setting up knex) was:

```json
{
    "code": "ER_ACCESS_DENIED_ERROR",
    "errno": 1045,
    "sqlMessage": "Access denied for user 'root'@'localhost' (using password: YES)",
    "sqlState": "28000",
    "fatal": true
}
```

Or a similar authorization error. In order to resolve this (after you have double checked your .env variables are correct) is to reset the user privileges by running the command:

```sql
ALTER USER 'YOUR_USERNAME'@'localhost' IDENTIFIED WITH mysql_native_password BY 'YOUR_PASSWORD';
```

followed by:

``` sql
flush privileges;
```

5. Download Postman to test out the API functionality <https://www.postman.com>

6. In order to use postman to test the API you will require an authorization token as the API is secured using Auth0. To retrieve this token open a second terminal, navigate to the project root folder and enter the command `yarn get-token`. Use the returned access_token with your http request in Postman by navigating to Authorization tab and then selecting Bearer Token under Type, and pasting the token in to the token field.

# Set up the database

* All scripts mentioned below are located in the database folder in the root project directory.
* Ensure the database name in the .env file matches that of your database.

1. Run the sql script contained in the database-creation-script.sql file (or import it into your DBMS)

2. Export all of the excel files provided by the client to .csv format.
* Ensure the names of the files are : Awards, CompProjects, Status, StudentAdmission, SupervisorInfo

3. Import the .csv files in to the database as their own respective tables.

4. Run the command in your terminal `knex migrate:latest`

# Utilize knex.js to create a migration file (a migration file is used to create changes to the database, this method must be employed for any changes to the database so they can be tracked and rolled forward/back if necessary).

1. Use the terminal command `knex migrate:make your_migration_name`

* This will create a file in the database/migrations folder named with a random prefix then your chosen name.

* The code to create the migration goes inside the exports.up section and the code to undo it goes inside the exports.down section:

## This is an example of how to add (during a migration) and (during a rollback) remove two columns (email and photo_id) from the student table.

``` javascript
exports.up = function (knex, Promise) {
  return (
    knex.schema.alterTable('student', function (table) {
      table.string('email').nullable(),
        table.string('photo_id').nullable()
    })
  );
};

exports.down = function (knex, Promise) {
  return (
    knex.schema.alterTable('student', function (table) {
      table.dropColumns(['email', 'photo_id'])
    })
  );
};
```

* Go to <http://knexjs.org> to read the documentation and see every possible example in existance of how to use knex.js .

2. In order to run your migration and make the update/change to the database use the terminal command `knex migrate:latest`

* This will run all migrations

3. If necessary you can rollback the migrations by entering the following command in the terminal `knex migrate:rollback`

# Testing 

* The API can be tested by importing the file (API-COMPLETE-TEST-USE-POSTMAN.json) file into Postman and running it as a collection. This will verify that the API is still working properly or conversely inform you of any errors. 
