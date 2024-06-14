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
<div class="report-header">
    <div class="header_row">
        
        <div class="title" id="header_analytical_data_left">
            <div align="center">
                <?php echo image_tag("kimkelen_logo_analitico.png", array( 'class'=>'escudo_conag_analytical', 'absolute' => true)) ?>
                <small >
                    <?php //echo __("<br>COLEGIO NACIONAL AGROTÉCNICO,<br>ING. JULIO CÉSAR MARTÍNEZ") ?>
                </small>
            </div>
        </div>


        <div class="title" id="header_analytical_data_center">
            
            <div align="center">
                <?php echo image_tag("logo_min_analitico.png", array( 'class'=>'school_logo_analytical', 'absolute' => true)) ?>
                <small>
                    <?php echo __("<br>MINISTERIO DE EDUCACION") ?>
			 
			
                </small>
            </div>

            <?php $school_name = SchoolBehaviourFactory::getInstance()->getSchoolName(); ?>

            <h3>
                <?php echo mb_strtoupper($school_name,'utf-8') ?>
            </h3>
            
            <h5>
                UNIVERSIDAD NACIONAL DE CHILECITO 
            </h5>
        </div>


        <div id="header_analytical_data_right" class="title">
            <div align="center">
                <?php echo image_tag("logo_undec_analitico.jpg", array( 'class'=>'school_logo_analytical', 'absolute' => true)) ?>
                <small>
                    <?php //echo __("<br>Universidad Nacional de Chilecito") ?>
                </small>
            </div>
        </div>


	    <?php if ($analytical->showCertificate()): ?>
            <div id="header_analytical_data_right" class="title">
                <?php echo __('Certificado N°'); ?>
                <?php echo (isset($analytic)?$analytic->getId():__('S/N')); ?>
            </div>
	    <?php endif; ?>

    </div>

    <div id="header_analytical_data_right" class="title">
        <?php if(isset($form)): ?>
            <div class="analytical-form">
               <?php echo $form; ?>
            </div> 
        <?php endif;?>
    </div>

    <div class="header_row">
        <?php if(isset($matriz) || isset($folio) || isset($cue) || isset($egreso)): ?>
           <?php include_partial('analytical_header_text', array('student' => $career_student->getStudent(), 'career_student' => $career_student, 'egreso' => $egreso, 'cue' => $cue, 'folio' => $folio, 'matriz' => $matriz, 'analytical' => $analytical)) ?>

        <?php else:?>
            <?php include_partial('analytical_header_text', array('student' => $career_student->getStudent(), 'career_student' => $career_student, 'analytical' => $analytical)) ?>
        <?php endif;?>
    </div>

</div>
