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
<?php use_helper('Date') ?>
<div class="report-header">
    <div class="header_row">
		<div class="title" id="header_analytical_data_left">
            <dl class="dl-horizontal">
            </dl>
        </div>
        <div class="title" id="header_analytical_data_center">
            <div><?php echo image_tag("kimkelen_logo_analitico.png", array( 'class'=>'school_logo', 'absolute' => true)) ?></div>
            <?php $school_name = SchoolBehaviourFactory::getInstance()->getSchoolName(); ?>
	        <h1><?php echo $school_name ?> <small><?php echo __("Universidad Nacional de La Plata") ?></small></h1>
        </div>

		<div class="title" id="header_analytical_data_right">
            <div class="dl-horizontal">
                <div><?php echo __("Legajo N°") ?>:
					<span class="detail"><?php echo $career_student->getStudent()->getFileNumber($career_student->getCareer()); ?></span>
                </div>
                <div><?php echo __("Año de ingreso:") ?> 
					<span class="detail"> <?php echo $career_student->getStudent()->getInitialSchoolYear()->getYear(); ?></span>
                </div>
                <div><?php echo __("Fecha de egreso:") ?> 
					<?php if ($analytical->has_completed_career()): ?>
						<span class="detail"><?php echo $analytical->get_last_exam_date()->format('d/m/Y'); ?></span>
					<?php else: ?>
						<span class="detail"> - </span>
					<?php endif ?>
                </div>
                <div><?php echo __("RMN Nº") ?> 
					<span class="detail"><?php echo ($career_student->getCareer()->getResolutionNumber()) ? $career_student->getCareer()->getResolutionNumber() : '-';?></span>					
                </div>
            </div>
            <?php if ($analytical->showCertificate()): ?>
            <?php echo __('Certificado N°'); ?>
            <?php echo (isset($analytic)?$analytic->getId():__('S/N')); ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="header_row">
        <?php include_partial('analytical_header_text', array('student' => $career_student->getStudent(), 'career_student' => $career_student)) ?>
    </div>
</div>
