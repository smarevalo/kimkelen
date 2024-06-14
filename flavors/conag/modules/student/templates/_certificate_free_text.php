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
<h3 align="center"> <u>CONSTANCIA DE MATERIAS ADEUDADAS</u></h3>
 
<p>
    La Directora del <?php echo SchoolBehaviourFactory::getInstance()->getSchoolName() ?>, hace constar que el alumno
    <b><?php echo $student .' '. $student->getPerson()->getFullIdentification() ?> </b>
    se retira del establecimiento 
			    
    <?php if(count ($p) == 0): ?>
	<?php echo "sin adeudar materias"?>
    <?php else:?>
		
	<?php echo 'adeudando las siguientes materias:' ?>  
	<br><br>
	<b>
		<?php //echo ' * '.$p[0]->getCourseSubject() .' - '.  $p[0]->getCourseSubject()->getCareerSubjectSchoolYear()->getCareerSubject()->getYear() .'° año' ?>
		<?php echo ' * '.$p[0]->getCourseSubject()->getCareerSubjectSchoolYear()->getCareerSubject()->getYear() .'° año'.' - '.$p[0]->getCourseSubject() ?>		
	</b>
	
	<br>		
	<?php for($i= 1 ; $i < count($p)  ; $i++): ?>
	<b>
            <?php //echo ($i == (count($p) -1)) ? 'y' : ',' ;?>
            <?php //echo '*' ;?>
            <?php //echo $p[$i]->getCourseSubject() .' - '.  $p[$i]->getCourseSubject()->getCareerSubjectSchoolYear()->getCareerSubject()->getYear() .'° año';?>
            <?php echo ' * '.$p[$i]->getCourseSubject()->getCareerSubjectSchoolYear()->getCareerSubject()->getYear() .'° año'.' - '.$p[$i]->getCourseSubject() ?>	
            <br> 
	</b>
	<?php endfor?>
    <?php endif?>
    <?php //echo '.'?>
</p>
