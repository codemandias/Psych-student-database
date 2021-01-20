require('dotenv').config({
  path: __dirname + '/.env'
});

//Configure chalk for coloured log output
const chalk = require('chalk');
const err = chalk.bold.red;

//Configure the database using knex query builder

try {
  module.exports = require('knex')({
    client: 'mysql',
    version: '5.7.29',
    connection: {
      host: process.env.DB_HOST,
      user: process.env.DB_USER,
      database: process.env.DB_NAME,
      password: process.env.DB_PASSWORD,
      port: process.env.DB_PORT
    },
    insecureAuth: true,
    debug: true
  });
} catch (error) {
  console.log(err(error));
}