const database = require('../database');

const getProgressRecordById = async(studentId) => {
	const data = await database.select('student_id', 'progress_year', 'satisfactory', 'extension', 'comments').from('progress').where('student_id', studentId);
	return data;
}

const insertProgressRecord = async(progressRecord) => {
	await database('progress').insert(progressRecord);
}

const updateProgressRecordById = async(progressRecord, progressId) => {
	if(progressId) {
		if(await database('progress').where('progress_id', progressId).update(progressRecord) === 0) {
			throw `Error: Progress id ${progressId} does not exist, could not update record.`;
		}
	} else {
		throw 'Error: Missing progress id parameter in HTTP request.';
	}
}

module.exports = {
	getProgressRecordById,
	insertProgressRecord,
	updateProgressRecordById
}