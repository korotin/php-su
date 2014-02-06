<?php
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
						's' => 'тест',
				)); ?>
				
				<?php outputMethod('su', 'lcfirst', array(
						's' => 'тест',
				)); ?>
				
				<?php outputMethod('su', 'ucwords', array(
						's' => 'тест тест тест',
				)); ?>
				
				<?php outputMethod('su', 'lcwords', array(
						's' => 'Тест Тест Тест',
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
						's' => 'http://habrahabr.ru/post/146262/',
						'len' => 10,
				)); ?>
				
				<?php outputMethod('su', 'parseUrls', array(
						's' => 'ya.ru/test@test. some.test@gmail.com test.ru',
				)); ?>
			</tbody>
		</table>
	</body>
</html>