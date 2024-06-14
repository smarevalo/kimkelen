<?php

/**
 * Description of ConagAnalyticalBehaviour
 *
 * 
 */

class ConagAnalyticalBehaviour extends DefaultAnalyticalBehaviour
{
    public function process()
    {
        $this->student_career_school_years = $this->get_student()->getStudentCareerSchoolYears();
    $scsy_cursed = $this->get_student()->getLastStudentCareerSchoolYearCoursed();   

        //Deberia recorrer todos los "scsy" y recuperar por c/año las materias
        $this->init();
        $avg_mark_for_year = array();

        foreach ($this->student_career_school_years as $scsy)
        {
            //Si está en el arreglo de estados válidos o está retirado y cursó materias en ese año o si repitio ero fue el ultimo año que cursó
            if (in_array($scsy->getStatus(), $this->valid_status) || ($scsy->getStatus() == StudentCareerSchoolYearStatus::WITHDRAWN  && 
                         $scsy->getId() == $scsy_cursed->getId()) || ($scsy->getStatus() == StudentCareerSchoolYearStatus::REPPROVED && 
                         $scsy->getId() == $scsy_cursed->getId()) )
            {
                $year_in_career = $scsy->getYear(); 
                $this->add_year_in_career($year_in_career);
                $career_school_year = $scsy->getCareerSchoolYear();
                $school_year = $career_school_year->getSchoolYear();

                $approved = StudentApprovedCareerSubjectPeer::retrieveByStudentAndSchoolYear($this->get_student(), $school_year);
                $csss = SchoolBehaviourFactory::getInstance()->getCourseSubjectStudentsForAnalytics($this->get_student(), $school_year, $scsy);
                
                foreach ($csss as $css)
                {   
                    if (!isset($this->objects[$year_in_career]))
                    {
                        // Inicialización por año
                        $this->set_year_status($year_in_career, self::YEAR_COMPLETE);
                        $avg_mark_for_year[$year_in_career]['sum'] = 0;
                        $avg_mark_for_year[$year_in_career]['count'] = 0;
                    }
                    
                    if ($this->subject_is_averageable($css))
                    {
                        $avg_mark_for_year[$year_in_career]['sum'] += $css->getMark(); 
                        $avg_mark_for_year[$year_in_career]['count'] += ($css->getMark(false) ? 1 : 0);
                        if (!$css->getMark(false))
                        {
                            // No tiene nota -> el curso está incompleto
                            $this->set_year_status($year_in_career, self::YEAR_INCOMPLETE);
                            $this->add_missing_subject($css);
                        }
                    }
                   
                    $this->add_subject_to_year($year_in_career, $css);
                    $this->check_last_exam_date($css->getApprovedDate(false));
                }

                // Cálculo del promedio por año
                foreach ($this->objects as $year => $data)
                {
                    $this->process_year_average($year, $avg_mark_for_year[$year]['sum'], $avg_mark_for_year[$year]['count']);
                }
                $this->process_total_average($avg_mark_for_year);
                
            }            
        }
    }

    protected function process_year_average($year, $sum, $count)
    {
        /*if (self::YEAR_COMPLETE === $this->get_year_status($year))
        {*/
            // Si el curso está completo, calculo el promedio
            if ($count > 0)
                $this->objects[$year]['average'] = ($sum / $count);
        /*}
        else
        {
            // Si el curso no está completo, no se muestra el promedio
            $this->objects[$year]['average'] = ($sum / $count);
        }*/
    }
}
