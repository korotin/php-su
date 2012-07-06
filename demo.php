<?php
/* $Id: demo.php 6 2012-05-10 12:48:32Z m4 $ */

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'su.php';
mb_internal_encoding('UTF-8');

function outputMethod($class, $method, $args) {
	echo '<tr>';
	echo '<td><b>'.$class.'::'.$method.'</b></td>';
	echo '<td>';
	foreach ($args as $argName => $argValue) {
		echo '<b>$'.$argName.'</b> = '.var_export($argValue, true).'<br/>';
	}
	echo '</td>';
	echo '<td>'.var_export(call_user_func_array(array($class, $method), $args), true).'</td>';
	echo '</tr>';
}

?><!DOCTYPE html>
<html>
	<head>
		<title>StringUtils demo page</title>
		<style type="text/css">
			tr { vertical-align: baseline; }
			td { padding: 0 10px; }
		</style>
	</head>
	<body>
		<table border="1">
			<thead>
				<tr>
					<th>Method</th>
					<th>Args</th>
					<th>Result</th>
				</tr>
			</thead>
			<tbody>
				<?php outputMethod('su', 'substr', array(
						's' => 'you spin me baby right round', 
						'start' => -11, 
						'end' => -6,
				)); ?>
				
				<?php outputMethod('su', 'startsWith', array(
						's' => 'you spin me baby right round', 
						'p' => 'you spin',
				)); ?>
				
				<?php outputMethod('su', 'endsWith', array(
						's' => 'you spin me baby right round', 
						'p' => 'rightRound',
				)); ?>
				
				<?php outputMethod('su', 'glue', array(
						'p' => '/', 
						's1' => '/home/',
						's2' => '/m4',
						'start' => true,
						'end' => true,
				)); ?>
				
				<?php outputMethod('su', 'shorten', array(
						's' => 'you spin me baby right round', 
						'len' => 11,
				)); ?>
				
				<?php outputMethod('su', 'ucfirst', array(
						's' => 'кокаин',
				)); ?>
				
				<?php outputMethod('su', 'lcfirst', array(
						's' => 'Кокаин',
				)); ?>
				
				<?php outputMethod('su', 'ucwords', array(
						's' => 'кокаин кокаин кокаинушка',
				)); ?>
				
				<?php outputMethod('su', 'lcwords', array(
						's' => 'Кокаин Кокаин Кокаинушка',
				)); ?>
				
				<?php outputMethod('su', 'cutOnSpace', array(
						's' => 'you spin me baby right round', 
						'len' => 5,
				)); ?>
				
				<?php outputMethod('su', 'caseForNumber', array(
						'number' => 15, 
						'cases' => array('штука', 'штуки', 'штук'),
				)); ?>
				
				<?php outputMethod('su', 'translit', array(
						's' => 'циско',
				)); ?>
				
				<?php outputMethod('su', 'fileSize', array(
						'size' => 6667666,
				)); ?>
				
				<?php outputMethod('su', 'fileName', array(
						's' => 'Бухаем у Вована на даче!!.jpg',
				)); ?>
				
				<?php outputMethod('su', 'isUrl', array(
						's' => 'яндекс.рф/я-люблю-кириллические-домены',
				)); ?>
				
				<?php outputMethod('su', 'isEmail', array(
						's' => 'дима@кремль.рф',
				)); ?>
				
				<?php outputMethod('su', 'isPhone', array(
						's' => '+7(916)666-66-66',
				)); ?>
				
				<?php outputMethod('su', 'normalizeUrl', array(
						's' => 'яндекс.рф/я-люблю-кириллические-домены',
				)); ?>
				
				<?php outputMethod('su', 'beautifyUrl', array(
						's' => 'http://www.ya.ru/',
				)); ?>
				
				<?php outputMethod('su', 'parseUrls', array(
						's' => 'ya.ru/test@test. herr.offizier@gmail.com test.ru',
				)); ?>
			</tbody>
		</table>
	</body>
</html>