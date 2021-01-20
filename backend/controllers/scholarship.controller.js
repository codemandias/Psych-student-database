const scholarshipService = require('../services/scholarship.service');
const {
  getStudentScholarshipInformation,
  addScholarship,
  updateScholarship
} = scholarshipService;

const getScholarshipByStudentId = async (req, res, next) => {
  const {
    query: {
      student_id
    }
  } = req;
  try {
    const scholarship = await getStudentScholarshipInformation(student_id);
    return res.status(200).send(scholarship);
  } catch (error) {
    return res.status(400).send(error);
  }
};

const createScholarship = async (req, res, next) => {
  const {
    body
  } = req;
  try {
    await addScholarship(body[0]);
    return res.sendStatus(201);
  } catch (error) {
    console.log(error.message);
    return res.status(401).send(error);
  }
}

const updateScholarshipById = async (req, res, next) => {
  const {
    body,
    query: {
      scholarship_id
    }
  } = req;
  try {
    await updateScholarship(body[0], scholarship_id);
    return res.sendStatus(200);
  } catch (error) {
    console.log(error.message);
    return res.status(401).send(error);
  }
}

module.exports = {
  getScholarshipByStudentId,
  createScholarship,
  updateScholarshipById
}