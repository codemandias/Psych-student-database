const request = require("request");

const chalk = require('chalk');
const info = chalk.yellow;

require('dotenv').config();

var options = {
  method: 'POST',
  url: `https://${process.env.AUTH0_DOMAIN}/oauth/token`,
  headers: {
    'content-type': 'application/x-www-form-urlencoded'
  },
  form: {
    grant_type: 'client_credentials',
    client_id: `${process.env.CLIENT_ID}`,
    client_secret: `${process.env.CLIENT_SECRET}`,
    audience: `${process.env.AUTH0_AUDIENCE}`
  }
};

request(options, function (error, response, body) {
  if (error) throw new Error(error);
  console.log(info("This method of acquiring an Auth0 Token will need to be replaced with Implicit Grant Flow when a UI is implemented.\nThe current method (Client Credentials Flow) was used due to the lack of a Frontend/UI.\nCurrently this method uses a Client ID/Secret to authenticate.\nThis will be replaced with a user's Username/Password in the Implicit Grant Flow.\nSee https://auth0.com/docs/api-auth/which-oauth-flow-to-use for more info.\n\nThe response you probably typed the command for: "))
  console.log(body);
});