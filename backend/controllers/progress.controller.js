const progressService = require('../services/progress.service');
const {
	getProgressRecord,
	addProgressRecord,
	updateProgressRecord
} = progressService;

const getProgressRecordById = async(req, res, next) => {
	const {
		query: {
			student_id
		}
	} = req;
	try {
		const progressRecord = await getProgressRecord(student_id);
		if(progressRecord.length > 0) {
			return res.status(200).send(progressRecord);
		} else return res.sendStatus(404);
	} catch(error) {
		return res.status(400).send(error);
	}
};

const createProgressRecord = async(req, res, next) => {
	const {
		body
	} = req;
	try {
		await addProgressRecord(body[0]);
		return res.sendStatus(201);
	} catch(error) {
		console.log(error.message);
		return res.status(401).send(error);
	}
}

const updateProgressRecordById = async(req, res, next) => {
	const {
		body,
		query: {
			progress_id
		}
	} = req;
	try {
		await updateProgressRecord(body[0], progress_id);
		return res.sendStatus(200);
	} catch(error) {
		console.log(error.message);
		return res.status(401).send(error);
	}
}

module.exports = {
	getProgressRecordById,
	createProgressRecord,
	updateProgressRecordById
}