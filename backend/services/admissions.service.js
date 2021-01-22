const {
	getAdmissionsRecordById,
	insertAdmissionsRecord,
	updateAdmissionsRecordById
} = require('../model/admissions.model');

const getAdmissionsRecord = async(admissionsId) => {
	const admissions = await getAdmissionsRecordById(admissionsId);
	return admissions;
}

const addAdmissionsRecord = async(admissionsRecord) => {
	await insertAdmissionsRecord(admissionsRecord);
}

const updateAdmissionsRecord = async(admissionsRecord, admissionsId) => {
	await updateAdmissionsRecordById(admissionsRecord, admissionsId)
}

module.exports = {
	getAdmissionsRecord,
	addAdmissionsRecord,
	updateAdmissionsRecord
}