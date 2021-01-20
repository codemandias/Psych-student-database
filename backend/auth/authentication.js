// This file uses Auth0 2.0 to authenticate against the auth0 database. 
// The code below provides a dynamically allocated signing token.
// Considering we do not have a front end, this ensures the authentication of our API 
// The client secret, and client id will be stored using .env variables. 
// Going forward this must be changed to the 'Implicit Grant Flow' methodology of using Auth0 when a frontend is added.

var jwt = require('express-jwt');
var jwks = require('jwks-rsa');

var auth = jwt({
  secret: jwks.expressJwtSecret({
    cache: true,
    rateLimit: true,
    jwksRequestsPerMinute: 5,
    jwksUri: `https://${process.env.AUTH0_DOMAIN}/.well-known/jwks.json`
  }),

  // Validate the audience and the issuer.
  audience: process.env.AUTH0_AUDIENCE,
  issuer: `https://${process.env.AUTH0_DOMAIN}/`,
  algorithms: ['RS256']
});




module.exports = auth;