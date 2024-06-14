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

<?php if ($object->is_empty()): ?>

  <div class="notice" style="padding: 20px; background-image: none; margin-bottom: 15px;">
    <?php echo __('The student has no approved subjects') ?>
  </div>

<?php else:?>

  <?php $var =  new StdClass(); $var = $object->get_years_in_career(); sort($var);?>
  
  
  <?php foreach ($var as $year): ?>

    <table class="table gridtable_bordered">
      <thead>
        <tr>
          <th colspan="6"><strong><?php echo mb_strtoupper( __('Year ' . $year),'utf-8') ?></strong></th>
        </tr>
        <tr>
          <th class="text-left" rowspan="2"><?php echo __("ESPACIO CURRICULAR") ?></th>
          <th colspan="2"><?php echo __("CALIFICACIÓN") ?></th>

          <th ><?php echo __("CONDICIÓN") ?></th>
          <th ><?php echo __("FECHA") ?></th>
          <th ><?php echo __("ESTABLECIMIENTO") ?></th>
          
          
        </tr>

      </thead>

      <tbody class="analytical_body_table">

      <?php foreach ($object->get_subjects_in_year($year) as $css):?>  
        <tr>
          <td align="left" width="40%" id="analytical_column_table">
            <?php echo $css->getSubjectName() ?>
          </td>

          <td colspan="2" class="text-center" width="12%" id="analytical_column_table">
            <?php echo ($css->getMark() ? $css->getMark().' ('.strtolower($css->getMarkAsSymbol()).')' : '<strong>'.__('Adeuda').'</strong>') ?>
          </td>

          <td class="text-center" width="8%" id="analytical_column_table">
            <?php echo ($css->getApprovedDate() ? 'REGULAR' : '<hr/>') ?>
          </td>
          
          <td class="text-center" width="8%" id="analytical_column_table">
            <?php //var_dump($css); exit(); ?>
            <?php echo ($css->getApprovedDate() ? ucwords(format_datetime($css->getApprovedDate()->format('U'),'dd/MM/yyyy')):'<hr/>') ?> 
          </td>
          
          <td class="text-center" width="20%" id="analytical_column_table">
            <?php echo 'ESTE ESTABLECIMIENTO' ?>
          </td>

        </tr>

      <?php endforeach ?>

        
      </tbody>
    </table>
    
  <?php endforeach ?>

  <div class="header-text"> 
   
  <?php if ($object->has_completed_career()): ?>

    <p align="justify"><?php echo ($student->getPerson()->getSex()==1)? "El alumno": "La alumna" ; ?> <b><?php echo mb_strtoupper( rtrim($student->getPerson()->getFullName()). ', ' . $student->getPerson()->getIdentificationTypeString().' N°'. $student->getPerson()->getIdentificationNumber(),'utf-8')?></b>, obtuvo el CERTIFICADO DE ESTUDIO de <b><?php echo ($student->getPerson()->getSex()==1)? "TÉCNICO AGRÓNOMO": "TÉCNICA AGRÓNOMA" ; ?></b>, que se corresponde con EDUCACIÓN SECUNDARIA

      <?php if($object->get_total_average()) { ?>
        <?php $decimal = explode('.', strval(round($object->get_total_average(),2))); ?>
      
        , habiendo obtenido un PROMEDIO GENERAL de <b><?php echo ($object->get_total_average()?round($object->get_total_average(),2):'-'); ?> (<?php echo unidad(intval($object->get_total_average())).'/'.$decimal[1]; ?>)</b>.
      </p>
      
      <?php }else{ ?>

        .
      <?php } ?>

  <?php endif;  ?>

  </div>

<?php endif; ?>


<?php function unidad($numuero){
  switch ($numuero){
      case 9:{$numu = "NUEVE";break;}
      case 8: {$numu = "OCHO";break;}
      case 7:{$numu = "SIETE";break;}
      case 6:{$numu = "SEIS";break;}
      case 5:{$numu = "CINCO";break;}
      case 4:{$numu = "CUATRO";break;}
      case 3:{$numu = "TRES";break;}
      case 2:{$numu = "DOS";break;}
      case 1:{$numu = "UNO";break;}
      case 0:{$numu = "";break;}
    }
  return $numu;
}  ?>
<?php
/* TABLA ANTERIOR

<?php else:?>

  <?php $var =  new StdClass(); $var = $object->get_years_in_career(); sort($var);?>
  
  
  <?php foreach ($var as $year): ?>

    <table class="table gridtable_bordered">
      <thead>
        <tr>
          <th colspan="7"><?php echo __('Year ' . $year) ?></th>
        </tr>
        <tr>
          <th rowspan="2"><?php echo __("Condition") ?></th>
          <th rowspan="2"><?php echo __("Fecha") ?></th>
          <th rowspan="2"><?php echo __("Año Lectivo") ?></th>
          <th class="text-left" rowspan="2"><?php echo __("Subject") ?></th>
          <th colspan="2"><?php echo __("Calification") ?></th>
        </tr>
        <tr>
          <th>Nro.</th>
          <th>Letras</th>
        </tr>
      </thead>

      <tbody class="analytical_body_table">
      
      <?php //foreach ($object->get_subjects_in_year($year) as $css):?>
      <?php foreach ($object->get_subjects_in_year($year) as $css):?>  
        <tr>
          <?php //echo '<pre>'; var_dump($css->getMark()); echo '</pre>'; echo 'Promedio gral'.$object->get_year_average($year); ?>
          <td class="text-center" width="5%" id="analytical_column_table">
            <?php echo ($css->getCondition()?$css->getCondition():'<hr/>') ?>
          </td>
          
          <td class="text-center" width="10%" id="analytical_column_table">
            <?php //echo ($css->getApprovedDate() ? ucwords(format_datetime($css->getApprovedDate()->format('U'),'MMMM')):'<hr/>') ?> 
            <?php echo ($css->getApprovedDate() ? ucwords(format_datetime($css->getApprovedDate()->format('U'),'dd/MM/yyyy')):'<hr/>') ?> 
          </td>
          
          <td class="text-center" width="10%" id="analytical_column_table">
            <?php echo ($css->getApprovedDate() ? $css->getApprovedDate()->format('Y') : '<hr/>') //($css->getSchoolYear()?$css->getSchoolYear():'<hr/>') ?>
            </td>
          
          <td align="left" width="40%" id="analytical_column_table">
            <?php echo $css->getSubjectName() ?>
          </td>
          
          <td class="text-center" width="10%" id="analytical_column_table">
            <?php echo ($css->getMark()?$css->getMark():'<strong>'.__('Adeuda').'</strong>') ?>
          </td>
          
          <td class="text-center" id="analytical_column_table">
            <?php echo ($css->getMarkAsSymbol()?$css->getMarkAsSymbol():'<strong>'.__('Adeuda').'</strong>') ?>
            </td>

        </tr>

      <?php endforeach ?>
      
        <tr>
        
          <th colspan="5" style="text-align:left !important;" id="analytical_column_table">
            <?php echo __($object->get_str_year_status($year)) ?>
          </th>
          
          <th colspan="2" id="analytical_column_table"><?php echo __('Average') ?>: 
            <?php echo ( $object->get_year_average($year) ? bcdiv($object->get_year_average($year),'1',2) : '-'); ?>    <?php //Promedio anual sin redondeo?>
          </th>
        
        </tr>
      </tbody>
    </table>

  <?php endforeach ?>


  <?php if ($object->has_completed_career()): ?>
    
    <div id="promedio_gral"><?php echo __('Promedio general'); ?>: 
      <span id="promedio_gral_valor">  <?php echo ($object->get_total_average()?round($object->get_total_average(),2):'-'); ?>
      </span>
    </div>

  <?php endif; ?>

<?php endif; ?>


*/
?>