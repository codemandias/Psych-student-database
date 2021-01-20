const compService = require('../services/comp.service');
const {
    getStudentComp,
    createStudentComp,
    updateStudentComp
} = compService;

const getCompByStudentId = async (req, res, next) => {
    const {
        query: {
            student_id
        }
    } = req;
    try {
        const comp = await getStudentComp(student_id);
        if (comp.length > 0) {
            return res.status(200).send(comp);
        } else return res.sendStatus(404);
    } catch (error) {
        return res.status(400).send(error);
    }
};

const createComp = async (req, res, next) => {
    const {
        body
    } = req;
    try {
        await createStudentComp(body[0]);
        return res.sendStatus(201);
    } catch (error) {
        console.log(error.message)
        return res.status(401).send(error);
    }
};

const updateCompById = async (req, res, next) => {
    const {
      body,
      query: {
        comp_project_id
      }
    } = req;
    try {
      await updateStudentComp(body[0], comp_project_id);
      return res.sendStatus(200);
    } catch (error) {
      console.log(error.message);
      return res.status(401).send(error);
    }
  };

module.exports = {
    getCompByStudentId,
    createComp,
    updateCompById
}