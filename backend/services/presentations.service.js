const {
    getPresentationByStudentId,
    insertPresentation,
    updatePresentation
  } = require('../model/presentations.model');
  
  const getPresentation = async (studentId) => {
    try {
      const presentation = await getPresentationByStudentId(studentId);
      return presentation;
    } catch (error) {
      console.log(error);
    }
  }

  const insertStudentPresentation = async (presentation) => {
    await insertPresentation(presentation);
  }

  const updatePresentationRecord = async (presentation, studentId ) => {
    await updatePresentation (presentation, studentId);
  }

  module.exports = {
    getPresentation,
    insertStudentPresentation,
    updatePresentationRecord
  }