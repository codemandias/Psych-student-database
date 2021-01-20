const {
    getCompByStudentId,
    createComp,
    updateCompById
} = require('../model/comp.model');

const getStudentComp = async (studentId) => {
    const comp = await getCompByStudentId(studentId);
    return comp;
}

const createStudentComp = async (comp) => {
    await createComp(comp);
}

const updateStudentComp = async (comp, compId) => {
    await updateCompById(comp, compId)
}

module.exports = {
    getStudentComp,
    createStudentComp,
    updateStudentComp
}