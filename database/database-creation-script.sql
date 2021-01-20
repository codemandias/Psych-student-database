SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS
, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS
, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE
, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
​
CREATE SCHEMA
IF NOT EXISTS `psychology_db` DEFAULT CHARACTER
SET utf8mb4
COLLATE utf8mb4_0900_ai_ci ;
USE `psychology_db`;

create table
if not exists faculty
(
    faculty_id         varchar
(15)                         not null
        primary key,
    faculty_first_name varchar
(45)                         null,
    faculty_last_name  varchar
(45)                         null,
    faculty_email      varchar
(45)                         null,
    faculty_role       varchar
(45) default 'In department' null,
    notes              longtext                            null,
    constraint faculty_email_UNIQUE
        unique
(faculty_email)
);

create table
if not exists migrations
(
    id             int unsigned auto_increment
        primary key,
    name           varchar
(255) null,
    batch          int          null,
    migration_time timestamp    null
);

create table
if not exists migrations_lock
(
    `index`   int unsigned auto_increment
        primary key,
    is_locked int null
);

create table
if not exists student
(
    student_id                  varchar
(15)   not null,
    department                  varchar
(45)   null,
    supervisor_id               varchar
(15)   null,
    first_name                  varchar
(45)   null,
    last_name                   varchar
(45)   null,
    previous_degree             varchar
(45)   null,
    previous_school             longtext      null,
    transcript_gpa              decimal
(8, 2) null,
    nationality                 varchar
(45)   null,
    gender                      varchar
(45)   null,
    degree_type                 varchar
(45)   null,
    program_type                varchar
(45)   null,
    current_degree              varchar
(45)   null,
    dissertation                longtext      null,
    phd_award                   varchar
(45)   null,
    thesis_award                varchar
(45)   null,
    co_supervisor               varchar
(45)   null,
    internal_supervisor               varchar
(45)   null,
    comp_finish_date            date          null,
    convocation_finish_date_phd date          null,
    convocation_finish_date_msc date          null,
    admission_gpa               decimal
(8, 2) null,
    notes                       longtext      null,
    email                       varchar
(255)  null,
    photo_id                    varchar
(255)  null,
    constraint student_student_id_uindex
        unique
(student_id),
    constraint co_supervisor_student_fk
        foreign key
(co_supervisor) references faculty
(faculty_id),
    constraint internal_supervisor_student_fk
        foreign key
(internal_supervisor) references faculty
(faculty_id),
    constraint faculty_student_fk
        foreign key
(supervisor_id) references faculty
(faculty_id)
);

create index co_supervisor_student_fk_idx
    on student (co_supervisor);

create index faculty_id_idx
    on student (supervisor_id);

alter table student
    add primary key (student_id);

create table
if not exists comp_project
(
    comp_project_id        int auto_increment
        primary key,
    student_id             varchar
(15)                  not null,
    supervisor_id          varchar
(15)                  null,
    title                  longtext                     null,
    comp_status            varchar
(45) default 'active' not null,
    end_point              varchar
(45)                  null,
    is_revamp              int                          null,
    co_supervisor       varchar
(15)                  null,
    internal_supervisor varchar
(15)                  null,
    approval_date          datetime                     null,
    completion_date        datetime                     null,
    comp_notes             longtext                     null,
    constraint co_supervisor_fk
        foreign key
(co_supervisor) references faculty
(faculty_id),
    constraint comp_supervisor_fk
        foreign key
(supervisor_id) references faculty
(faculty_id),
    constraint internal_supervisor_fk
        foreign key
(internal_supervisor) references faculty
(faculty_id),
    constraint revamp_fk
        foreign key
(is_revamp) references comp_project
(comp_project_id),
    constraint student_comp_fk
        foreign key
(student_id) references student
(student_id)
);

create index co_supervisor_id_idx
    on comp_project (co_supervisor);

create index internal_supervisor_fk_idx
    on comp_project (internal_supervisor);

create index revamp_fk_idx
    on comp_project (is_revamp);

create index student_id_idx
    on comp_project (student_id);

create index supervisor_id_idx
    on comp_project (supervisor_id);

alter table comp_project alter column comp_project_id
set
default 0;


create table
if not exists presentations
(
    presentation_id   int auto_increment
        primary key,
    student_id        varchar
(15) not null,
    presentation_date datetime    not null,
    presentation_name varchar
(45) not null,
    scale             varchar
(45) not null,
    constraint student_presentation_fk
        foreign key
(student_id) references student
(student_id)
);

create index student_presentation_fk_idx
    on presentations (student_id);

create table
if not exists progress
(
      progress_id   int auto_increment
        primary key,
    student_id    varchar
(15)       not null,
    progress_year int               not null,
    satisfactory  tinyint default 0 not null,
    extension     varchar
(45)       null,
    comments      varchar
(45)       null,
    constraint student_progress_fk
        foreign key
(student_id) references student
(student_id)
);

create index student_progress_fk_idx
    on progress (student_id);

create table
if not exists publications
(
    publication_id     int auto_increment
        primary key,
    student_id         varchar
(15)                       not null,
    title              varchar
(45)                       not null,
    publication_status varchar
(45) default 'In Progress' not null,
    publication_date   datetime                          null,
    constraint student_publication_fk
        foreign key
(student_id) references student
(student_id)
);

create index student_publication_fk_idx
    on publications (student_id);

create table
if not exists scholarships
(
    scholarship_id         int auto_increment
        primary key,
    scholarship_name       text                       null,
    student_id             varchar
(15)                not null,
    scholarship_duration   int                        null,
    scholarship_start_date int                        null,
    season                 varchar
(45)                null,
    scholarship_type       text                       null,
    amount                 decimal
(8, 2) default 0.00 not null,
    continued_from         int                        null,
    notes                  varchar
(255)               null,
    constraint continued_fk
        foreign key
(continued_from) references scholarships
(scholarship_id),
    constraint student_scholarships_fk
        foreign key
(student_id) references student
(student_id)
);

create index continued_fk_idx
    on scholarships (continued_from);

create index student_id_idx
    on scholarships (student_id);

create table
if not exists student_leaves
(
    leave_id       int auto_increment
        primary key,
    student_id     varchar
(15) not null,
    start_date     date        null,
    leave_duration int         null,
    reason         longtext    null,
    constraint student_leaves_fk
        foreign key
(student_id) references student
(student_id)
);

create index student_fk_idx
    on student_leaves (student_id);

create table
if not exists student_status
(     status_id       int auto_increment
        primary key,
    student_id  varchar
(15)                  not null
         ,
    `desc`      varchar
(45) default 'Active' not null,
    status_date datetime                     null,
    constraint student_status_fk
        foreign key
(student_id) references student
(student_id)
);

