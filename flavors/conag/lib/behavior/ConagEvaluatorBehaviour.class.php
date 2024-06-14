<?php

/**
 * Copy and rename this class if you want to extend and customize
 */
class ConagEvaluatorBehaviour extends BaseEvaluatorBehaviour
{
	const MIN_NOTE = 6;
	const LAST_NOTE = 3;
	const POSTPONED_NOTE = 3;

	protected
	$_examination_number_short = array(
	  self::DECEMBER => 'Diciembre',	//Modificado antes decia Reg
	  self::FEBRUARY => 'Febrero',		//Modificado antes decia Comp
	);

	public function getMinNote()
  	{
    	return self::MIN_NOTE;
  	}

  	public function isApproved(CourseSubjectStudent $course_subject_student, $average, PropelPDO $con = null)
  	{
  		$minimum_mark = $course_subject_student->getCourseSubject($con)->getCareerSubjectSchoolYear($con)->getConfiguration($con)->getCourseMinimunMark();
    	$notas = $course_subject_student->getCourseSubjectStudentMarks(null, $con);

    	/*$suma=0;
    	foreach ($notas as $n) {
    		$suma += $n->getmark();
    	}*/

    	return $average >= $minimum_mark && $course_subject_student->getMarkFor($course_subject_student->countCourseSubjectStudentMarks(null, false, $con), $con)->getMark() > self::POSTPONED_NOTE && $notas[count($notas)-1]->getmark() > self::LAST_NOTE;
	  }


  	//Para obtener el color de la nota en la planilla de calificaciones
	public function getColorForCourseSubjectStudentMark(CourseSubjectStudentMark $course_subject_student_mark)
  	{
	    if (! $course_subject_student_mark->getIsClosed() || is_null($course_subject_student_mark->getMark()))
	    {
	      return '';
	    }

	    if ($course_subject_student_mark->getMark() >= $this->getMinNote())
	    {
	      $class = 'mark_green';
	    }
	    else
	    {
	      $class = 'mark_red';
	    }

	    return $class;
  	}

  	public function getAverage($course_subject_student, $course_subject_student_examination)
  	{
	 return (string) ( $course_subject_student_examination->getMark());

  	}

  	public function closeStudentExaminationRepprovedSubject(StudentExaminationRepprovedSubject $student_examination_repproved_subject, PropelPDO $con)
	{
		if ($student_examination_repproved_subject->getMark() >= $this->getExaminationNote())
		{
			$student_approved_career_subject = new StudentApprovedCareerSubject();
			$student_approved_career_subject->setCareerSubject($student_examination_repproved_subject->getExaminationRepprovedSubject()->getCareerSubject());
			$student_approved_career_subject->setStudent($student_examination_repproved_subject->getStudent());
			$student_approved_career_subject->setSchoolYear($student_examination_repproved_subject->getExaminationRepprovedSubject()->getExaminationRepproved()->getSchoolYear());

			//Final average is the average of the course_subject_student and the mark of student_examination_repproved_subject
			//$average = (string) (($student_examination_repproved_subject->getStudentRepprovedCourseSubject()->getCourseSubjectStudent()->getMarksAverage() + $student_examination_repproved_subject->getMark()) / 2);
			//UNDEC
			$average = (string) ($student_examination_repproved_subject->getMark() );

			$average = sprintf('%.4s', $average);
			if ($average < self::MIN_NOTE)
			{
				$average = self::MIN_NOTE;
			}
			$student_approved_career_subject->setMark($average);

			$student_repproved_course_subject = $student_examination_repproved_subject->getStudentRepprovedCourseSubject();
			$student_repproved_course_subject->setStudentApprovedCareerSubject($student_approved_career_subject);
			$student_repproved_course_subject->save($con);

			$career = $student_repproved_course_subject->getCourseSubjectStudent()->getCourseSubject()->getCareerSubjectSchoolYear()->getCareerSchoolYear()->getCareer();
			##se corrobora si la previa es la última y del último año, hay que egresarlo
			$previous = StudentRepprovedCourseSubjectPeer::countRepprovedForStudentAndCareer($student_repproved_course_subject->getStudent(), $career);
			if ($student_repproved_course_subject->getStudent()->getCurrentOrLastStudentCareerSchoolYear()->getYear() >= CareerPeer::getMaxYear() && $previous == 0)
			{
				$career_student = CareerStudentPeer::retrieveByCareerAndStudent($career->getId(), $student_repproved_course_subject->getStudent()->getId());;
				$career_student->setStatus(CareerStudentStatus::GRADUATE);
				//se guarda el school_year en que termino esta carrera
				$career_student->setGraduationSchoolYearId(SchoolYearPeer::retrieveCurrent()->getId());
				$career_student->save($con);
				//se guarda el estado en el student_career_school_year
				$scsy = $student_repproved_course_subject->getCourseSubjectStudent()->getStudent()->getCurrentOrLastStudentCareerSchoolYear();
				$scsy->setStatus(StudentCareerSchoolYearStatus::APPROVED);
				$scsy->save();
			}

			##se agrega el campo en student_disapproved_course_subject a el link del resultado final
			$student_repproved_course_subject->getCourseSubjectStudent()->getCourseResult()->setStudentApprovedCareerSubject($student_approved_career_subject)->save($con);

			$student_approved_career_subject->save($con);
		}

	}

	public function getMarksAverage($course_subject_student, PropelPDO $con = null)
  	{
	    $sum = 0;
	    foreach ($course_subject_student->getCourseSubjectStudentMarks(null, $con) as $cssm)
	    {
	      $sum += $cssm->getMark();
	    }

	    $average = (string) round(($sum / $course_subject_student->countCourseSubjectStudentMarks(null, false, $con)), 2);
	    $average = sprintf('%.4s', $average);
	    return $average;
	}

  	/*en conag todos los alumnos pueden rendir en diciembre */
    public function getExaminationNumberFor($average, $is_free = false, $course_subject_student = null)
    {
        return self::DECEMBER;
    }

}
