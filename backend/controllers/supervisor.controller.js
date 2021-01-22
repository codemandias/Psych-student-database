const supervisorService = require('../services/supervisor.service');
const {
	getStudentSupervisors,
	createStudentSupervisor,
	updateStudentSupervisor
} = supervisorService;

const getSupervisorsByStudentId = async(req, res, next) => {
	const {
		query: {
			student_id
		}
	} = req;
	try {
		const supervisors = await getStudentSupervisors(student_id);
		if(supervisors) {
			return res.status(200).send(supervisors);
		} else {
			return res.sendStatus(404);
		}
	} catch(error) {
		return res.status(404).send(error);
	}
};

const createSupervisor = async(req, res, next) => {
	const {
		body
	} = req;
	try {
		await createStudentSupervisor(body[0]);
		return res.sendStatus(201);
	} catch(error) {
		console.log(error.message);
		return res.status(401).send(error);
	}
}

const updateSupervisor = async(req, res, next) => {
	const {
		body,
		query: {
			faculty_id
		}
	} = req;
	try {
		await updateStudentSupervisor(body[0], faculty_id);
		return res.sendStatus(200);
	} catch(error) {
		console.log(error.message);
		return res.status(401).send(error);
	}
}


module.exports = {
	getSupervisorsByStudentId,
	createSupervisor,
	updateSupervisor
}