const {
  getScholarhipInformationById,
  insertScholarship,
  updateScholarshipById
} = require('../model/scholarships.model');

const getStudentScholarshipInformation = async (studentId) => {
  const scholarshipInformation = await getScholarhipInformationById(studentId);
  return scholarshipInformation;
}

const addScholarship = async (scholarship) => {
  await insertScholarship(scholarship);
}

const updateScholarship = async (scholarship, scholarshipId) => {
  await updateScholarshipById(scholarship, scholarshipId)
}

module.exports = {
  getStudentScholarshipInformation,
  updateScholarship,
  addScholarship
}