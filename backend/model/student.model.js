const database = require('../database');

const getStudentRecordById = async (studentId) => {
  const data = await database.select('first_name', 'last_name', 'gender', 'email', 'degree_type', 'program_type', 'photo_id').from('student').where('student_id', studentId);
  return data;
}

const insertStudentRecord = async (studentRecord) => {
  await database('student').insert(studentRecord);
}

const updateStudentRecordById = async (studentRecord, studentId) => {
  if (studentId) {
    if (await database('student').where('student_id', studentId).update(studentRecord) === 0) {
      throw `Error: Student id ${studentId} does not exist, could not update record.`;
    }
  } else {
    throw 'Error: Missing student id parameter in HTTP request.';
  }
}

module.exports = {
  getStudentRecordById,
  insertStudentRecord,
  updateStudentRecordById
}