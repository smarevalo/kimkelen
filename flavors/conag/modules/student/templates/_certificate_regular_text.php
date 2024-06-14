<?php /*
 * Kimkëlen - School Management Software
 * Copyright (C) 2013 CeSPI - UNLP <desarrollo@cespi.unlp.edu.ar>
 *
 * This file is part of Kimkëlen.
 *
 * Kimkëlen is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License v2.0 as published by
 * the Free Software Foundation.
 *
 * Kimkëlen is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kimkëlen.  If not, see <http://www.gnu.org/licenses/gpl-2.0.html>.
 */ ?>
 <?php $division = DivisionPeer::retrieveByStudentCareerSchoolYear($student->getCurrentStudentCareerSchoolYear());?>

	<h3 align="center"> <u>CONSTANCIA DE ALUMNO REGULAR</u></h3>
	<p>
	    Mediante la presente hace constar que<b> <?php echo rtrim($student->getPerson()->getFullName()). ', ' . $student->getPerson()->getIdentificationTypeString().' N°'. $student->getPerson()->getIdentificationNumber() ?></b>, fecha de nacimiento <?php echo $student->getPerson()->getBirthdate('d-m-Y'); ?>, es alumno regular de este establecimiento en <?php echo $division->getYear() . '° año, división ' . $division->getDivisionTitle()->getName() ?>, durante el período lectivo <?php echo ($student->getLastStudentCareerSchoolYearCoursed()) ? $student->getLastStudentCareerSchoolYearCoursed()->getCareerSchoolYear()->getSchoolYear()->getYear() : $student->getLastStudentCareerSchoolYear()->getCareerSchoolYear()->getSchoolYear()->getYear()?>.
	</p>
