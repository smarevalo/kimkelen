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

<?php use_helper('Date') ?>

    <div class="footer-text">
            <span style="font-size: 12px;">
            PLAN DE ESTUDIOS APROBADO POR R.R N° 165.11.-<br>
            VALIDEZ NACIONAL otorgada por R.M. N° 2872/15.-
            </span>

            <?php 
                if(!$analytical->has_completed_career()){
            ?>
                <br><br>Se le otorga certificado de estudios incompletos a solicitud del Tutor, a: <?php if(isset($egreso)) echo $egreso.'.-'; else echo "----"; ?>
            <?php       
                } 
            ?>

            <br>

            <?php if($analytical->has_completed_career() && isset($egreso)){
                        echo "<br>Fecha de egreso: ".$egreso.'.-';        
                    }
            ?>
            
            <span style="font-size: 12px;">
            <br>Libro Matriz N° <?php if(isset($matriz)) echo $matriz.'.-'; else echo "----"; ?>
            <br>Folio N° <?php if(isset($folio)) echo $folio.'.-'; else echo "----"; ?>
            </span>
            <?php
            /*
            Otorgado en la localidad de TILIMUQUI, DEPARTAMENTO CHILECITO, PROVINCIA DE LA RIOJA, República Argentina, el dia 19 <?php //echo date('d'); ?> del mes de  Noviembre<?php //echo format_date(time(), 'MMMM'); ?> de 2019<?php //echo date('Y'); ?>.-
            */
            ?>
            <?php 
                if(!$analytical->has_completed_career()){
                    echo "<br><br><br>";
                }else{
                    echo "<p style=\"margin-top: 13em\"></p>";
                }
            
	   ?>
   
	        
            Otorgado en la localidad de TILIMUQUI, DEPARTAMENTO CHILECITO, PROVINCIA DE LA RIOJA, República Argentina, el día <?php echo date('d'); ?> del mes de <?php echo format_date(time(), 'MMMM'); ?> de <?php echo date('Y'); ?>.- 


         
<?php /*	
 
            Otorgado en la localidad de TILIMUQUI, DEPARTAMENTO CHILECITO, PROVINCIA DE LA RIOJA, República Argentina, el día 14 del mes de Noviembre de 2023.-

*/ ?>
           
           <?php
                if(!$analytical->has_completed_career()){
                    echo "<br><br><br>";
                }
            ?>
    </div>





<?php 
    /*
<div class="header-text">

            <br>
            <p align="justify">Plan de Estudios aprobado por RESOLUCIÓN MINISTERIAL Nº 2872/15 del MINISTERIO DE EDUCACIÓN DE LA NACIÓN.</p>

            <P align="justify">Se extiende el presente certificado, sin raspaduras ni enmiendas, para ser presentado ante las autoridades de 

            <?php if(isset($pase)): ?>
                <?php echo '<b>'.strtoupper($pase).'</b>'; ?>
            <?php endif ?>, 

            en la Localidad de TILIMUQUI, Departamento <?php echo __('escuela_ciudad'); ?> Provincia de La Rioja, el dia <?php echo date('d'); ?> días del mes de  <?php echo format_date(time(), 'MMMM'); ?> de <?php echo date('Y'); ?>. 
            </p>

            <p align="justify">Régimen de Evaluación, Calificación, Acreditación y Promoción: Reglamento Institucional aprobado Resolución Rectoral Nº 098/2.010. Escala Numérica: 1 a 10 - Aprobado: 6 (seis).
    </div>
    */
?>
