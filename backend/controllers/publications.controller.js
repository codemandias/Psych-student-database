const publicationsService = require('../services/publications.service');
const {
    getPublicationsRecord,
    addPublicationsRecord,
    updatePublicationsRecord
} = publicationsService;


const getPublicationsByStudentId = async (req, res, next) => {
    const {
        query: {
            student_id
        }
    } = req;
    try {
        const publicationsRecord = await getPublicationsRecord(student_id);
        return res.status(200).send(publicationsRecord);

    }catch (error){
        return res.status(400).send(error);
    }
};


const createPublicationsRecord = async (req, res, next) =>{
    const {
        body
    } = req;
    try{
        await addPublicationsRecord(body[0]);
        return res.sendStatus(201);
    }catch (error) {
        console.log(error.message)
        return res.status(401).send(error);
    }
} 

const updatePublicationsRecordById = async (req, res, next) => {
    const {
      body,
      query: {
        publication_id
      }
    } = req;
    try {
      await updatePublicationsRecord(body[0], publication_id);
      return res.sendStatus(200);
    } catch (error) {
      console.log(error.message);
      return res.status(401).send(error);
    }
  }
  


module.exports = {
    getPublicationsByStudentId,
    createPublicationsRecord,
    updatePublicationsRecordById
}
