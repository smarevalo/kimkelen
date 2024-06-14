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
 *
 */
?>

<?php 
	if($analytical->has_completed_career()){
?>
	<br>
	<div id="analytic_signatures">
	<?php /* 
    	<div id="signature_1" class="signature"><?php echo __('analytic_signature_1'); ?></div>
    	<div id="signature_2" class="signature"><?php echo __('analytic_signature_7'); ?></div>
*/
	?>
        <div id="signature_1" class="signature">Vicedirectora</div>
        <div id="signature_2" class="signature">Rector</div>

	</div>

<?php         
    }else{ 
?>
	<div id="analytic_signatures">
    	<div id="signature_1" class="signature"><?php echo __('analytic_signature_5'); ?></div>
    	<div id="signature_2" class="signature"><?php echo __('analytic_signature_2'); ?></div>
	</div>
<?php 
	}
?>
