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
 *  */
// @TODO: Agregar escuela de origen (origin_school de student?)
?>
<?php use_helper('Date') ?>
<?php if(!is_null($student->getCurrentStudentCareerSchoolYear())) $division = DivisionPeer::retrieveByStudentCareerSchoolYear($student->getCurrentStudentCareerSchoolYear()); ?>

<h2 align="center" style="margin-left: -8%">CERTIFICADO DE ESTUDIO</h2><hr>

<div>
    <p class="header-text" align="justify" style="line-height: 25px;"> 
        <br>
        <?php //echo($student->getPerson()->getSex());

            if($analytical->has_completed_career()){
                echo "Quienes suscriben, <b>RECTOR</b> de la <b>UNIVERSIDAD NACIONAL DE CHILECITO</b> y <b>VICEDIRECTORA</b> ";
            }
            else{
                echo "Quien suscribe, la <b>DIRECTORA</b> ";
            }
        ?>

         del establecimiento educativo 
        <?php echo "<b>".mb_strtoupper(SchoolBehaviourFactory::getInstance()->getSchoolName(),'utf-8')."</b>" ?>, CUE N° <?php if(isset($cue)) echo $cue; else echo '<b>------</b>' ?>, 
        ubicado en la Localidad de <b>TILIMUQUI</b>, DEPARTAMENTO CHILECITO, PROVINCIA DE LA RIOJA, <b>CERTIFICAN</b> que:
        <strong>
            <?php echo mb_strtoupper( rtrim($student->getPerson()->getFullName()). ', ' . $student->getPerson()->getIdentificationTypeString().' N°'. $student->getPerson()->getIdentificationNumber(),'utf-8')?>
        </strong>
        , <?php echo ($student->getPerson()->getSex()==1)? "nacido": "nacida" ; ?> el <?php echo format_date($student->getPerson()->getBirthDate(), "D") ?> en 

            <?php 
                    if($student->getPerson()->getBirthCityRepresentation() != NULL){
                        echo ucwords($student->getPerson()->getBirthCityRepresentation()).", ";
                    }

                    if($student->getPerson()->getBirthStaterepresentation() != NULL){
                        echo ucwords($student->getPerson()->getBirthStaterepresentation()).", ";
                    }

                    if($student->getPerson()->getBirthCountryRepresentation() != NULL){
                        echo $student->getPerson()->getBirthCountryRepresentation();
                    }
            ?>

            <?php //echo ucwords($student->getPerson()->getBirthCityRepresentation()); ?> 
            <?php //echo ", ".ucwords($student->getPerson()->getBirthStaterepresentation()); ?>
            <?php //echo ", ".$student->getPerson()->getBirthCountryRepresentation(); ?>
        

            <?php /*echo ($student->getPerson()->getSex()==1)? "nacido": "nacida" ; ?> el <?php echo format_date($student->getPerson()->getBirthDate(), "D") ?> en <?php echo ucwords($student->getPerson()->getBirthCityRepresentation()); ?>, provincia de <?php echo ucwords($student->getPerson()->getBirthStaterepresentation()); ?>, <?php echo $student->getPerson()->getBirthCountryRepresentation() */ ?> 

        , acreditó los espacios curriculares que con sus respectivas calificaciones a continuación se expresan: 
        
</div>

<?php 

/* TEXTO ANTERIOR
<div>
    <p class="header-text" align="justify"> La Dirección del
        <span><?php echo SchoolBehaviourFactory::getInstance()->getSchoolName() ?></span>

         , ubicado en la Localidad de Tilimuqui, Departamento de Chilecito, Provincia de la Rioja, CERTIFICA que

        <strong>
        	<?php echo rtrim($student->getPerson()->getFullName()). ', ' . $student->getPerson()->getIdentificationTypeString().' N°'. $student->getPerson()->getIdentificationNumber() ?>
        </strong>

        , sexo 

        <strong><?php echo BaseCustomOptionsHolder::getInstance('SexType')->getStringFor($student->getPerson()->getSex()) ?>
        </strong>

        nacido/a en 

        <span>
        	<?php echo ucwords($student->getPerson()->getBirthCityRepresentation()); ?>, <?php echo ucwords($student->getPerson()->getBirthStaterepresentation()); ?>, <?php echo $student->getPerson()->getBirthCountryRepresentation() ?>
        </span>,
        
        el día 

        <strong>
        	<?php echo format_date($student->getPerson()->getBirthDate(), "D") ?>
        </strong>,
        
        <span>
        	<?php if (isset($division)) echo( 'es alumno de  '.$division->getYear().'° año.'); else echo 'es <b>EGRESADO</b> de la institución.' ?>
        </span>

        <span>
            <br><br>A solicitud del Tutor, se le otorga  PASE a          
            <b>
            <?php if(isset($pase)): ?>
                <?php echo strtoupper($pase) ?>
            <?php endif ?>
            </b>
        </span>
    </p>
</div>
*/

?>
