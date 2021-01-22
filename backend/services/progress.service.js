const {
	getProgressRecordById,
	insertProgressRecord,
	updateProgressRecordById
} = require('../model/progress.model');

const getProgressRecord = async(studentId) => {
	const progress = await getProgressRecordById(studentId);
	return progress;
}

const addProgressRecord = async(progressRecord) => {
	await insertProgressRecord(progressRecord);
}

const updateProgressRecord = async(progressRecord, progressId) => {
	await updateProgressRecordById(progressRecord, progressId)
}

module.exports = {
	getProgressRecord,
	addProgressRecord,
	updateProgressRecord
}