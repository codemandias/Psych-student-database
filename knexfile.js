const connection = require('./backend/database');
require('dotenv').config({
	path: __dirname + '/.env'
});

module.exports = {

	development: {
		client: 'mysql',
		version: '5.7.18',
		connection: {
			host: process.env.DB_HOST,
			user: process.env.DB_USER,
			database: process.env.DB_NAME,
			password: process.env.DB_PASSWORD,
			port: process.env.DB_PORT
		},
		migrations: {
			tableName: 'migrations',
			directory: './database/migrations/'
		},
		debug: true
	},

	staging: {
		client: 'postgresql',
		client: 'mysql',
		version: '5.7.29',
		connection: {
			host: process.env.DB_HOST,
			user: process.env.DB_USER,
			database: process.env.DB_NAME,
			password: process.env.DB_PASSWORD,
			port: process.env.DB_PORT
		},
		migrations: {
			tableName: 'migrations',
			directory: './database/migrations/'
		}
	},

	production: {
		client: 'mysql',
		version: '5.7.29',
		connection: {
			host: process.env.DB_HOST,
			user: process.env.DB_USER,
			database: process.env.DB_NAME,
			password: process.env.DB_PASSWORD,
			port: process.env.DB_PORT
		},
		migrations: {
			tableName: 'migrations',
			directory: './database/migrations/'
		}
	}

};