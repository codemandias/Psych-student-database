exports.up = function (knex) {
  return knex.schema.dropTableIfExists('admissions')
    .then(function () {
      return knex.schema.createTable("admissions", table => {
        table.increments('admission_id').primary();
        table.string("student_id").references('student.student_id');
        table.string("is_foreign");
        table.string("previous_degree");
        table.string("previous_school");
        table.string("admission_gpa");
        table.string("admission_date");
      })
    })
    .then(
      function () {
        return knex.raw('insert into admissions (student_id) select student_id from student;')
      }
    )
    .then(
      function () {
        return knex.raw('update admissions set is_foreign = (select is_foreign from student where student.student_id = admissions.student_id);')
      }
    )
    .then(
      function () {
        return knex.raw('update admissions set previous_degree = (select student.previous_degree from student where student.student_id = admissions.student_id);')
      }
    )
    .then(
      function () {
        return knex.raw('update admissions set previous_school = (select student.previous_school from student where student.student_id = admissions.student_id);')
      }
    )
    .then(
      function () {
        return knex.raw('update admissions set admission_gpa = (select student.admission_gpa from student where student.student_id = admissions.student_id);')
      }
    )
    .then(
      function () {
        return knex.raw('update admissions set admission_date = (select StudentAdmission.AdmissionDate from StudentAdmission where StudentAdmission.__primarykey_studentDalID = admissions.student_id);')
      }
    )
    .then(function () {
      return knex.schema.dropTable('StudentAdmission');
    })

};

exports.down = function (knex) {
  return knex.schema.dropTable('admissions');
};