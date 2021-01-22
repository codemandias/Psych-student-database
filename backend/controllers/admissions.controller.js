const admissionsService = require('../services/admissions.service');
const {
	getAdmissionsRecord,
	addAdmissionsRecord,
	updateAdmissionsRecord
} = admissionsService;

const getAdmissionsRecordById = async(req, res, next) => {
	const {
		query: {
			student_id
		}
	} = req;
	try {
		const admissionsRecord = await getAdmissionsRecord(student_id);
		if(admissionsRecord.length > 0) {
			return res.status(200).send(admissionsRecord);
		} else return res.sendStatus(404);
	} catch(error) {
		return res.status(400).send(error);
	}
};

const createAdmissionsRecord = async(req, res, next) => {
	const {
		body
	} = req;
	try {
		await addAdmissionsRecord(body[0]);
		return res.sendStatus(201);
	} catch(error) {
		console.log(error.message);
		return res.status(401).send(error);
	}
}

const updateAdmissionsRecordById = async(req, res, next) => {
	const {
		body,
		query: {
			admission_id
		}
	} = req;
	try {
		await updateAdmissionsRecord(body[0], admission_id);
		return res.sendStatus(200);
	} catch(error) {
		console.log(error.message);
		return res.status(401).send(error);
	}
}

module.exports = {
	getAdmissionsRecordById,
	createAdmissionsRecord,
	updateAdmissionsRecordById
}