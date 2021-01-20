const database = require('../database');

const getScholarhipInformationById = async (studentId) => {
  const data = await database.select(
    'scholarship_id',
    'scholarship_name',
    'scholarship_type',
    'scholarship_start_date',
    'amount',
    'scholarship_duration',
    'notes'
  ).from('scholarships').where('student_id', studentId)
  return data;
}

const insertScholarship = async (scholarship) => {
  await database('scholarships').insert(scholarship);
}

const updateScholarshipById = async (scholarship, scholarshipId) => {
  if (scholarshipId) {
    if (await database('scholarships').where('scholarship_id', scholarshipId).update(scholarship) === 0) {
      throw `Error: scholarship id ${scholarshipId} does not exist, could not update record.`;
    }
  } else {
    throw 'Error: Missing scholarship id parameter in HTTP request.';
  }
}

module.exports = {
  getScholarhipInformationById,
  insertScholarship,
  updateScholarshipById
}