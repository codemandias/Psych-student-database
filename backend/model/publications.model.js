const database = require('../database');

const getPublicationsByStudentId = async (studentId) => {
    const data = await database.select('student_id', 'publication_id', 'title', 'publication_status',
     'publication_date').from('publications').where('student_id', studentId)
     .catch(function (error) {
         console.log(error)
     });
     return data;
}

const insertPublicationsRecord = async (publicationsRecord) => {
    await database('publications').insert(publicationsRecord);
    
}

const updatePublicationsRecordById = async (publicationsrecord, publicationId) => {
    if (publicationId) {
      if (await database('publications').where('publication_id', publicationId).update(publicationsrecord) === 0) {
        throw `Error: publication id ${publicationId} does not exist, could not update record.`;
      }
    } else {
      throw 'Error: Missing publication id parameter in HTTP request.';
    }
  }

module.exports = {
    getPublicationsByStudentId,
    insertPublicationsRecord,
    updatePublicationsRecordById
}