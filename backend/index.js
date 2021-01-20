const express = require('express');
const bodyParser = require('body-parser');

//Configure chalk for coloured console/log output
const chalk = require('chalk');
const error = chalk.bold.red;
const warning = chalk.orange;
const info = chalk.cyan;
const success = chalk.green;
const api = chalk.yellow;
const logQuery = chalk.magenta;

//Required for .env variable use
require('dotenv').config({
  path: './.env'
});
//Import routes
const routes = require('./routes/appRoutes');

//Import Authentication
const auth = require('./auth/authentication');

const port = process.env.SERVER_PORT || 3000;
const app = express();

//Configure server to use body parser so we can retrieve data brom the body of http requestss
app.use(bodyParser.urlencoded({
  extended: true
}));
app.use(bodyParser.json());

//Set up server to use authentication 
app.use(auth);


//CORS setup middleware
app.use((req, res, next) => {
  //Enabling CORS 
  res.header('Access-Control-Allow-Origin', '*');
  res.header('Access-Control-Allow-Methods', 'GET,HEAD,OPTIONS,POST,PUT');
  res.header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, contentType,Content-Type, Accept, Authorization');
  next();
});

//This will catch errors when the server is spun up.
app.on('error', (err) => {
  console.log(error('Unable to start server, error: ', err));
});

//Register routes with server
app.use('/', routes);

//Spin up server
let server = app.listen(port, function () {
  const serverPort = server.address().port;
  console.log(success('Server now running on port: ', serverPort))
});