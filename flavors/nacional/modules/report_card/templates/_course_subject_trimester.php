<?php 
/*
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
<?php $is_repproved = $student_career_school_year->isRepproved() ?>
<?php $max_marks = 0 ?>
<?php foreach ($course_subject_students as $course_subject_student): ?>
  <?php $max_marks = ($course_subject_student->getCourseSubject()->countMarks() > $max_marks) ? $course_subject_student->getCourseSubject()->countMarks() : $max_marks ?>
<?php endforeach; ?>

<div class="title"><?php echo ($has_attendance_for_subject) ? __('Marks for subject') : __('Marks for day'); ?></div>
<table class="gridtable">
  <tr>
    <?php include_partial('th_trimester_tabular', array('has_attendance_for_subject' => $has_attendance_for_subject, 'course_subject_students' => $course_subject_students)) ?>

  </tr>
  <?php foreach ($course_subject_students as $course_subject_student): ?>
    <tr>

      <td class='subject_name'><?php echo $course_subject_student->getCourseSubject()->getCareerSubject()->getSubject()->getName() ?></td>

      <?php for ($mark_number = 1; $mark_number <= $max_marks; $mark_number++): ?>
        <td><?php echo $course_subject_student->getMarkForIsClosed($mark_number) ?></td>
      <?php endfor; ?>
      <?php $course_result = $course_subject_student->getCourseResult() ?>
      <td><?php echo ($course_result) ? $course_result->getResultStr() : '' ?></td>
      <td><?php echo (($course_result instanceOf StudentDisapprovedCourseSubject) && $course_subject_student_examination = $course_subject_student->getCourseSubjectStudentExaminationsForExaminationNumber(1)) ? $course_subject_student_examination->getMarkStr() : '' ?></td>
      <td><?php echo (($course_result instanceOf StudentDisapprovedCourseSubject) && $course_subject_student_examination = $course_subject_student->getCourseSubjectStudentExaminationsForExaminationNumber(2)) ? $course_subject_student_examination->getMarkStr() : '' ?></td>
      <?php if (!is_null($student_repproved_course_subject = $course_subject_student->repprovedCourseSubjectHasBeenApproved())): ?>
        <td><?php echo ($student_repproved_course_subject->getLastMarkStr()) ?></td>
      <?php else: ?>
        <td></td>
      <?php endif; ?>
      <td>
        <?php if ($is_repproved): ?>
          <?php echo $course_subject_student->getFinalAvg() ?>
        <?php else: ?>
          
          <?php if( !is_null($course_result) && $course_result->getCourseSubjectStudent()->getIsNotAverageable() && ! is_null($course_result->getCourseSubjectStudent()->getNotAverageableCalification())): ?>
            <?php if($course_result->getCourseSubjectStudent()->getNotAverageableCalification() == NotAverageableCalificationType::APPROVED
|| (! is_null($course_result->getStudentApprovedCareerSubject()))): ?>
              <?php echo __("Trayectoria completa"); ?>
            <?php else: ?>  
                <?php echo __("Trayectoria en curso"); ?>
            <?php endif; ?>
          
          <?php else: ?>    
              <?php echo $student->getPromDef($course_result) ?>
          <?php endif ?>
        <?php endif ?>
      </td>
      <?php if ($has_attendance_for_subject): ?>
        <?php foreach ($periods as $period): ?>
          <td>
            <?php
            echo $period->getIsClosed() ? round($student->getTotalAbsences($student_career_school_year->getCareerSchoolYearId(), $period, $course_subject_student->getCourseSubjectId(), true), 2) : '&nbsp'
            ?>
          </td>
        <?php endforeach; ?>
      <?php endif; ?>
    </tr>
  <?php endforeach; ?>
</table>
