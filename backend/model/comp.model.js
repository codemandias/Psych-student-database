const database = require('../database');

const getCompByStudentId = async (studentId) => {
    const data = await database.select('end_point', 'title', 'approval_date', 'completion_date', 'comp_notes').from('comp_project').where('student_id', studentId);
    return data;
}


const createComp = async (comp) => {
    await database('comp_project').insert(comp);
}

const updateCompById = async (comp, compId) => {
    if (compId) {
      if (await database('comp_project').where('comp_project_id', compId).update(comp) === 0) {
        throw `Error: Comp id ${compId} does not exist, could not update record.`;
      }
    } else {
      throw 'Error: Missing Comp id parameter in HTTP request.';
    }
  }

module.exports = {
    getCompByStudentId,
    createComp,
    updateCompById
}