const database = require('../database');

const getStatusRecordById = async(studentId) => {
	const data = await database.select('student_id', 'desc', 'status_date').from('student_status').where('student_id', studentId);
	return data;
}

const insertStatusRecord = async(statusRecord) => {
	await database('student_status').insert(statusRecord);
}

const updateStatusRecordById = async(statusRecord, statusId) => {
	if(statusId) {
		if(await database('student_status').where('status_id', statusId).update(statusRecord) === 0) {
			throw `Error: Student id ${statusId} does not exist, could not update record.`;
		}
	} else {
		throw 'Error: Missing student id parameter in HTTP request.';
	}
}

module.exports = {
	getStatusRecordById,
	insertStatusRecord,
	updateStatusRecordById
}