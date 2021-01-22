const studentService = require('../services/student.service');
const {
	getStudentRecord,
	addStudentRecord,
	updateStudentRecord
} = studentService;

const getStudentRecordById = async(req, res, next) => {
	const {
		query: {
			student_id
		}
	} = req;
	try {
		const studentRecord = await getStudentRecord(student_id);
		if(studentRecord.length > 0) {
			return res.status(200).send(studentRecord);
		} else return res.sendStatus(404);
	} catch(error) {
		return res.status(400).send(error);
	}
};

const createStudentRecord = async(req, res, next) => {
	const {
		body
	} = req;
	try {
		await addStudentRecord(body[0]);
		return res.sendStatus(201);
	} catch(error) {
		console.log(error.message);
		return res.status(401).send(error);
	}
}

const updateStudentRecordById = async(req, res, next) => {
	const {
		body,
		query: {
			student_id
		}
	} = req;
	try {
		await updateStudentRecord(body[0], student_id);
		return res.sendStatus(200);
	} catch(error) {
		console.log(error.message);
		return res.status(401).send(error);
	}
}

module.exports = {
	getStudentRecordById,
	createStudentRecord,
	updateStudentRecordById
}