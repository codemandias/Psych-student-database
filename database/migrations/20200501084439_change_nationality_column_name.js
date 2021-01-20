exports.up = function (knex, Promise) {
  return (
    knex.schema.alterTable('student', function (table) {
      table.renameColumn('nationality', 'is_foreign')
    })
  );
};

exports.down = function (knex, Promise) {
  return (
    knex.schema.alterTable('student', function (table) {
      table.renameColumn('is_foreign', 'nationality')
    })
  );
};