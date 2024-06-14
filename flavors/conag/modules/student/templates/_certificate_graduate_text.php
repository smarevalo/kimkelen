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
<h3 align="center"> <u>CONSTANCIA DE FINALIZACIÓN DE ESTUDIO</u></h3>

<p>
    La Directora del <?php echo SchoolBehaviourFactory::getInstance()->getSchoolName() ?>, hace constar que el alumno
    <b> <?php echo rtrim($student->getPerson()->getFullName()). ', ' . $student->getPerson()->getIdentificationTypeString().' N°'. $student->getPerson()->getIdentificationNumber() ?></b>
    finaliza sus estudios de Nivel Secundario con el título de <b><?php echo $student->getCareerStudent()->getCareer()->getCareerName()?></b> y tiene  el certificado correspondiente en trámite en el Ministerio de Educación según R.M. N° 2872/15.-----------------------------------
</p>