const {
    getPublicationsByStudentId,
    insertPublicationsRecord,
    updatePublicationsRecordById
} = require('../model/publications.model');

const getPublicationsRecord = async (studentId) => {
    try{
        const publicationsData = await getPublicationsByStudentId(studentId);
        return publicationsData;
    } catch (error){
        console.log(error);
    }
}


const addPublicationsRecord = async (publicationsRecord) => {
    await insertPublicationsRecord(publicationsRecord);
}

const updatePublicationsRecord = async (publicationsRecord, publicationId) => {
    await updatePublicationsRecordById(publicationsRecord, publicationId)
  }

module.exports = {
    getPublicationsRecord,
    addPublicationsRecord,
    updatePublicationsRecord
}