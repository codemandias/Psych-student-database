const database = require('../database');

const getPresentationByStudentId = async(studentId) => {
	const data = await database.select('presentation_id', 'student_id', 'presentation_name', 'presentation_date', 'scale').from('presentations').where('student_id', studentId)
		.catch(function(error) {
			console.log(error);
		});
	return data;
}

const insertPresentation = async(presentation) => {
	await database('presentations').insert(presentation);
}

const updatePresentation = async(presentation, presentationId) => {
	if(presentationId) {
		if(await database('presentations').where('presentation_id', presentationId).update(presentation) == 0) {
			throw `Error: Presentation Id ${presentationId} does not exist, could not update record.`;
		}
	} else {
		throw 'Error: Missing Presentation Id parameter in HTTP request.';
	}
}


module.exports = {
	getPresentationByStudentId,
	insertPresentation,
	updatePresentation
}