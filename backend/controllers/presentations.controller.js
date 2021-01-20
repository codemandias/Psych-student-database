const presentationsService = require('../services/presentations.service');
const {
  getPresentation,
  insertStudentPresentation,
  updatePresentationRecord
} = presentationsService;

const getPresentationByStudentId = async (req, res, next) => {
  const {
    query: {
      student_id
    }
  } = req;
  try {
    const presentation = await getPresentation(student_id);
    if (presentation.length > 0) {
      return res.status(200).send(presentation);
    } else return res.sendStatus(404);
  } catch (error) {
    return res.status(400).send(error);
  }
};

const createStudentPresentation = async (req, res, next) => {
  const {
    body
  } = req;
  try {
    await insertStudentPresentation(body);
    return res.sendStatus(201);
  }catch (error) {
    console.log(error.message);
    return res.status(401).send(error);
  }
}

const updatePresentationById = async (req, res, next) => {
  const {
    body,
    query: {
      presentation_id
    }
  } = req;
  try {
    await updatePresentationRecord(body[0], presentation_id);
    console.log(body[0]);
    return res.sendStatus(200);
  }catch (error) {
   console.log(error.message);
   return res.status(401).send(error);
  }
}

module.exports = {
  getPresentationByStudentId,
  createStudentPresentation,
  updatePresentationById
}