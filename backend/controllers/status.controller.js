const statusService = require('../services/status.service');
const {
	getStatusRecord,
	addStatusRecord,
	updateStatusRecord
} = statusService;

const getStatusRecordById = async(req, res, next) => {
	const {
		query: {
			student_id
		}
	} = req;
	try {
		const statusRecord = await getStatusRecord(student_id);
		if(statusRecord.length > 0) {
			return res.status(200).send(statusRecord);
		} else return res.sendStatus(404);
	} catch(error) {
		return res.status(400).send(error);
	}
};

const createStatusRecord = async(req, res, next) => {
	const {
		body
	} = req;
	try {
		await addStatusRecord(body[0]);
		return res.sendStatus(201);
	} catch(error) {
		console.log(error.message);
		return res.status(401).send(error);
	}
}

const updateStatusRecordById = async(req, res, next) => {
	const {
		body,
		query: {
			status_id
		}
	} = req;
	try {
		await updateStatusRecord(body[0], status_id);
		return res.sendStatus(200);
	} catch(error) {
		console.log(error.message);
		return res.status(401).send(error);
	}
}

module.exports = {
	getStatusRecordById,
	createStatusRecord,
	updateStatusRecordById
}