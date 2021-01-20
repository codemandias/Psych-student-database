const {
  getStudentRecordById,
  insertStudentRecord,
  updateStudentRecordById
} = require('../model/student.model');

const getStudentRecord = async (studentId) => {
  const student = await getStudentRecordById(studentId);
  return student;
}

const addStudentRecord = async (studentRecord) => {
  await insertStudentRecord(studentRecord);
}

const updateStudentRecord = async (studentRecord, studentId) => {
  await updateStudentRecordById(studentRecord, studentId)
}

module.exports = {
  getStudentRecord,
  addStudentRecord,
  updateStudentRecord
}