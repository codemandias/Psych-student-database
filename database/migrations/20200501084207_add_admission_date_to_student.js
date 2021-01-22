exports.up = function(knex, Promise) {
	return (
		knex.schema.alterTable('student', function(table) {
			table.string('admission_date').nullable()
		})
	);
};

exports.down = function(knex, Promise) {
	return (
		knex.schema.alterTable('student', function(table) {
			table.dropColumns(['admission_date'])
		})
	);
};