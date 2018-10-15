DROP TABLE IF EXISTS login;

CREATE TABLE `login` (
  `username` int(18) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("409661","$2y$10$vVc1bhIUlVAXSPKKQPatfebCLmyvWj52fwXEesEVTQhbnhy71ldo.","user");
INSERT INTO login VALUES("409662","$2y$10$d307NQL/Viap8G7jULrEIOm0KY6wuv7VY1IMNHbp4PZCWrKjy.Gd6","user");
INSERT INTO login VALUES("409663","$2y$10$Dh6/fX7XlAoxGEGTY.bmC.5WFqlASa6Z87U3tbdRS8lo9nztPMhQm","user");
INSERT INTO login VALUES("409664","$2y$10$ABxt9H1FuAUOrwEEu5wuGOjt/sfYqqadbfY1brSGViFrT2nRPiLTm","user");
INSERT INTO login VALUES("409665","$2y$10$ZweM1ydM58hoFJFHcy9IV.SYeWrsloKa0IB8fcDKt1dE38a31SuRq","user");
INSERT INTO login VALUES("409668","$2y$10$Sjg7GKBaS6u/lpjovmbOSe2TbHY2Na9NJL/GxVzRDYOOAcdeSfkOK","user");
INSERT INTO login VALUES("409669","$2y$10$3Xm2ygZSJQjTOxfiSTmu3O/bmgi2zNPFJExo8NVLgWszL8LhPzAfG","user");
INSERT INTO login VALUES("409670","$2y$10$4M2VcYs3wrQGjyEoF8fk/.EfEA1AX2qaVueYjab7V09Q9nWGPMR6K","user");
INSERT INTO login VALUES("409671","$2y$10$E3QbgnAB9Qr/jd2gYg4k.uj1MM3jg0VJuV.CCjgmAuDzciBvwjvoy","user");
INSERT INTO login VALUES("409672","$2y$10$hFKZeALvzNvc7iwgjjc0ieWDkX.zmPeBNHyDVhQL8gYG4/K8K34yO","user");
INSERT INTO login VALUES("409673","$2y$10$emOQ/1I50up/3e/ntHGI1.zPOrUjlfd3r6gD47S5X1DUDfX7qyJJe","user");
INSERT INTO login VALUES("409677","$2y$10$jMsSdde46zwCBLos.RFXwuD.lZxdgj6h2L5kNLp2OjokZAJehfdZC","user");
INSERT INTO login VALUES("409679","$2y$10$HAReGBLCC/298FsNTO3RQ.KW9.Ky4.xPckw5ABnbCPj4oebShdS1C","user");
INSERT INTO login VALUES("654321","$2y$10$zTfDbuOVMPXWwgAFmdyzJugiEjhrjIHjxrZMv/C/fz6V6D1RtNnC6","admin");


DROP TABLE IF EXISTS login_admin;

CREATE TABLE `login_admin` (
  `account_id` int(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login_admin VALUES("123456","$2y$10$zTfDbuOVMPXWwgAFmdyzJugiEjhrjIHjxrZMv/C/fz6V6D1RtNnC6","admin");
INSERT INTO login_admin VALUES("654321","$2y$10$zTfDbuOVMPXWwgAFmdyzJugiEjhrjIHjxrZMv/C/fz6V6D1RtNnC6","admin");


DROP TABLE IF EXISTS login_manila;

CREATE TABLE `login_manila` (
  `username` int(18) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login_manila VALUES("100001","$2y$10$IZYajWZQfKcGMr9hTS1GbOkBmrt7QYcyPLyC4q3beR8ziwls/1O1W","user");
INSERT INTO login_manila VALUES("100002","$2y$10$jQ8e1IS3i09ZoPhPoe1FaukX6WJhuOu.9AhqA11r3NxjG3ydoyf7m","user");
INSERT INTO login_manila VALUES("100003","$2y$10$p8fVvLbrW1selGn1tWkaA.VoqWKJpsBoATjJbcnymyzTBAFS3mm72","user");
INSERT INTO login_manila VALUES("100004","$2y$10$ABu0nf6J7s.kP2E4QXFkHOUVtrkBnYKFXVkSiN3gRyw0.vtIC7FnC","user");
INSERT INTO login_manila VALUES("100006","$2y$10$owFgHCzM0k.YuJbVD9nNuOcS/fGFosUOrVGrxfwt96Mk0nnuINOUW","user");


DROP TABLE IF EXISTS studentsgeneralinfo;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `studentsgeneralinfo` AS select `s`.`studentNo` AS `studentNo`,`c`.`course_description` AS `course_description`,concat(`s`.`last_name`,', ',`s`.`first_name`,' ',`s`.`middle_name`) AS `fullName`,`sem`.`semester_num` AS `semester_num`,`yr`.`year_level` AS `year_level`,`s`.`student_type` AS `student_type` from (((`tbl_studentinfo` `s` join `tbl_course_info` `c` on((`s`.`course_id` = `c`.`course_id`))) join `tbl_academic_sem` `sem` on((`s`.`semester_num` = `sem`.`id`))) join `tbl_academic_year` `yr` on((`s`.`year_level` = `yr`.`id`)));

INSERT INTO studentsgeneralinfo VALUES("409556","Bachelor of Science Major in FE","Mo, Try To","First Semester","First Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409681","Bachelor of Science Major in FE","Beard, Black D","First Semester","First Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409682","Bachelor of Science Major in FE","santiago, jack mauel","First Semester","First Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409683","Bachelor of Science Major in FE","Baptist, John Jerusalem","First Semester","First Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409684","Bachelor of Science Major in FE","Baptist, John Jerusalem","First Semester","First Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409685","Bachelor of Science Major in FE","Mendiola, John Bert Espiritu","First Semester","First Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409687","Bachelor of Science Major in FE","Cuenca, Jake Agoncillo","First Semester","First Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409673","Bachelor of Science Major in Computer Science","Cruz, Juan De la","First Semester","First Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409679","Bachelor of Science Major in Computer Science","Cruz, Juan De la","First Semester","First Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409664","Bachelor of Science Major in Information Technology","Luffy, Monkey D","First Semester","Fourth Year"," regular");
INSERT INTO studentsgeneralinfo VALUES("409670","Bachelor of Science Major in Information Technology","Polly, Rolly Fully","First Semester","First Year"," regular");
INSERT INTO studentsgeneralinfo VALUES("409671","Bachelor of Science Major in Information Technology","Wanda, Inday De la","First Semester","First Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409677","Diploma in Information Technology Major in System Development","Cruz, Juan De la","First Semester","First Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409555","Bachelor of Science Major in Information Technology","Magdalo, Pedro Bato","Second Semester","Second Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409672","Bachelor of Science Major in Information Technology","Cruz, Juans De la","Second Semester","Second Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409669","Diploma in Hotel and Restaurant Services","Cruz, Joo De la","Second Semester","Second Year"," regular");
INSERT INTO studentsgeneralinfo VALUES("409661","Diploma in Information Technology Major in System Development","Cuerda, Jessie Ambrocio","Second Semester","Second Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409662","Diploma in Information Technology Major in System Development","Hood, Robin Batman","Second Semester","Second Year","regular");
INSERT INTO studentsgeneralinfo VALUES("409663","Diploma in Information Technology Major in System Development","Robin, Batman And","Second Semester","Second Year"," regular");


DROP TABLE IF EXISTS tbl_academic_sem;

CREATE TABLE `tbl_academic_sem` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `semester_num` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_academic_sem VALUES("0","SHS");
INSERT INTO tbl_academic_sem VALUES("1","First Semester");
INSERT INTO tbl_academic_sem VALUES("2","Second Semester");


DROP TABLE IF EXISTS tbl_academic_year;

CREATE TABLE `tbl_academic_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tbl_academic_year VALUES("1","First Year");
INSERT INTO tbl_academic_year VALUES("2","Second Year");
INSERT INTO tbl_academic_year VALUES("3","Third Year");
INSERT INTO tbl_academic_year VALUES("4","Fourth Year");
INSERT INTO tbl_academic_year VALUES("11","Grade 11");
INSERT INTO tbl_academic_year VALUES("12","Grade 12");


DROP TABLE IF EXISTS tbl_backup;

CREATE TABLE `tbl_backup` (
  `name` varchar(25) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_backup VALUES("db_backup_03-19-2017.sql","2017-03-19 14:45:10");


DROP TABLE IF EXISTS tbl_branches;

CREATE TABLE `tbl_branches` (
  `branch_id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) NOT NULL,
  `branch_address` varchar(255) NOT NULL,
  `branch_contact` int(11) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_branches VALUES("1","ICC CALOOCAN","CALOOCAN CITY","123456");
INSERT INTO tbl_branches VALUES("2","ICC MANILA","MANILA CITY","123456");


DROP TABLE IF EXISTS tbl_course_info;

CREATE TABLE `tbl_course_info` (
  `course_id` varchar(15) NOT NULL,
  `course_description` text NOT NULL,
  `course_curriculum` varchar(20) NOT NULL,
  PRIMARY KEY (`course_id`,`course_curriculum`),
  KEY `course_curriculum` (`course_curriculum`),
  CONSTRAINT `tbl_course_info_ibfk_1` FOREIGN KEY (`course_curriculum`) REFERENCES `tbl_curriculum` (`curriculum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_course_info VALUES("BSBA-FE","Bachelor of Science Major in FE","BSBA-FE2017");
INSERT INTO tbl_course_info VALUES("BSBA-HR","Bachelor of Science Major in Human Resources","BSBA-HR2017");
INSERT INTO tbl_course_info VALUES("BSBA-MKTG","Bachelor of Science Major in Marketing Management","BSBA-MKTG2");
INSERT INTO tbl_course_info VALUES("BSBA-OA","Bachelor of Science Major in Office Administration","BSOA2017");
INSERT INTO tbl_course_info VALUES("BSCS","Bachelor of Science Major in Computer Science","BSCS2015");
INSERT INTO tbl_course_info VALUES("BSIT","Bachelor of Science Major in Information Technology","BSIT2017");
INSERT INTO tbl_course_info VALUES("D-HRS","Diploma in Hotel and Restaurant Services","DHRS2015");
INSERT INTO tbl_course_info VALUES("DICET","Diploma in Computer Electronics Technology","DICET2017");
INSERT INTO tbl_course_info VALUES("DIT-SD","Diploma in Information Technology Major in System Development","DIT-SD2015");
INSERT INTO tbl_course_info VALUES("TVL-ICT","Computer System Servicing and Multimedia Application","TVL-ICT2017");


DROP TABLE IF EXISTS tbl_curriculum;

CREATE TABLE `tbl_curriculum` (
  `curriculum_id` varchar(15) NOT NULL,
  `curriculum_description` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `time_to_complete` int(1) NOT NULL,
  PRIMARY KEY (`curriculum_id`),
  KEY `subject_code` (`curriculum_description`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_curriculum VALUES("BSBA-FE2017","Bachelor of Science Major in FE","BSBA-FE","4");
INSERT INTO tbl_curriculum VALUES("BSBA-HR2017","Bachelor of Science Major in Human Resources","BSBA-HR","4");
INSERT INTO tbl_curriculum VALUES("BSBA-MKTG2","Bachelor Science Major in Marketing Management","BSBA-MKTG","4");
INSERT INTO tbl_curriculum VALUES("BSCS2015","Curriculum for BSCS","BSCS","4");
INSERT INTO tbl_curriculum VALUES("BSIT2017","Curriculum for BSIT","BSIT","4");
INSERT INTO tbl_curriculum VALUES("BSOA2017","Curriculum for BSOA","BSBA-OA","4");
INSERT INTO tbl_curriculum VALUES("DHRS2015","Curriculum for DHRS2015","DHRS","2");
INSERT INTO tbl_curriculum VALUES("DICET2017","Diploma in Computer and Electronics Technology","DICET","2");
INSERT INTO tbl_curriculum VALUES("DIT-SD2015","Curriculum for DIT-SD","DIT-SD","2");
INSERT INTO tbl_curriculum VALUES("TVL-ICT2017","Computer System Servicing and Multimedia Application","TVL-ICT","2");


DROP TABLE IF EXISTS tbl_grades;

CREATE TABLE `tbl_grades` (
  `studentNo` int(11) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `remarks` varchar(20) NOT NULL DEFAULT 'NOT ENROLLED',
  PRIMARY KEY (`studentNo`,`subject_code`),
  KEY `remark` (`remarks`),
  KEY `studentNo` (`studentNo`),
  KEY `subject_code_2` (`subject_code`),
  CONSTRAINT `tbl_grades_ibfk_4` FOREIGN KEY (`studentNo`) REFERENCES `tbl_studentinfo` (`studentNo`),
  CONSTRAINT `tbl_grades_ibfk_5` FOREIGN KEY (`subject_code`) REFERENCES `tbl_subject` (`subject_code`),
  CONSTRAINT `tbl_grades_ibfk_6` FOREIGN KEY (`remarks`) REFERENCES `tbl_remarks` (`remarks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_grades VALUES("409661","IT11-1","Completed");
INSERT INTO tbl_grades VALUES("409661","IT11-2","Completed");
INSERT INTO tbl_grades VALUES("409661","IT11-3","Completed");
INSERT INTO tbl_grades VALUES("409661","IT11-ENG11","Completed");
INSERT INTO tbl_grades VALUES("409661","IT11-FIL11","Completed");
INSERT INTO tbl_grades VALUES("409661","IT11-MTH11","Completed");
INSERT INTO tbl_grades VALUES("409661","IT11-NSTP11","Completed");
INSERT INTO tbl_grades VALUES("409661","IT11-PE111","Completed");
INSERT INTO tbl_grades VALUES("409661","IT11-SOC11","Completed");
INSERT INTO tbl_grades VALUES("409661","IT11-VAL11","Completed");
INSERT INTO tbl_grades VALUES("409661","IT12-4","Completed");
INSERT INTO tbl_grades VALUES("409661","IT12-5","Completed");
INSERT INTO tbl_grades VALUES("409661","IT12-6","Completed");
INSERT INTO tbl_grades VALUES("409661","IT12-7","Completed");
INSERT INTO tbl_grades VALUES("409661","IT12-8","Completed");
INSERT INTO tbl_grades VALUES("409661","IT12-ENG112","Completed");
INSERT INTO tbl_grades VALUES("409661","IT12-FIL112","Completed");
INSERT INTO tbl_grades VALUES("409661","IT12-MTH112","Completed");
INSERT INTO tbl_grades VALUES("409661","IT12-NSTP12","Completed");
INSERT INTO tbl_grades VALUES("409661","IT12-PE12","Completed");
INSERT INTO tbl_grades VALUES("409661","IT13-ENG113","Completed");
INSERT INTO tbl_grades VALUES("409661","IT13-PE13","Completed");
INSERT INTO tbl_grades VALUES("409661","IT21-10","Completed");
INSERT INTO tbl_grades VALUES("409661","IT21-11","Completed");
INSERT INTO tbl_grades VALUES("409661","IT21-12","Completed");
INSERT INTO tbl_grades VALUES("409661","IT21-13","Completed");
INSERT INTO tbl_grades VALUES("409661","IT21-14","Completed");
INSERT INTO tbl_grades VALUES("409661","IT21-15","Completed");
INSERT INTO tbl_grades VALUES("409661","IT21-9","Completed");
INSERT INTO tbl_grades VALUES("409662","IT11-1","Completed");
INSERT INTO tbl_grades VALUES("409662","IT11-2","Completed");
INSERT INTO tbl_grades VALUES("409662","IT11-3","Completed");
INSERT INTO tbl_grades VALUES("409662","IT11-ENG11","Completed");
INSERT INTO tbl_grades VALUES("409662","IT11-FIL11","Completed");
INSERT INTO tbl_grades VALUES("409662","IT11-MTH11","Completed");
INSERT INTO tbl_grades VALUES("409662","IT11-NSTP11","Completed");
INSERT INTO tbl_grades VALUES("409662","IT11-PE111","Completed");
INSERT INTO tbl_grades VALUES("409662","IT11-SOC11","Completed");
INSERT INTO tbl_grades VALUES("409662","IT11-VAL11","Completed");
INSERT INTO tbl_grades VALUES("409662","IT12-4","Completed");
INSERT INTO tbl_grades VALUES("409662","IT12-5","Completed");
INSERT INTO tbl_grades VALUES("409662","IT12-6","Completed");
INSERT INTO tbl_grades VALUES("409662","IT12-7","Completed");
INSERT INTO tbl_grades VALUES("409662","IT12-8","Completed");
INSERT INTO tbl_grades VALUES("409662","IT12-ENG112","Completed");
INSERT INTO tbl_grades VALUES("409662","IT12-FIL112","Completed");
INSERT INTO tbl_grades VALUES("409662","IT12-MTH112","Completed");
INSERT INTO tbl_grades VALUES("409662","IT12-NSTP12","Completed");
INSERT INTO tbl_grades VALUES("409662","IT12-PE12","Completed");
INSERT INTO tbl_grades VALUES("409662","IT13-ENG113","Completed");
INSERT INTO tbl_grades VALUES("409662","IT13-PE13","Completed");
INSERT INTO tbl_grades VALUES("409662","IT21-10","Completed");
INSERT INTO tbl_grades VALUES("409662","IT21-11","Completed");
INSERT INTO tbl_grades VALUES("409662","IT21-12","Completed");
INSERT INTO tbl_grades VALUES("409662","IT21-13","Completed");
INSERT INTO tbl_grades VALUES("409662","IT21-14","Completed");
INSERT INTO tbl_grades VALUES("409662","IT21-15","Completed");
INSERT INTO tbl_grades VALUES("409662","IT21-9","Completed");
INSERT INTO tbl_grades VALUES("409662","IT22-16","Completed");
INSERT INTO tbl_grades VALUES("409662","IT22-17","Completed");
INSERT INTO tbl_grades VALUES("409662","IT22-18","Completed");
INSERT INTO tbl_grades VALUES("409662","IT22-19","Completed");
INSERT INTO tbl_grades VALUES("409662","IT22-20","Completed");
INSERT INTO tbl_grades VALUES("409662","IT22-PE14","Completed");
INSERT INTO tbl_grades VALUES("409662","IT22-PRAC1","Completed");
INSERT INTO tbl_grades VALUES("409663","IT11-1","Completed");
INSERT INTO tbl_grades VALUES("409663","IT11-2","Completed");
INSERT INTO tbl_grades VALUES("409663","IT11-3","Completed");
INSERT INTO tbl_grades VALUES("409663","IT11-ENG11","Completed");
INSERT INTO tbl_grades VALUES("409663","IT11-FIL11","Completed");
INSERT INTO tbl_grades VALUES("409663","IT11-MTH11","Completed");
INSERT INTO tbl_grades VALUES("409663","IT11-NSTP11","Completed");
INSERT INTO tbl_grades VALUES("409663","IT11-PE111","Completed");
INSERT INTO tbl_grades VALUES("409663","IT11-SOC11","Completed");
INSERT INTO tbl_grades VALUES("409663","IT11-VAL11","Completed");
INSERT INTO tbl_grades VALUES("409663","IT12-4","Completed");
INSERT INTO tbl_grades VALUES("409663","IT12-5","Completed");
INSERT INTO tbl_grades VALUES("409663","IT12-6","Completed");
INSERT INTO tbl_grades VALUES("409663","IT12-7","Completed");
INSERT INTO tbl_grades VALUES("409663","IT12-8","Completed");
INSERT INTO tbl_grades VALUES("409663","IT12-ENG112","Completed");
INSERT INTO tbl_grades VALUES("409663","IT12-FIL112","Completed");
INSERT INTO tbl_grades VALUES("409663","IT12-MTH112","Completed");
INSERT INTO tbl_grades VALUES("409663","IT12-NSTP12","Completed");
INSERT INTO tbl_grades VALUES("409663","IT12-PE12","Completed");
INSERT INTO tbl_grades VALUES("409663","IT13-ENG113","Completed");
INSERT INTO tbl_grades VALUES("409663","IT13-PE13","Completed");
INSERT INTO tbl_grades VALUES("409663","IT21-10","Completed");
INSERT INTO tbl_grades VALUES("409663","IT21-11","Completed");
INSERT INTO tbl_grades VALUES("409663","IT21-12","Completed");
INSERT INTO tbl_grades VALUES("409663","IT21-13","Completed");
INSERT INTO tbl_grades VALUES("409663","IT21-14","Completed");
INSERT INTO tbl_grades VALUES("409663","IT21-15","Completed");
INSERT INTO tbl_grades VALUES("409663","IT21-9","Completed");
INSERT INTO tbl_grades VALUES("409663","IT22-16","Completed");
INSERT INTO tbl_grades VALUES("409663","IT22-17","Completed");
INSERT INTO tbl_grades VALUES("409663","IT22-18","Completed");
INSERT INTO tbl_grades VALUES("409663","IT22-19","Completed");
INSERT INTO tbl_grades VALUES("409663","IT22-20","Completed");
INSERT INTO tbl_grades VALUES("409663","IT22-PE14","Completed");
INSERT INTO tbl_grades VALUES("409663","IT22-PRAC1","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-ACT111","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-ACT113","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC112L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC113L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC114L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC115L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC11L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC120","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC123","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC124L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC127L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC128L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC145","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-ELE111","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-ENG111","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-ENG112","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-ENG113","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-FEL119","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-FIL111","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-FIL112","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-HMT111","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-HMT112","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-IMS126","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-IMS128","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-IMS133L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-IMS136L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-ITE211L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-ITE212L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-ITE213L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-ITE215L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-ITE219","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-MTH111","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-MTH112","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-MTH113","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-MTH114","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-NSC111L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-NSC112L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-NSTP11","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-NSTP12","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-NTS111","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-OS111L","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-PE11","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-PE12","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-PE13","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-PE14","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-RZL111","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-SAD111","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-SOC111","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-SOC112","Completed");
INSERT INTO tbl_grades VALUES("409664","BSIT-SOC113","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-ACT121","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-BMTH121","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-ENG111","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-ENG121","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-ENG211","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-FIL111","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-HBO211","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-IT111","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-MGT211","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-MGT212","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-NSTP","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-NSTP121","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-NTS111","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-PE111","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-PE121","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-PE211","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS111","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS112","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS113","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS121","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS122","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS123","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS124","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS125","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS211","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS212","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS213","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS214","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS221","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS222","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS223","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS224","Completed");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC11L","Completed");
INSERT INTO tbl_grades VALUES("409670","BSIT-ENG111","Completed");
INSERT INTO tbl_grades VALUES("409670","BSIT-FIL111","Completed");
INSERT INTO tbl_grades VALUES("409670","BSIT-HMT111","Completed");
INSERT INTO tbl_grades VALUES("409670","BSIT-MTH111","Completed");
INSERT INTO tbl_grades VALUES("409670","BSIT-NSTP11","Completed");
INSERT INTO tbl_grades VALUES("409670","BSIT-PE11","Completed");
INSERT INTO tbl_grades VALUES("409670","BSIT-SOC111","Completed");
INSERT INTO tbl_grades VALUES("409670","BSIT-SOC112","Completed");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC11L","Completed");
INSERT INTO tbl_grades VALUES("409671","BSIT-ENG111","Completed");
INSERT INTO tbl_grades VALUES("409671","BSIT-FIL111","Completed");
INSERT INTO tbl_grades VALUES("409671","BSIT-HMT111","Completed");
INSERT INTO tbl_grades VALUES("409671","BSIT-MTH111","Completed");
INSERT INTO tbl_grades VALUES("409671","BSIT-NSTP11","Completed");
INSERT INTO tbl_grades VALUES("409671","BSIT-PE11","Completed");
INSERT INTO tbl_grades VALUES("409671","BSIT-SOC111","Completed");
INSERT INTO tbl_grades VALUES("409671","BSIT-SOC112","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-ACT113","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC112L","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC113L","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC114L","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC11L","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC124L","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-ELE111","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-ENG111","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-ENG112","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-ENG113","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-FIL111","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-FIL112","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-HMT111","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-HMT112","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-IMS133L","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-MTH111","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-MTH112","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-MTH113","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-NSTP11","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-NSTP12","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-PE11","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-PE12","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-PE13","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-RZL111","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-SOC111","Completed");
INSERT INTO tbl_grades VALUES("409672","BSIT-SOC112","Completed");
INSERT INTO tbl_grades VALUES("409669","HRS-ENG221","Incomplete");
INSERT INTO tbl_grades VALUES("409669","HRS-LANG221","Incomplete");
INSERT INTO tbl_grades VALUES("409669","HRS-OJT2","Incomplete");
INSERT INTO tbl_grades VALUES("409669","HRS-PE221","Incomplete");
INSERT INTO tbl_grades VALUES("409677","IT11-1","Incomplete");
INSERT INTO tbl_grades VALUES("409677","IT11-2","Incomplete");
INSERT INTO tbl_grades VALUES("409677","IT11-3","Incomplete");
INSERT INTO tbl_grades VALUES("409677","IT11-ENG11","Incomplete");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC125L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409664","BSIT-FEL112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409664","BSIT-FEL114","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409664","BSIT-IMS140","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409664","BSIT-ITE127","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409664","BSIT-ITE211","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409664","BSIT-ITE220","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT12-4","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT12-5","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT12-6","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT12-7","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT12-8","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT12-ENG112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT12-FIL112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT12-MTH112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT12-NSTP12","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT12-PE12","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT13-ENG113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT13-PE13","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT21-10","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT21-11","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT21-12","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT21-13","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT21-14","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT21-15","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT21-9","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT22-16","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT22-17","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT22-18","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT22-19","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT22-20","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT22-PE14","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409665","IT22-PRAC1","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ACT111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ACT113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC112L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC113L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC114L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC115L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC120","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC123","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC124L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC125L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC127L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC128L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC129","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSC145","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-CSE111L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ELE111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ENG112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ENG113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-FEL112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-FEL114","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-FEL119","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-FIL112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-HMT112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-HMT113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-IMS126","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-IMS128","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-IMS133L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-IMS136L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-IMS140","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ITE127","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ITE211","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ITE211L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ITE212L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ITE213L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ITE215L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ITE219","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ITE220","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-ITE426","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-MTH112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-MTH113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-MTH114","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-NSC111L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-NSC112L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-NSTP12","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-NTS111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-NTS112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-OS111L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-PE12","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-PE13","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-PE14","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-RZL111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-SAD111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-SOC113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409670","BSIT-SOC114","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ACT111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ACT113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC112L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC113L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC114L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC115L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC120","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC123","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC124L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC125L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC127L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC128L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC129","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSC145","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-CSE111L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ELE111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ENG112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ENG113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-FEL112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-FEL114","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-FEL119","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-FIL112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-HMT112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-HMT113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-IMS126","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-IMS128","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-IMS133L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-IMS136L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-IMS140","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ITE127","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ITE211","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ITE211L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ITE212L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ITE213L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ITE215L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ITE219","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ITE220","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-ITE426","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-MTH112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-MTH113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-MTH114","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-NSC111L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-NSC112L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-NSTP12","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-NTS111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-NTS112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-OS111L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-PE12","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-PE13","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-PE14","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-RZL111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-SAD111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-SOC113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409671","BSIT-SOC114","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC123","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC125L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC127L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC129","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC145","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSE111L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-FEL112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-FEL114","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-FEL119","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-HMT113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-IMS126","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-IMS128","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-IMS136L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-IMS140","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-ITE127","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-ITE211","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-ITE211L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-ITE212L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-ITE215L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-ITE219","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-ITE220","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-ITE426","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-NSC112L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-NTS111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-NTS112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-OS111L","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-SAD111","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-SOC113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409672","BSIT-SOC114","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT12-4","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT12-5","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT12-6","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT12-7","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT12-8","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT12-ENG112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT12-FIL112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT12-MTH112","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT12-NSTP12","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT12-PE12","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT13-ENG113","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT13-PE13","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT21-10","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT21-11","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT21-12","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT21-13","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT21-14","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT21-15","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT21-9","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT22-16","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT22-17","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT22-18","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT22-19","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT22-20","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT22-PE14","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409677","IT22-PRAC1","NOT ENROLLED");
INSERT INTO tbl_grades VALUES("409661","IT22-16","On-going");
INSERT INTO tbl_grades VALUES("409661","IT22-17","On-going");
INSERT INTO tbl_grades VALUES("409661","IT22-18","On-going");
INSERT INTO tbl_grades VALUES("409661","IT22-19","On-going");
INSERT INTO tbl_grades VALUES("409661","IT22-20","On-going");
INSERT INTO tbl_grades VALUES("409661","IT22-PE14","On-going");
INSERT INTO tbl_grades VALUES("409661","IT22-PRAC1","On-going");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSC129","On-going");
INSERT INTO tbl_grades VALUES("409664","BSIT-CSE111L","On-going");
INSERT INTO tbl_grades VALUES("409664","BSIT-HMT113","On-going");
INSERT INTO tbl_grades VALUES("409664","BSIT-ITE426","On-going");
INSERT INTO tbl_grades VALUES("409664","BSIT-NTS112","On-going");
INSERT INTO tbl_grades VALUES("409664","BSIT-SOC114","On-going");
INSERT INTO tbl_grades VALUES("409665","IT11-1","On-going");
INSERT INTO tbl_grades VALUES("409665","IT11-2","On-going");
INSERT INTO tbl_grades VALUES("409665","IT11-3","On-going");
INSERT INTO tbl_grades VALUES("409665","IT11-ENG11","On-going");
INSERT INTO tbl_grades VALUES("409665","IT11-FIL11","On-going");
INSERT INTO tbl_grades VALUES("409665","IT11-MTH11","On-going");
INSERT INTO tbl_grades VALUES("409665","IT11-NSTP11","On-going");
INSERT INTO tbl_grades VALUES("409665","IT11-PE111","On-going");
INSERT INTO tbl_grades VALUES("409665","IT11-SOC11","On-going");
INSERT INTO tbl_grades VALUES("409665","IT11-VAL11","On-going");
INSERT INTO tbl_grades VALUES("409672","BSIT-ACT111","On-going");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC115L","On-going");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC120","On-going");
INSERT INTO tbl_grades VALUES("409672","BSIT-CSC128L","On-going");
INSERT INTO tbl_grades VALUES("409672","BSIT-ITE213L","On-going");
INSERT INTO tbl_grades VALUES("409672","BSIT-MTH114","On-going");
INSERT INTO tbl_grades VALUES("409672","BSIT-NSC111L","On-going");
INSERT INTO tbl_grades VALUES("409672","BSIT-PE14","On-going");
INSERT INTO tbl_grades VALUES("409677","IT11-FIL11","On-going");
INSERT INTO tbl_grades VALUES("409677","IT11-MTH11","On-going");
INSERT INTO tbl_grades VALUES("409677","IT11-NSTP11","On-going");
INSERT INTO tbl_grades VALUES("409677","IT11-PE111","On-going");
INSERT INTO tbl_grades VALUES("409677","IT11-SOC11","On-going");
INSERT INTO tbl_grades VALUES("409677","IT11-VAL11","On-going");


DROP TABLE IF EXISTS tbl_grades_manila;

CREATE TABLE `tbl_grades_manila` (
  `studentNo` int(11) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `remarks` varchar(20) NOT NULL DEFAULT 'NOT ENROLLED',
  PRIMARY KEY (`studentNo`,`subject_code`),
  KEY `remark` (`remarks`),
  KEY `studentNo` (`studentNo`),
  KEY `subject_code_2` (`subject_code`),
  CONSTRAINT `tbl_grades_manila_ibfk_1` FOREIGN KEY (`studentNo`) REFERENCES `tbl_studentinfo_manila` (`studentNo`),
  CONSTRAINT `tbl_grades_manila_ibfk_2` FOREIGN KEY (`subject_code`) REFERENCES `tbl_subject` (`subject_code`),
  CONSTRAINT `tbl_grades_manila_ibfk_3` FOREIGN KEY (`remarks`) REFERENCES `tbl_remarks` (`remarks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC112L","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC11L","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ENG111","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ENG112","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-FIL111","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-FIL112","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-HMT111","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-HMT112","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-IMS133L","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-MTH111","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-MTH112","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-NSTP11","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-NSTP12","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-PE11","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-PE12","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-RZL111","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-SOC111","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-SOC112","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ACT113","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC112L","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC113L","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC114L","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC11L","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC124L","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ELE111","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ENG111","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ENG112","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ENG113","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-FIL111","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-FIL112","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-HMT111","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-HMT112","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-IMS133L","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-MTH111","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-MTH112","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-MTH113","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-NSTP11","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-NSTP12","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-PE11","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-PE12","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-PE13","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-RZL111","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-SOC111","Completed");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-SOC112","Completed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ACT113","Failed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC113L","Failed");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ACT111","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC115L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC120","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC123","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC125L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC127L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC128L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC129","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC145","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSE111L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-FEL112","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-FEL114","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-FEL119","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-HMT113","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-IMS126","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-IMS128","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-IMS136L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-IMS140","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ITE127","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ITE211","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ITE211L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ITE212L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ITE213L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ITE215L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ITE219","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ITE220","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ITE426","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-MTH114","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-NSC111L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-NSC112L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-NTS111","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-NTS112","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-OS111L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-PE14","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-SAD111","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-SOC113","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-SOC114","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ACT111","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC115L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC120","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC123","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC125L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC127L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC128L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC129","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSC145","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-CSE111L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-FEL112","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-FEL114","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-FEL119","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-HMT113","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-IMS126","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-IMS128","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-IMS136L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-IMS140","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ITE127","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ITE211","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ITE211L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ITE212L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ITE213L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ITE215L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ITE219","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ITE220","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-ITE426","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-MTH114","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-NSC111L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-NSC112L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-NTS111","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-NTS112","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-OS111L","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-PE14","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-SAD111","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-SOC113","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100002","BSIT-SOC114","NOT ENROLLED");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC114L","On-going");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-CSC124L","On-going");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ELE111","On-going");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-ENG113","On-going");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-MTH113","On-going");
INSERT INTO tbl_grades_manila VALUES("100001","BSIT-PE13","On-going");


DROP TABLE IF EXISTS tbl_grants;

CREATE TABLE `tbl_grants` (
  `grant_id` int(1) NOT NULL,
  `grant_description` varchar(255) NOT NULL,
  `grant_discount` decimal(3,2) NOT NULL,
  PRIMARY KEY (`grant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_grants VALUES("1","Barangay Scholar","0.50");
INSERT INTO tbl_grants VALUES("2","AIM Global","0.50");
INSERT INTO tbl_grants VALUES("3","Valedictorian","1.00");
INSERT INTO tbl_grants VALUES("4","Salutatorian","0.75");
INSERT INTO tbl_grants VALUES("5","Others","0.30");
INSERT INTO tbl_grants VALUES("6","No Scholarship Grant","0.00");


DROP TABLE IF EXISTS tbl_payment;

CREATE TABLE `tbl_payment` (
  `studentNo` int(6) NOT NULL,
  `account_name` varchar(100) NOT NULL DEFAULT 'Interface Computer College',
  `account_number` varchar(10) NOT NULL DEFAULT '3989131556',
  `depositor_fname` varchar(30) NOT NULL,
  `depositor_Lname` varchar(30) NOT NULL,
  `reference_code` varchar(8) NOT NULL,
  `payment_amount` int(5) NOT NULL,
  `date` varchar(100) NOT NULL,
  `bdo_branch` varchar(255) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'Not Approve',
  `status` varchar(3) NOT NULL DEFAULT 'new',
  PRIMARY KEY (`reference_code`),
  KEY `studentNo` (`studentNo`),
  CONSTRAINT `tbl_payment_ibfk_1` FOREIGN KEY (`studentNo`) REFERENCES `tbl_studentinfo` (`studentNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_payment VALUES("409661","Interface Computer College","3989131556","Rhea","Generic","AKSIRMGH","1500","March 20, 2017","Manila","Approved","new");
INSERT INTO tbl_payment VALUES("409663","Interface Computer College","3989131556","ASDSA","wanda","ASKVMFUF","1500","February 20, 2017","Manila","Approved","old");
INSERT INTO tbl_payment VALUES("409661","Interface Computer College","3989131556","jessie","Cuerda","BKYLPOKS","1500","March 20, 2016","Caloocan","Approved","old");
INSERT INTO tbl_payment VALUES("409664","Interface Computer College","3989131556","Philip","Morris","BNVYGHWQ","1500","February 30, 2017","Malinta","Approved","old");
INSERT INTO tbl_payment VALUES("409669","Interface Computer College","3989131556","Mang","Kanor","JACOITSV","1500","March 20, 2016","Caloocan","Approved","old");
INSERT INTO tbl_payment VALUES("409664","Interface Computer College","3989131556","MIGHTY","RED","JCMSJUFH","1500","March 25,2017","Caloocan","Approved","old");
INSERT INTO tbl_payment VALUES("409664","Interface Computer College","3989131556","Phili","Morris","JMGHNVIT","1500","February 20, 2017","Malinta","Approved","old");
INSERT INTO tbl_payment VALUES("409672","Interface Computer College","3989131556","Hula","Hula","KIDJGNHY","1500","March 20, 2017","Makati","Approved","old");
INSERT INTO tbl_payment VALUES("409662","Interface Computer College","3989131556","Jack","Reachers","LKJHGFDS","1500","March 25,2017","Caloocan","Approved","old");
INSERT INTO tbl_payment VALUES("409672","Interface Computer College","3989131556","What","The","LOSUTYNH","1500","April 20, 2017","Makati","Approved","new");
INSERT INTO tbl_payment VALUES("409662","Interface Computer College","3989131556","Juan","Dela Cruz","MAJUGLCD","1500","March 22, 2016","Navotas","Approved","old");
INSERT INTO tbl_payment VALUES("409663","Interface Computer College","3989131556","Jack","Daniels","MILKYSKI","1500","March 28, 2017","Quezon City","Approved","old");
INSERT INTO tbl_payment VALUES("409664","Interface Computer College","3989131556","Philip","Morris","MNVGLAOA","1500","February 20,2017","Malinta","Approved","old");
INSERT INTO tbl_payment VALUES("409664","Interface Computer College","3989131556","Philip","Morries","MUGJSHVD","1500","february 20,2017","Malinta","Approved","old");
INSERT INTO tbl_payment VALUES("409664","Interface Computer College","3989131556","Juan","Tamad","NBMDKTIY","1500","April 20,2017","Malinta","Approved","old");
INSERT INTO tbl_payment VALUES("409669","Interface Computer College","3989131556","May","Sayad","NHYUJMKI","1500","march 28,2017","Malabon","Approved","old");
INSERT INTO tbl_payment VALUES("409662","Interface Computer College","3989131556","Jack","Reacher","QWERTYUI","1500","january 19,2017","Malabon","Approved","old");
INSERT INTO tbl_payment VALUES("409664","Interface Computer College","3989131556","marl","voro","SJGNTHRY","1500","February 23,2017","Malabon","Approved","new");
INSERT INTO tbl_payment VALUES("409672","Interface Computer College","3989131556","Mokeny","D","SKFMGJYT","1500","March 23 2017","Manila","Approved","old");
INSERT INTO tbl_payment VALUES("409663","Interface Computer College","3989131556","WALA","LANG","SKGIHMGJ","1500","Feb 1, 2017","manila","Approved","new");
INSERT INTO tbl_payment VALUES("409661","Interface Computer College","3989131556","What","the","SKGMDJVY","1500","February 20, 2017","Caloocan","Approved","old");
INSERT INTO tbl_payment VALUES("409664","Interface Computer College","3989131556","Juan","Tamad","ZSAQWEFD","1500","April 27,2017","Malinta","Approved","old");


DROP TABLE IF EXISTS tbl_payment_manila;

CREATE TABLE `tbl_payment_manila` (
  `studentNo` int(6) NOT NULL,
  `account_name` varchar(100) NOT NULL DEFAULT 'Interface Computer College',
  `account_number` varchar(10) NOT NULL DEFAULT '3989131556',
  `depositor_fname` varchar(30) NOT NULL,
  `depositor_Lname` varchar(30) NOT NULL,
  `reference_code` varchar(8) NOT NULL,
  `payment_amount` int(5) NOT NULL,
  `date` varchar(100) NOT NULL,
  `bdo_branch` varchar(255) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'Not Approve',
  `status` varchar(3) NOT NULL DEFAULT 'new',
  PRIMARY KEY (`reference_code`),
  KEY `studentNo` (`studentNo`),
  CONSTRAINT `tbl_payment_manila_ibfk_1` FOREIGN KEY (`studentNo`) REFERENCES `tbl_studentinfo_manila` (`studentNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_payment_manila VALUES("100002","Interface Computer College","3989131556","wla","lang","KGITUYND","1500","Feb 1, 2017","caloocan","Approved","old");
INSERT INTO tbl_payment_manila VALUES("100001","Interface Computer College","3989131556","Oca","Echiverry","MBNHJYUI","1500","March 20, 2017","Manila","Approved","new");
INSERT INTO tbl_payment_manila VALUES("100002","Interface Computer College","3989131556","wala","lang","WKDISLFK","1500","March 23 2017","caloocan","Approved","old");


DROP TABLE IF EXISTS tbl_remarks;

CREATE TABLE `tbl_remarks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `remarks` (`remarks`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO tbl_remarks VALUES("1","Completed");
INSERT INTO tbl_remarks VALUES("2","Failed");
INSERT INTO tbl_remarks VALUES("3","Incomplete");
INSERT INTO tbl_remarks VALUES("5","NOT ENROLLED");
INSERT INTO tbl_remarks VALUES("4","On-going");
INSERT INTO tbl_remarks VALUES("6","pending");


DROP TABLE IF EXISTS tbl_studentinfo;

CREATE TABLE `tbl_studentinfo` (
  `studentNo` int(6) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `grant_id` int(11) NOT NULL,
  `year_level` int(1) NOT NULL,
  `semester_num` int(1) NOT NULL,
  `student_type` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `new_old` varchar(255) NOT NULL DEFAULT 'new',
  `student_photo` text,
  PRIMARY KEY (`studentNo`,`email_address`),
  KEY `course_id` (`course_id`),
  KEY `branch_id` (`branch_id`),
  KEY `year_level` (`year_level`),
  KEY `semester_num` (`semester_num`),
  KEY `grant_id` (`grant_id`),
  CONSTRAINT `tbl_studentinfo_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branches` (`branch_id`),
  CONSTRAINT `tbl_studentinfo_ibfk_4` FOREIGN KEY (`year_level`) REFERENCES `tbl_academic_year` (`id`),
  CONSTRAINT `tbl_studentinfo_ibfk_5` FOREIGN KEY (`semester_num`) REFERENCES `tbl_academic_sem` (`id`),
  CONSTRAINT `tbl_studentinfo_ibfk_6` FOREIGN KEY (`course_id`) REFERENCES `tbl_course_info` (`course_id`),
  CONSTRAINT `tbl_studentinfo_ibfk_7` FOREIGN KEY (`grant_id`) REFERENCES `tbl_grants` (`grant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=409688 DEFAULT CHARSET=latin1;

INSERT INTO tbl_studentinfo VALUES("409555","BSIT","Pedro","Magdalo","Bato","1","Navotas City","23","Male","321654897","bhala@damin.com","6","2","2","regular","enrolled","new","");
INSERT INTO tbl_studentinfo VALUES("409556","BSBA-FE","Try","Mo","To","1","Malabon","25","Male","897654321","try@gmail.sen","1","1","1","regular","enrolled","new","");
INSERT INTO tbl_studentinfo VALUES("409661","DIT-SD","Jessie","Cuerda","Ambrocio","1","Manila","21","male","12341234","jcuerda@gmail.com","6","2","2","regular","enrolled","old","drow-ranger-keep-silence-wallpaper.jpg");
INSERT INTO tbl_studentinfo VALUES("409662","DIT-SD","Robin","Hood","Batman","1","Caloocan","20","male","654321","robinhood@gmail.com","1","2","2","regular","Not Enrolled","old","");
INSERT INTO tbl_studentinfo VALUES("409663","DIT-SD","Batman","Robin","And","1","Caloocan","23","male","987654321","batman@gmail.com","4","2","2"," regular","Not Enrolled","old","P_20150109_144953_BF.jpg");
INSERT INTO tbl_studentinfo VALUES("409664","BSIT","Monkey","Luffy","D","1","Quezon City","23","male","12341234","monkeyd@yahoo.com","2","4","1"," regular","enrolled","old","");
INSERT INTO tbl_studentinfo VALUES("409669","D-HRS","Joo","Cruz","De la","1","Manila","23","male","12341234","joo_cruz@gmail.com","1","2","2"," regular","Not Enrolled","old","");
INSERT INTO tbl_studentinfo VALUES("409670","BSIT","Rolly","Polly","Fully","1","Manila","23","female","654321","rollypolly@gmail.com","1","1","1"," regular","Not Enrolled","old","");
INSERT INTO tbl_studentinfo VALUES("409671","BSIT","Inday","Wanda","De la","1","Manila","23","male","12341234","wanda.inday23@gmail.com","2","1","1","regular","Not Enrolled","old","");
INSERT INTO tbl_studentinfo VALUES("409672","BSIT","Juans","Cruz","De la","1","Manila","23","male","12341234","@gmail.com","2","2","2","regular","enrolled","old","");
INSERT INTO tbl_studentinfo VALUES("409673","BSCS","Juan","Cruz","De la","1","Manila","23","male","12341234","wala_lang@gmail.com","6","1","1","regular","enrolled","old","cute-spirit-breaker-wallpaper.jpg");
INSERT INTO tbl_studentinfo VALUES("409677","DIT-SD","Juan","Cruz","De la","1","Manila","23","male","12341234","wala_lang@gmail.com","1","1","1","regular","Not Enrolled","old","");
INSERT INTO tbl_studentinfo VALUES("409679","BSCS","Juan","Cruz","De la","1","Manila","23","male","12341234","wala_lang@gmail.com","1","1","1","regular","enrolled","old","");
INSERT INTO tbl_studentinfo VALUES("409681","BSBA-FE","Black","Beard","D","1","manila","23","male","123654","black_beard@gmail.com","1","1","1","regular","enrolled","old","");
INSERT INTO tbl_studentinfo VALUES("409682","BSBA-FE","jack","santiago","mauel","1","navotas","23","male","123465","asdf@gmail.com","1","1","1","regular","pending","new","");
INSERT INTO tbl_studentinfo VALUES("409683","BSBA-FE","John","Baptist","Jerusalem","1","manila","23","male","2147483647","johnbaptist@gmail.com","1","1","1","regular","pending","new","");
INSERT INTO tbl_studentinfo VALUES("409684","BSBA-FE","John","Baptist","Jerusalem","1","manila","23","male","2147483647","johnbaptist@gmail.com","1","1","1","regular","pending","new","");
INSERT INTO tbl_studentinfo VALUES("409685","BSBA-FE","John Bert","Mendiola","Espiritu","1","manila","23","male","2147483647","jbespiritu@gmail.com","1","1","1","regular","pending","new","");
INSERT INTO tbl_studentinfo VALUES("409687","BSBA-FE","Jake","Cuenca","Agoncillo","1","manila","23","male","2147483647","jakecuenca@gmail.com","1","1","1","regular","pending","new","");


DROP TABLE IF EXISTS tbl_studentinfo_manila;

CREATE TABLE `tbl_studentinfo_manila` (
  `studentNo` int(6) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `grant_id` int(11) NOT NULL,
  `year_level` int(1) NOT NULL,
  `semester_num` int(1) NOT NULL,
  `student_type` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `new_old` varchar(255) NOT NULL,
  `student_photo` text NOT NULL,
  PRIMARY KEY (`studentNo`),
  KEY `course_id` (`course_id`),
  KEY `branch_id` (`branch_id`),
  KEY `year_level` (`year_level`),
  KEY `semester_num` (`semester_num`),
  KEY `grant_id` (`grant_id`),
  CONSTRAINT `tbl_studentinfo_manila_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branches` (`branch_id`),
  CONSTRAINT `tbl_studentinfo_manila_ibfk_2` FOREIGN KEY (`year_level`) REFERENCES `tbl_academic_year` (`id`),
  CONSTRAINT `tbl_studentinfo_manila_ibfk_3` FOREIGN KEY (`semester_num`) REFERENCES `tbl_academic_sem` (`id`),
  CONSTRAINT `tbl_studentinfo_manila_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `tbl_course_info` (`course_id`),
  CONSTRAINT `tbl_studentinfo_manila_ibfk_5` FOREIGN KEY (`grant_id`) REFERENCES `tbl_grants` (`grant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=100009 DEFAULT CHARSET=latin1;

INSERT INTO tbl_studentinfo_manila VALUES("100001","BSIT","Mani","NA","SOMA","2","Bacoors","23","female","987654321","manina@gmail.com","6","2","1","regular","Not Enrolled","old","Infinite_Waves_Wallpaper.png");
INSERT INTO tbl_studentinfo_manila VALUES("100002","BSIT","POST","NO","BILL","2","caloocan","23","female","123456","post@bill.com","3","2","1","regular","Not Enrolled","old","phantom_lancer_dota2_hd_wallpaper_1.jpg");
INSERT INTO tbl_studentinfo_manila VALUES("100003","BSCS","Perdo","Penduko","Poe","2","manila","21","male","123456","pedro_penduko@gmail.com","1","1","1","regular","enrolled","old","");
INSERT INTO tbl_studentinfo_manila VALUES("100004","BSCS","Manila","Bay","Bay","2","makati","21","male","123465","wlangya@gmail.com","1","1","1","regular","pending","new","");
INSERT INTO tbl_studentinfo_manila VALUES("100005","BSBA-FE","Black","Beard","D","2","manila","23","male","123465","blackbeard@gmail.com","1","1","1","regular","pending","new","");
INSERT INTO tbl_studentinfo_manila VALUES("100006","TVL-ICT","John","Doe","Doe","2","manila","13","male","2147483647","doedoejohn@gmail.com","1","11","0","regular","enrolled","old","");
INSERT INTO tbl_studentinfo_manila VALUES("100007","BSBA-FE","Jake","Cuenca","ma","2","asdf","23","male","2147483647","jaklsdf@gmail.com","1","1","1","regular","pending","new","");
INSERT INTO tbl_studentinfo_manila VALUES("100008","BSBA-FE","Jake","Cuenca","ma","2","asdf","23","male","2147483647","jaklsdf@gmail.com","1","1","1","regular","pending","new","");


DROP TABLE IF EXISTS tbl_subject;

CREATE TABLE `tbl_subject` (
  `subject_code` varchar(20) NOT NULL,
  `subject_description` varchar(255) NOT NULL,
  `units` int(2) NOT NULL,
  `course_curriculum` varchar(10) NOT NULL,
  `year_level` int(2) NOT NULL,
  `semester_number` int(2) NOT NULL,
  PRIMARY KEY (`subject_code`),
  KEY `course_curriculum` (`course_curriculum`),
  CONSTRAINT `tbl_subject_ibfk_1` FOREIGN KEY (`course_curriculum`) REFERENCES `tbl_course_info` (`course_curriculum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_subject VALUES("BSIT-ACT111","Accounting and Financial Processes","3","BSIT2017","2","2");
INSERT INTO tbl_subject VALUES("BSIT-ACT113","Principle of File Organization","3","BSIT2017","2","1");
INSERT INTO tbl_subject VALUES("BSIT-CSC112L","Fundamentals of Problem Solving and Comp Prog-1","3","BSIT2017","1","2");
INSERT INTO tbl_subject VALUES("BSIT-CSC113L","Fundamentals of Problem Solving and Comp Prog-2","3","BSIT2017","2","1");
INSERT INTO tbl_subject VALUES("BSIT-CSC114L","Data Structuce","3","BSIT2017","2","1");
INSERT INTO tbl_subject VALUES("BSIT-CSC115L","Database Management System","3","BSIT2017","2","2");
INSERT INTO tbl_subject VALUES("BSIT-CSC11L","Computer Concept and Fundamentals with the Internet","3","BSIT2017","1","1");
INSERT INTO tbl_subject VALUES("BSIT-CSC120","Design and Analysis of Algorithm","3","BSIT2017","2","2");
INSERT INTO tbl_subject VALUES("BSIT-CSC123","Software Engineering","3","BSIT2017","3","2");
INSERT INTO tbl_subject VALUES("BSIT-CSC124L","Object Oriented Programming 1","3","BSIT2017","2","1");
INSERT INTO tbl_subject VALUES("BSIT-CSC125L","Programming","3","BSIT2017","4","2");
INSERT INTO tbl_subject VALUES("BSIT-CSC127L","Web Based Programming","3","BSIT2017","3","1");
INSERT INTO tbl_subject VALUES("BSIT-CSC128L","Computer Graphics and Animation","3","BSIT2017","2","2");
INSERT INTO tbl_subject VALUES("BSIT-CSC129","Introduction to Artificial Intelligence","3","BSIT2017","4","1");
INSERT INTO tbl_subject VALUES("BSIT-CSC145","Computer System Organization","3","BSIT2017","3","2");
INSERT INTO tbl_subject VALUES("BSIT-CSE111L","Hardware and Software Interfacing","3","BSIT2017","4","1");
INSERT INTO tbl_subject VALUES("BSIT-ELE111","Analytic and Solid Geometry","3","BSIT2017","2","1");
INSERT INTO tbl_subject VALUES("BSIT-ENG111","English Communication I","3","BSIT2017","1","1");
INSERT INTO tbl_subject VALUES("BSIT-ENG112","Engish Communication 2","3","BSIT2017","1","2");
INSERT INTO tbl_subject VALUES("BSIT-ENG113","Modern Communication 1","3","BSIT2017","2","1");
INSERT INTO tbl_subject VALUES("BSIT-FEL112","Opertation Research","3","BSIT2017","4","2");
INSERT INTO tbl_subject VALUES("BSIT-FEL114","Quality Assurance","3","BSIT2017","4","2");
INSERT INTO tbl_subject VALUES("BSIT-FEL119","Enterpreneurship and IT Management","3","BSIT2017","3","1");
INSERT INTO tbl_subject VALUES("BSIT-FIL111","Sining ng Komunikasyon","3","BSIT2017","1","1");
INSERT INTO tbl_subject VALUES("BSIT-FIL112","Pagbasa at Pagsulat sa Ibant-Ibang Disiplina","3","BSIT2017","1","2");
INSERT INTO tbl_subject VALUES("BSIT-HMT111","Art Appreciation","3","BSIT2017","1","1");
INSERT INTO tbl_subject VALUES("BSIT-HMT112","Philisophy of Man","3","BSIT2017","1","2");
INSERT INTO tbl_subject VALUES("BSIT-HMT113","Philippine Literature","3","BSIT2017","4","1");
INSERT INTO tbl_subject VALUES("BSIT-IMS126","System Management and Administration","3","BSIT2017","3","2");
INSERT INTO tbl_subject VALUES("BSIT-IMS128","Management Information System OOP-2 and Relational Database","3","BSIT2017","3","1");
INSERT INTO tbl_subject VALUES("BSIT-IMS133L","Integrated Application Software","3","BSIT2017","1","2");
INSERT INTO tbl_subject VALUES("BSIT-IMS136L","Introduction to E-Commerce","3","BSIT2017","3","2");
INSERT INTO tbl_subject VALUES("BSIT-IMS140","Current Trends and Seminars","3","BSIT2017","4","2");
INSERT INTO tbl_subject VALUES("BSIT-ITE127","Thesis Project 2","6","BSIT2017","4","2");
INSERT INTO tbl_subject VALUES("BSIT-ITE211","Code of Ethics for Filipino I.T Professionals","3","BSIT2017","4","2");
INSERT INTO tbl_subject VALUES("BSIT-ITE211L","Multimedia Systems","3","BSIT2017","3","2");
INSERT INTO tbl_subject VALUES("BSIT-ITE212L","Presentation Skills in Information Technology","3","BSIT2017","3","1");
INSERT INTO tbl_subject VALUES("BSIT-ITE213L","Arts and Style of Programming","3","BSIT2017","2","2");
INSERT INTO tbl_subject VALUES("BSIT-ITE215L","Management System with SQL","3","BSIT2017","3","1");
INSERT INTO tbl_subject VALUES("BSIT-ITE219","Principles of Telecommunication","3","BSIT2017","3","2");
INSERT INTO tbl_subject VALUES("BSIT-ITE220","Computer System and Data Security Data Com. and Networking Principles and Programming","3","BSIT2017","4","2");
INSERT INTO tbl_subject VALUES("BSIT-ITE426","Thesis Project 1","6","BSIT2017","4","1");
INSERT INTO tbl_subject VALUES("BSIT-MTH111","College Algebra","3","BSIT2017","1","1");
INSERT INTO tbl_subject VALUES("BSIT-MTH112","Trigonometry","3","BSIT2017","1","2");
INSERT INTO tbl_subject VALUES("BSIT-MTH113","Discrete Mathematics","3","BSIT2017","2","1");
INSERT INTO tbl_subject VALUES("BSIT-MTH114","Probabilities and Statistics","3","BSIT2017","2","2");
INSERT INTO tbl_subject VALUES("BSIT-NSC111L","College Physics 1","3","BSIT2017","2","2");
INSERT INTO tbl_subject VALUES("BSIT-NSC112L","College Physics 2","3","BSIT2017","3","1");
INSERT INTO tbl_subject VALUES("BSIT-NSTP11","National Service Training Program 1","3","BSIT2017","1","1");
INSERT INTO tbl_subject VALUES("BSIT-NSTP12","National Service Training Program 2","3","BSIT2017","1","2");
INSERT INTO tbl_subject VALUES("BSIT-NTS111","Natural Science 1","3","BSIT2017","3","2");
INSERT INTO tbl_subject VALUES("BSIT-NTS112","Natural Science 2","3","BSIT2017","4","1");
INSERT INTO tbl_subject VALUES("BSIT-OS111L","Operating System","3","BSIT2017","3","1");
INSERT INTO tbl_subject VALUES("BSIT-PE11","Self Testing Activities","2","BSIT2017","1","1");
INSERT INTO tbl_subject VALUES("BSIT-PE12","Rythmic Activities","2","BSIT2017","1","2");
INSERT INTO tbl_subject VALUES("BSIT-PE13","Individual Sports","2","BSIT2017","2","1");
INSERT INTO tbl_subject VALUES("BSIT-PE14","Organized Games","2","BSIT2017","2","2");
INSERT INTO tbl_subject VALUES("BSIT-RZL111","Life and Works of Rizal","3","BSIT2017","1","2");
INSERT INTO tbl_subject VALUES("BSIT-SAD111","System Analysis and Design","3","BSIT2017","3","1");
INSERT INTO tbl_subject VALUES("BSIT-SOC111","Philippines History and Government","3","BSIT2017","1","1");
INSERT INTO tbl_subject VALUES("BSIT-SOC112","General Psychology","3","BSIT2017","1","1");
INSERT INTO tbl_subject VALUES("BSIT-SOC113","Introduction to Economics with LRT","3","BSIT2017","3","2");
INSERT INTO tbl_subject VALUES("BSIT-SOC114","Introduction to Sociology with Family Planning","3","BSIT2017","4","1");
INSERT INTO tbl_subject VALUES("HRS-ACT121","Accounting 1","3","DHRS2015","1","2");
INSERT INTO tbl_subject VALUES("HRS-BMTH121","Business Mathematics","3","DHRS2015","1","2");
INSERT INTO tbl_subject VALUES("HRS-ENG111","Participate in Workplace Communication (Communication Arts English 1)","3","DHRS2015","1","1");
INSERT INTO tbl_subject VALUES("HRS-ENG121","Communication Arts English 2","3","DHRS2015","1","2");
INSERT INTO tbl_subject VALUES("HRS-ENG211","Modern Communication 1 (Speech and Oral Communication)","3","DHRS2015","2","1");
INSERT INTO tbl_subject VALUES("HRS-ENG221","Modern Communiction 2 (Business Communication)","3","DHRS2015","2","2");
INSERT INTO tbl_subject VALUES("HRS-FIL111","Sining ng Komunikasyon","3","DHRS2015","1","1");
INSERT INTO tbl_subject VALUES("HRS-HBO211","Human Behavior in Organization","3","DHRS2015","2","1");
INSERT INTO tbl_subject VALUES("HRS-IT111","IT Fundamentals with Business Software Operations","3","DHRS2015","1","1");
INSERT INTO tbl_subject VALUES("HRS-LANG221","Foreign Language","3","DHRS2015","2","2");
INSERT INTO tbl_subject VALUES("HRS-MGT211","Enterpreneurship and Business Planning","3","DHRS2015","2","1");
INSERT INTO tbl_subject VALUES("HRS-MGT212","Total Quality Management","3","DHRS2015","2","1");
INSERT INTO tbl_subject VALUES("HRS-NSTP","National Service Training Program 1","3","DHRS2015","1","1");
INSERT INTO tbl_subject VALUES("HRS-NSTP121","National Service Training Program 2","3","DHRS2015","1","2");
INSERT INTO tbl_subject VALUES("HRS-NTS111","Environmental Science","3","DHRS2015","1","1");
INSERT INTO tbl_subject VALUES("HRS-OJT2","On-the-Job Training (Restaurant Services) - OFF CAMPUS Restaurant Services and Data Front Services (200hrs)","3","DHRS2015","2","2");
INSERT INTO tbl_subject VALUES("HRS-PE111","P.E 1","2","DHRS2015","1","1");
INSERT INTO tbl_subject VALUES("HRS-PE121","P.E 2","2","DHRS2015","1","2");
INSERT INTO tbl_subject VALUES("HRS-PE211","P.E 3","2","DHRS2015","2","1");
INSERT INTO tbl_subject VALUES("HRS-PE221","P.E 4","2","DHRS2015","2","2");
INSERT INTO tbl_subject VALUES("HRS111","Personality Development and Customer Relation in Hospitality Industry","3","DHRS2015","1","1");
INSERT INTO tbl_subject VALUES("HRS112","Principles of Safety , Hygiene and Sanitation","3","DHRS2015","1","1");
INSERT INTO tbl_subject VALUES("HRS113","Basic Culinary","3","DHRS2015","1","1");
INSERT INTO tbl_subject VALUES("HRS121","Principles of Management (Hotel and Restaurant Management Operation and Services)","3","DHRS2015","1","2");
INSERT INTO tbl_subject VALUES("HRS122","Hospitality Management","3","DHRS2015","1","2");
INSERT INTO tbl_subject VALUES("HRS123","Housekeeping Services, Operation and Procedures (Guest Rooms and Public Areas)","3","DHRS2015","1","2");
INSERT INTO tbl_subject VALUES("HRS124","F and B Services Procedures and Operations 2","3","DHRS2015","1","2");
INSERT INTO tbl_subject VALUES("HRS125","Bartending Procedures and Operations 2","3","DHRS2015","1","2");
INSERT INTO tbl_subject VALUES("HRS211","Principles of  Marketing (Hospitality Industry)","3","DHRS2015","2","1");
INSERT INTO tbl_subject VALUES("HRS212","Principle of Tourism (Hospitality Industry)","3","DHRS2015","2","1");
INSERT INTO tbl_subject VALUES("HRS213","F and B Service Procedures and Operations 2","3","DHRS2015","2","1");
INSERT INTO tbl_subject VALUES("HRS214","Front Office Procedures and Concierge Operations (with Automated System and Reservation System)","3","DHRS2015","2","1");
INSERT INTO tbl_subject VALUES("HRS221","Bread and Pastry Production NCII","3","DHRS2015","2","2");
INSERT INTO tbl_subject VALUES("HRS222","Western and Asian Cuisine","4","DHRS2015","2","2");
INSERT INTO tbl_subject VALUES("HRS223","Current Trends in Hospitality Management (with Educational Trip)","3","DHRS2015","2","2");
INSERT INTO tbl_subject VALUES("HRS224","Banquet Functions and Catering Services and Procedures","3","DHRS2015","2","2");
INSERT INTO tbl_subject VALUES("IT11-1","Computer Concept and Fundamentals with the Internet (SYSTEM DEV)","3","DIT-SD2015","1","1");
INSERT INTO tbl_subject VALUES("IT11-2","Fundamentals of Problem Solving and Comp Prog-1 (PPL C/ C++)","3","DIT-SD2015","1","1");
INSERT INTO tbl_subject VALUES("IT11-3","Integrated Application Software","3","DIT-SD2015","1","1");
INSERT INTO tbl_subject VALUES("IT11-ENG11","English Communication I","3","DIT-SD2015","1","1");
INSERT INTO tbl_subject VALUES("IT11-FIL11","Sining ng Komunikasyon","3","DIT-SD2015","1","1");
INSERT INTO tbl_subject VALUES("IT11-MTH11","College Algebra","3","DIT-SD2015","1","1");
INSERT INTO tbl_subject VALUES("IT11-NSTP11","National Service Training Program 1","3","DIT-SD2015","1","1");
INSERT INTO tbl_subject VALUES("IT11-PE111","P.E (Self-Testing)","2","DIT-SD2015","1","1");
INSERT INTO tbl_subject VALUES("IT11-SOC11","Philippines History and Government","3","DIT-SD2015","1","1");
INSERT INTO tbl_subject VALUES("IT11-VAL11","Values Education","3","DIT-SD2015","1","1");
INSERT INTO tbl_subject VALUES("IT12-4","Database Management System","3","DIT-SD2015","1","2");
INSERT INTO tbl_subject VALUES("IT12-5","Data Structure","3","DIT-SD2015","1","2");
INSERT INTO tbl_subject VALUES("IT12-6","Design and Analysis of Algorithm","3","DIT-SD2015","1","2");
INSERT INTO tbl_subject VALUES("IT12-7","Object Oriented Programming (VB)","3","DIT-SD2015","1","2");
INSERT INTO tbl_subject VALUES("IT12-8","Fundamentals of Problem Solving (JAVA)","3","DIT-SD2015","1","2");
INSERT INTO tbl_subject VALUES("IT12-ENG112","English Communication II","3","DIT-SD2015","1","2");
INSERT INTO tbl_subject VALUES("IT12-FIL112","Pagbasa sa Ibant-Ibang Disiplina","3","DIT-SD2015","1","2");
INSERT INTO tbl_subject VALUES("IT12-MTH112","Trigonometry","3","DIT-SD2015","1","2");
INSERT INTO tbl_subject VALUES("IT12-NSTP12","National Service Training Program 2","3","DIT-SD2015","1","2");
INSERT INTO tbl_subject VALUES("IT12-PE12","P.E12","2","DIT-SD2015","1","2");
INSERT INTO tbl_subject VALUES("IT13-ENG113","Modern Communication","3","DIT-SD2015","2","1");
INSERT INTO tbl_subject VALUES("IT13-PE13","P.E (Individual Sports)","2","DIT-SD2015","2","1");
INSERT INTO tbl_subject VALUES("IT21-10","Database Programming 1 (VB + Database)","3","DIT-SD2015","2","1");
INSERT INTO tbl_subject VALUES("IT21-11","Object Oriented Programming 2 (VB.NET)","3","DIT-SD2015","2","1");
INSERT INTO tbl_subject VALUES("IT21-12","System Analysis and Design","3","DIT-SD2015","2","1");
INSERT INTO tbl_subject VALUES("IT21-13","Operating System","3","DIT-SD2015","2","1");
INSERT INTO tbl_subject VALUES("IT21-14","Structures of Programming Languages","3","DIT-SD2015","2","1");
INSERT INTO tbl_subject VALUES("IT21-15","Discrete Mathematics","3","DIT-SD2015","2","1");
INSERT INTO tbl_subject VALUES("IT21-9","Web Page Design and Development","3","DIT-SD2015","2","1");
INSERT INTO tbl_subject VALUES("IT22-16","Object Oriented Programming 3 (ORACLE DB)","3","DIT-SD2015","2","2");
INSERT INTO tbl_subject VALUES("IT22-17","Software Engineering","3","DIT-SD2015","2","2");
INSERT INTO tbl_subject VALUES("IT22-18","Data Communication and Networking Principle and Programming","3","DIT-SD2015","2","2");
INSERT INTO tbl_subject VALUES("IT22-19","Introduction to Artificial Intelligence","3","DIT-SD2015","2","2");
INSERT INTO tbl_subject VALUES("IT22-20","Introduction to E-Commerce","3","DIT-SD2015","2","2");
INSERT INTO tbl_subject VALUES("IT22-PE14","P.E (Organized Games)","2","DIT-SD2015","2","2");
INSERT INTO tbl_subject VALUES("IT22-PRAC1","On-the-Job Training","5","DIT-SD2015","2","2");


DROP TABLE IF EXISTS tbl_tuition_fee;

CREATE TABLE `tbl_tuition_fee` (
  `course_id` varchar(20) NOT NULL,
  `tuition_fee` int(11) NOT NULL,
  `lecture_fee` int(11) NOT NULL,
  `laboratory_fee` int(11) NOT NULL,
  `registration_fee` int(11) NOT NULL,
  `misc_fee` int(11) NOT NULL,
  PRIMARY KEY (`course_id`),
  CONSTRAINT `tbl_tuition_fee_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_course_info` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_tuition_fee VALUES("BSBA-OA","16000","2000","2500","220","3500");
INSERT INTO tbl_tuition_fee VALUES("BSCS","16000","2000","2500","220","3500");
INSERT INTO tbl_tuition_fee VALUES("BSIT","16000","2000","2500","220","3500");
INSERT INTO tbl_tuition_fee VALUES("D-HRS","16000","2000","2500","220","3500");
INSERT INTO tbl_tuition_fee VALUES("DICET","16000","2000","2500","220","3500");
INSERT INTO tbl_tuition_fee VALUES("DIT-SD","8000","2000","2500","220","3500");


