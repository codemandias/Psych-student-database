exports.up = function (knex) {
  return knex.raw(
      `
  insert into
    faculty
    (
    faculty_id,
    faculty_first_name,
    faculty_last_name,
    faculty_email,
    faculty_role,
    notes
    )
    (
      select
    __primarykey_Faculty,
    Faculty_FirstName,
    Faculty_LastName,
    Faculty_Email,
    Faculty_Position,
    Notes
    from
    supervisorinfo
      );`
    )
    .then(
      function () {
        return knex.raw(
          `
        insert into
    student
      (
        student_id,
        department,
        first_name,
        last_name,
        previous_degree,
        previous_school,
        transcript_gpa,
        nationality,
        gender,
        degree_type,
        program_type,
        current_degree,
        dissertation,
        phd_award,
        thesis_award,
        comp_finish_date,
        convocation_finish_date_phd,
        convocation_finish_date_msc,
        admission_gpa,
        notes
      )
      (
        select status.__primarykey_studentDalID,
        studentadmission.Program,
        studentadmission.Student_FirstName,
        studentadmission.Student_LastName,
        MostRecentDegree,
        \`Most Recent University\`,
        FinalGPA,
        ForeignStudent,
        studentadmission.Sex,
        studentadmission.Degree,
        studentadmission.ProgramClassification_ClinicalNonclinical,
        studentadmission.Program,
        compprojects.
        \`CompInfo_SelfReference::Dissertation_Title\`,
        status.
        \`ConsiderForAward_Dissertation\`,
        status.ConsiderForAward_MastersThesis,
        STR_TO_DATE(compprojects.CompPlan_CompletionDate, '%m-%d-%Y'),
        STR_TO_DATE(status.ConvocationDate_PhD, '%m-%d-%Y'),
        STR_TO_DATE(status.ConvocationDate_MSc, '%m-%d-%Y'),
        studentadmission.AdmissionGPA,
        studentadmission.AdmissionNotes from studentadmission right join compprojects using(__primarykey_studentDalID) inner join status using(__primarykey_studentDalID)
      );
        `
        )
      }
    )
    .then(function () {
      return knex.raw('update student set supervisor_id = (select faculty_id from faculty where faculty_id in(select _foreignkey_Supervisor from studentadmission where studentadmission.__primarykey_studentDalID = student.student_id));')
    }).then(function () {
      return knex.raw('update student set co_supervisor = (select faculty_id from faculty where faculty_id in(select _foreignkey_CoSupervisor from studentadmission where studentadmission.__primarykey_studentDalID = student.student_id));')
    }).then(function () {
      return knex.raw('update student set internal_supervisor = (select faculty_id from faculty where faculty_id in(select _foreignkey_InternalSupervisor from studentadmission where studentadmission.__primarykey_studentDalID = student.student_id));')
    })
    .then(
      function () {
        return knex.raw(
          `
        insert INTO student_leaves
      (student_id, start_date, leave_duration, reason)
      (select __primarykey_studentDalID, STR_TO_DATE(LeaveOfAbsence_StartDate, '%m-%d-%Y'), LeaveOfAbsence_Months, LeaveNotes from Status);
  `
        )
      }
    )
    .then(
      function () {
        return knex.raw(
          `
        insert INTO
        scholarships
          (
            scholarship_id,
            scholarship_name,
            student_id,
            scholarship_duration,
            scholarship_start_date,
            scholarship_type,
            amount
          )
          (
            SELECT null,
            \`STUDENT_AWARDS::Award_Name\`,
            __primarykey_studentDalID,
            \`STUDENT_AWARDS::Award_DurationInMonths_EnteredByUser\`,
            str_to_date(\`STUDENT_AWARDS::Award_StartDate\`, '%m-%d-%Y'),
            \`STUDENT_AWARDS::Award_Classification\`,
            (
              CAST(
                REPLACE(
                  REPLACE(
                    IFNULL(\`STUDENT_AWARDS::Award_Amount_EnteredByUser\`, 0),
                    ',',
                    ''
                  ),
                  '$',
                  ''
                ) AS DECIMAL(8, 2)
              )
            ) FROM Awards
          );`
        )
      }
    )
    .then(
      function () {
        return knex.raw(
          `
        insert into student_status
      (student_id,\`desc\`, status_date)
      (select __primarykey_studentDalID, ProgramStatus_AsOfToday, STR_TO_DATE(Program_EndDate, '%m-%d-%Y') from status);
        `
        )
      }
    )
    .then(
      function () {
        return knex.raw(
          `
    insert into comp_project
    (student_id, title, comp_status, end_point, is_revamp, approval_date, completion_date, comp_notes)
    (select __primarykey_studentDalID, \`COMPINFO::Comp1_Title\`,
      IF(Comp1_CompletionDate is null, 'active', 'discarded'), Comp1_EndPoint, null,
      STR_TO_DATE(Comp1_ApprovalDate, '%m-%d-%Y'), STR_TO_DATE(Comp1_CompletionDate, '%m-%d-%Y'),
      CompNotes from compprojects
    );`
        )
      }
    )
    .then(function () {
      return knex.raw('update comp_project set supervisor_id = (select faculty_id from faculty where faculty_id in(select _foreignkey_Supervisor from compprojects where compprojects.__primarykey_studentDalID = comp_project.student_id));')
    }).then(function () {
      return knex.raw('update comp_project set co_supervisor = (select faculty_id from faculty where faculty_id in(select _foreignkey_CoSupervisor from compprojects where compprojects.__primarykey_studentDalID = comp_project.student_id));')
    }).then(function () {
      return knex.raw('update comp_project set internal_supervisor = (select faculty_id from faculty where faculty_id in(select _foreignkey_InternalSupervisor from compprojects where compprojects.__primarykey_studentDalID = comp_project.student_id));')
    })
    .then(
      function () {
        return knex.raw(
          `
    insert into comp_project
    (student_id,  title, comp_status, end_point, is_revamp,
        approval_date, completion_date, comp_notes)
    (select __primarykey_studentDalID, \`COMPINFO::Comp2_Title\`,
      IF(Comp2_CompletionDate is null, 'active', 'discarded'), Comp2_EndPoint, null,
     STR_TO_DATE(Comp2_ApprovalDate, '%m-%d-%Y'), STR_TO_DATE(Comp2_CompletionDate, '%m-%d-%Y'),
      CompNotes from compprojects
    );`
        )
      }
    )
    .then(function () {
      return knex.raw('update comp_project set supervisor_id = (select faculty_id from faculty where faculty_id in(select _foreignkey_Supervisor from compprojects where compprojects.__primarykey_studentDalID = comp_project.student_id));')
    }).then(function () {
      return knex.raw('update comp_project set co_supervisor = (select faculty_id from faculty where faculty_id in(select _foreignkey_CoSupervisor from compprojects where compprojects.__primarykey_studentDalID = comp_project.student_id));')
    }).then(function () {
      return knex.raw('update comp_project set internal_supervisor = (select faculty_id from faculty where faculty_id in(select _foreignkey_InternalSupervisor from compprojects where compprojects.__primarykey_studentDalID = comp_project.student_id));')
    })
    .then(
      function () {
        return knex.raw(
          `
   insert into comp_project
   (student_id,  title, comp_status, end_point, is_revamp,
       approval_date, completion_date, comp_notes)
   (select __primarykey_studentDalID, \`COMPINFO::Comp3_Title\`,
     IF(Comp3_CompletionDate is null, 'active', 'discarded'), Comp3_EndPoint, null,
     STR_TO_DATE(Comp3_ApprovalDate, '%m-%d-%Y'), STR_TO_DATE(Comp3_CompletionDate, '%m-%d-%Y'),
     CompNotes from compprojects
   );`
        )
      }
    )
    .then(function () {
      return knex.raw('update comp_project set supervisor_id = (select faculty_id from faculty where faculty_id in(select _foreignkey_Supervisor from compprojects where compprojects.__primarykey_studentDalID = comp_project.student_id));')
    }).then(function () {
      return knex.raw('update comp_project set co_supervisor = (select faculty_id from faculty where faculty_id in(select _foreignkey_CoSupervisor from compprojects where compprojects.__primarykey_studentDalID = comp_project.student_id));')
    }).then(function () {
      return knex.raw('update comp_project set internal_supervisor = (select faculty_id from faculty where faculty_id in(select _foreignkey_InternalSupervisor from compprojects where compprojects.__primarykey_studentDalID = comp_project.student_id));')
    })
    .then(function () {
      return knex.schema.dropTable('Awards');
    })
    .then(function () {
      return knex.schema.dropTable('CompProjects');
    })
    .then(function () {
      return knex.schema.dropTable('Status');
    })
    .then(function () {
      return knex.schema.dropTable('SupervisorInfo');
    })

};

exports.down = function (knex) {
  return knex.raw('delete from admissions')
    .then(
      function () {
        return knex.raw('delete from student_leaves')
      }
    ).then(
      function () {
        return knex.raw('delete from comp_project')
      }
    ).then(
      function () {
        return knex.raw('delete from scholarships')
      }
    ).then(
      function () {
        return knex.raw('delete from student_status')
      }
    ).then(
      function () {
        return knex.raw('delete from student')
      }
    ).then(
      function () {
        return knex.raw('delete from faculty')
      }
    )
};