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
<div class="report-header">

    <div class="titulo" ><?php echo __('BOLETÍN DIGITAL - COLEGIO NACIONAL AGROTÉCNICO ING. JULIO CÉSAR MARTÍNEZ') ?></div>
 <div class="logo"><?php echo image_tag("kimkelen_logo.png", array('absolute' => true)) ?></div>
  
  <div class="school-year"><?php echo __('CICLO LECTIVO') ?>: <?php echo $school_year; ?></div>
  <div class="header_row">
    <div class="title"><?php echo __('Student') ?>: </div>
    <div class="name"><?php echo $student->getPerson()->getFullName(). ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $student->getPerson()->getIdentificationTypeString().' N°'. $student->getPerson()->getIdentificationNumber() ?> </b><br>
      Fecha de nacimiento: <?php echo $student->getPerson()->getBirthdate('d-m-Y');?> <br>
      Lugar:  <?php echo $student->getPerson()->getBirthCityRepresentation().', '. $student->getPerson()->getBirthStaterepresentation(); ?><br> 
      Curso: <?php echo $division->getYear() . '° &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; División: ' . $division->getDivisionTitle()->getName() ?></div>

    <div class="header_right">
      Legajo N° <?php echo $student->getGlobalFileNumber(); ?>
    </div>
  </div>
</div>
