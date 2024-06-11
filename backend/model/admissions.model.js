const database = require('../database');

const getAdmissionsRecordById = async(studentId) => {
	const data = await database.select('admission_date', 'is_foreign', 'previous_degree', 'previous_school', 'admission_gpa').from('admissions').where('student_id', studentId);
	return data;
}

const insertAdmissionsRecord = async(admissionsRecord) => {
	await database('admissions').insert(admissionsRecord);
}

const updateAdmissionsRecordById = async(admissionsRecord, admissionsId) => {
	if(admissionsId) {
		if(await database('admissions').where('admission_id', admissionsId).update(admissionsRecord) === 0) {
			throw `Error: Admissions id ${admissionsId} does not exist, could not update record.`;
		}
	} else {
		throw 'Error: Missing admissions id parameter in HTTP request.';
	}
}

module.exports = {
	getAdmissionsRecordById,
	insertAdmissionsRecord,
	updateAdmissionsRecordById
}