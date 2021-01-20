const express = require('express');
const router = express.Router();
const auth = require('../auth/authentication');

const studentController = require('../controllers/student.controller');
const supervisorController = require('../controllers/supervisor.controller');
const compController = require('../controllers/comp.controller');
const presentationsController = require('../controllers/presentations.controller');
const scholarshipController = require('../controllers/scholarship.controller');
const publicationsController = require('../controllers/publications.controller');
const statusController = require('../controllers/status.controller');
const admissionsController = require('../controllers/admissions.controller');
const progressController = require('../controllers/progress.controller');

//API Routes/Endpoints

//Endpoints for Student 
router.get('/get-student-record/', auth, studentController.getStudentRecordById);
router.post('/create-student-record/', auth, studentController.createStudentRecord);
router.put('/update-student-record/', auth, studentController.updateStudentRecordById);

//Endpoints for Publications
router.get('/get-publications/', auth, publicationsController.getPublicationsByStudentId);
router.post('/create-publications/', auth, publicationsController.createPublicationsRecord);
router.put('/update-publications/', auth, publicationsController.updatePublicationsRecordById);

//Endpoints for Comps
router.get('/get-comps/', auth, compController.getCompByStudentId);
router.post('/create-comps/', auth, compController.createComp);
router.put('/update-comps/', auth, compController.updateCompById);

//Endpoints for Supervisor 
router.get('/get-supervisors/', auth, supervisorController.getSupervisorsByStudentId);
router.post('/create-supervisor/', auth, supervisorController.createSupervisor);
router.put('/update-supervisor', auth, supervisorController.updateSupervisor);

//Endpoints for Presentation 
router.get('/get-presentation/', auth, presentationsController.getPresentationByStudentId);
router.post('/create-presentation/', auth, presentationsController.createStudentPresentation);
router.put('/update-presentation/', auth, presentationsController.updatePresentationById)

//Endpoints for Status 
router.get('/get-status-record/', auth, statusController.getStatusRecordById);
router.post('/create-status-record/', auth, statusController.createStatusRecord);
router.put('/update-status-record/', auth, statusController.updateStatusRecordById);

//Endpoints for Scholarship 
router.get('/get-scholarship/', auth, scholarshipController.getScholarshipByStudentId);
router.post('/create-scholarship/', auth, scholarshipController.createScholarship);
router.put('/update-scholarship/', auth, scholarshipController.updateScholarshipById);

//Endpoints for Admissions 
router.get('/get-admission-record/', auth, admissionsController.getAdmissionsRecordById);
router.post('/create-admission-record/', auth, admissionsController.createAdmissionsRecord);
router.put('/update-admission-record/', auth, admissionsController.updateAdmissionsRecordById);

//Endpoints for Progress
router.get('/get-progress/', auth, progressController.getProgressRecordById);
router.post('/create-progress/', auth, progressController.createProgressRecord);
router.put('/update-progress/', auth, progressController.updateProgressRecordById);
module.exports = router;