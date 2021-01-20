const {
  getSupervisors,
  createSupervisor,
  updateSupervisor
} = require('../model/supervisor.model');

const getStudentSupervisors = async (studentId) => {
  const supervisorData = await getSupervisors(studentId);
  return supervisorData;
}

const createStudentSupervisor = async (supervisor) => {
  await createSupervisor(supervisor);
}

const updateStudentSupervisor = async (supervisorData, supervisorId) => {
  await updateSupervisor(supervisorData, supervisorId);
}

module.exports = {
  getStudentSupervisors,
  createStudentSupervisor,
  updateStudentSupervisor
}