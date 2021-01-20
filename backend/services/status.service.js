const {
  getStatusRecordById,
  insertStatusRecord,
  updateStatusRecordById
} = require('../model/status.model');

const getStatusRecord = async (studentId) => {
  const status = await getStatusRecordById(studentId);
  return status;
}

const addStatusRecord = async (statusRecord) => {
  await insertStatusRecord(statusRecord);
}

const updateStatusRecord = async (statusRecord, statusId) => {
  await updateStatusRecordById(statusRecord, statusId)
}

module.exports = {
  getStatusRecord,
  addStatusRecord,
  updateStatusRecord
}