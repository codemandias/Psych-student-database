const database = require('../database');

const getSupervisorData = async(supervisor_id) => {
	if(supervisor_id) {
		const supervisorResult = await database('faculty').where('faculty_id', supervisor_id)
			.catch(function(error) {
				console.log(error);
			});
		const supervisor = JSON.parse(JSON.stringify(supervisorResult[0]));
		return supervisor;
	}
}
const getSupervisors = async(studentId) => {
	const supervisorInfo = await database.select('supervisor_id').from('student').where('student_id', studentId);

	const coSupervisorInfo = await database.select('co_supervisor').from('student').where('student_id', studentId);

	const inSupervisorInfo = await database.select('internal_supervisor').from('student').where('student_id', studentId);

	if(supervisorInfo.length > 0 || coSupervisorInfo.length > 0 || inSupervisorInfo.length > 0) {

		const [{
			supervisor_id
		}] = supervisorInfo;

		const [{
			co_supervisor
		}] = coSupervisorInfo;

		const [{
			internal_supervisor
		}] = coSupervisorInfo;

		const supervisor = await getSupervisorData(supervisor_id);

		const coSupervisor = await getSupervisorData(co_supervisor);

		const inSupervisor = await getSupervisorData(internal_supervisor);

		console.log(inSupervisor);

		const supervisors = {
			supervisor,
			coSupervisor,
			inSupervisor
		}
		return supervisors;
	} else {
		throw "Error: Incorrect supervisor id, no matching supervisors."
	}
}

const createSupervisor = async(supervisor) => {
	await database('faculty').insert(supervisor);
}

const updateSupervisor = async(supervisorData, supervisorId) => {
	if(supervisorId) {
		if(await database('faculty').where('faculty_id', supervisorId).update(supervisorData) === 0) {
			throw `Error: Supervisor id ${supervisorId} does not exist, could not update record.`;
		}
	} else {
		throw 'Error: Missing  faculty_id parameter in HTTP request.';
	}
}

module.exports = {
	getSupervisors,
	createSupervisor,
	updateSupervisor
};