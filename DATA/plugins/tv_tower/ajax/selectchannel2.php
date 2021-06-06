<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/selectchannel2.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Load the language file from the Hook by name of Hook and Plugin
// CZ: Načtení jazykového souboru z Hook podle jména Hook a Pluginu
$hooklang = $envohooks -> EnvoGethook("php_lang", "tvtower");
eval($hooklang['phpcode']);

// EN: Set value
// CZ: Nastavení hodnot
$channelIDs = $_POST['channelIDs'];
$ids        = implode(',', $channelIDs);
$lasttower  = '';

// EN: Get data from DB and write to output
// CZ: Získání dat z DB a výpis do výstupu
foreach ($channelIDs as $channelIDs) {
	$ids           = explode(',', $channelIDs);
	$towerid       = $ids[0];
	$channelid     = $ids[1];
	$channelnumber = $ids[2];


	if ($towerid != $lasttower) {
		$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'tvtowertvtower WHERE id =' . $towerid);
		$row    = $result -> fetch_assoc();

		echo '<div id="tramsmitter-' . $row['varname'] . '">';
		echo '<h4>' . $row['name'] . ' - ' . $row['station'] . '</h4>';
	}

	echo '<div class="table-responsive">';
	echo '<table class="table table-hover">';
	echo '<thead>
          <tr>
            <th>' . $tltt["tt_frontend_list"]["ttl6"] . '</th>
            <th>' . $tltt["tt_frontend_list"]["ttl7"] . '</th>
            <th>' . $tltt["tt_frontend_list"]["ttl8"] . '</th>
            <th>' . $tltt["tt_frontend_list"]["ttl9"] . '</th>
            <th>' . $tltt["tt_frontend_list"]["ttl10"] . '</th>
            <th>' . $tltt["tt_frontend_list"]["ttl11"] . '</th>
            <th>' . $tltt["tt_frontend_list"]["ttl12"] . '</th>
          </tr>
        </thead>';
	echo '<tbody>';

	$result1 = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'tvtowertvprogram WHERE towerid =' . $towerid . ' AND channelid =' . $channelid . ' ORDER BY tvr DESC');

	// EN: Determine the number of rows in the result from DB
	// CZ: Určení počtu řádků ve výsledku z DB
	$row_cnt = $result1 -> num_rows;

	if ($row_cnt > 0) {
		while ($row1 = $result1 -> fetch_assoc()) {

			// Liché TR - základní informace o programu
			echo '<tr class="' . (($row1['online'] == 1) ? 'online' : 'offline') . '">';
			echo '<td><img class="programlogo" src="' . $row1['icon'] . '" style="height:19px;"></td>';
			echo '<td>' . $row1['name'] . '</td>';
			echo '<td>' . (($row1['tvr'] == '1') ? 'TV' : (($row1['tvr'] == '2') ? 'Stream TV' : 'Radio')) . '</td>';


			$result2 = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'tvtowertvchannel WHERE id =' . $channelid);

			while ($row2 = $result2 -> fetch_assoc()) {
				echo '<td>' . $row2['number'] . ' K</td>';  // Číslo kanálu
				echo '<td>' . $row2['frequency'] . ' MHz</td>';  // Kmitočet kanálu
				echo '<td>' . $row2['sitename'] . '</td>';  // Název sítě kanálu
				echo '<td>' . $row2['type'] . '</td>';      // Technologie vysílání
			}

			echo '</tr>';
			echo PHP_EOL; // Nový řádek ve zdrojovém kódu

		}
	} else {
		echo '<tr class="noresult">';
		echo '<td colspan="7">' . $tltt["tt_frontend_list"]["ttl30"] . '</td>';
		echo '</tr>';
		echo PHP_EOL; // Nový řádek ve zdrojovém kódu
	}


	echo '</tbody>';
	echo '</table>';
	echo '</div>';

	echo '</div>';
	$lasttower = $towerid;
}


?>