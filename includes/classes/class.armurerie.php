<?php
$guild_member_guid = mysql_query("SELECT * FROM `guild_member` WHERE `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_guild_member_guid = mysql_fetch_array($guild_member_guid);
$guild_guildid = mysql_query("SELECT * FROM `guild` WHERE `guildid` = '".$row_guild_member_guid['guildid']."' LIMIT 1");
$row_guild_guildid = mysql_fetch_array($guild_guildid);

$slot0 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '0' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot0 = mysql_fetch_array($slot0);
$slot1 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '1' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot1 = mysql_fetch_array($slot1);
$slot2 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '2' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot2 = mysql_fetch_array($slot2);
$slot3 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '3' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot3 = mysql_fetch_array($slot3);
$slot4 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '4' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot4 = mysql_fetch_array($slot4);
$slot5 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '5' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot5 = mysql_fetch_array($slot5);
$slot6 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '6' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot6 = mysql_fetch_array($slot6);
$slot7 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '7' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot7 = mysql_fetch_array($slot7);
$slot8 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '8' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot8 = mysql_fetch_array($slot8);
$slot9 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '9' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot9 = mysql_fetch_array($slot9);
$slot10 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '10' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot10 = mysql_fetch_array($slot10);
$slot11 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '11' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot11 = mysql_fetch_array($slot11);
$slot12 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '12' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot12 = mysql_fetch_array($slot12);
$slot13 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '13' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot13 = mysql_fetch_array($slot13);
$slot14 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '14' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot14 = mysql_fetch_array($slot14);
$slot15 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '15' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot15 = mysql_fetch_array($slot15);
$slot16 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '16' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot16 = mysql_fetch_array($slot16);
$slot17 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '17' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot17 = mysql_fetch_array($slot17);
$slot18 = mysql_query("SELECT * FROM `character_inventory` WHERE `slot` = '18' AND `bag` = '0' AND `guid` = '".mysql_real_escape_string($_GET['guid'])."' LIMIT 1");
$row_slot18 = mysql_fetch_array($slot18);
	
/* Sélection de la base de données des objets */
$db = mysql_select_db ($array_db['db_mangos'],$cxn);
if (!$db) {
	die ('Erreur : ' . mysql_error());
}
	
$item_template_slot0 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot0['item_template']."' LIMIT 1");
$row_item_template_slot0 = mysql_fetch_array($item_template_slot0);
$item_template_slot1 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot1['item_template']."' LIMIT 1");
$row_item_template_slot1 = mysql_fetch_array($item_template_slot1);
$item_template_slot2 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot2['item_template']."' LIMIT 1");
$row_item_template_slot2 = mysql_fetch_array($item_template_slot2);
$item_template_slot3 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot3['item_template']."' LIMIT 1");
$row_item_template_slot3 = mysql_fetch_array($item_template_slot3);
$item_template_slot4 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot4['item_template']."' LIMIT 1");
$row_item_template_slot4 = mysql_fetch_array($item_template_slot4);
$item_template_slot5 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot5['item_template']."' LIMIT 1");
$row_item_template_slot5 = mysql_fetch_array($item_template_slot5);
$item_template_slot6 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot6['item_template']."' LIMIT 1");
$row_item_template_slot6 = mysql_fetch_array($item_template_slot6);
$item_template_slot7 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot7['item_template']."' LIMIT 1");
$row_item_template_slot7 = mysql_fetch_array($item_template_slot7);
$item_template_slot8 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot8['item_template']."' LIMIT 1");
$row_item_template_slot8 = mysql_fetch_array($item_template_slot8);
$item_template_slot9 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot9['item_template']."' LIMIT 1");
$row_item_template_slot9 = mysql_fetch_array($item_template_slot9);
$item_template_slot10 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot10['item_template']."' LIMIT 1");
$row_item_template_slot10 = mysql_fetch_array($item_template_slot10);
$item_template_slot11 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot11['item_template']."' LIMIT 1");
$row_item_template_slot11 = mysql_fetch_array($item_template_slot11);
$item_template_slot12 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot12['item_template']."' LIMIT 1");
$row_item_template_slot12 = mysql_fetch_array($item_template_slot12);
$item_template_slot13 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot13['item_template']."' LIMIT 1");
$row_item_template_slot13 = mysql_fetch_array($item_template_slot13);
$item_template_slot14 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot14['item_template']."' LIMIT 1");
$row_item_template_slot14 = mysql_fetch_array($item_template_slot14);
$item_template_slot15 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot15['item_template']."' LIMIT 1");
$row_item_template_slot15 = mysql_fetch_array($item_template_slot15);
$item_template_slot16 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot16['item_template']."' LIMIT 1");
$row_item_template_slot16 = mysql_fetch_array($item_template_slot16);
$item_template_slot17 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot17['item_template']."' LIMIT 1");
$row_item_template_slot17 = mysql_fetch_array($item_template_slot17);
$item_template_slot18 = mysql_query("SELECT * FROM `item_template` WHERE `entry` = '".$row_slot18['item_template']."' LIMIT 1");
$row_item_template_slot18 = mysql_fetch_array($item_template_slot18);
	
/* Sélection de la base de données du site */
$db = mysql_select_db ($array_db['db_site'],$cxn);
if (!$db) {
	die ('Erreur : ' . mysql_error());
}
	
$icon_slot0 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot0['displayid']."' LIMIT 1");
$row_icon_slot0 = mysql_fetch_array($icon_slot0);
$icon_slot1 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot1['displayid']."' LIMIT 1");
$row_icon_slot1 = mysql_fetch_array($icon_slot1);
$icon_slot2 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot2['displayid']."' LIMIT 1");
$row_icon_slot2 = mysql_fetch_array($icon_slot2);
$icon_slot3 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot3['displayid']."' LIMIT 1");
$row_icon_slot3 = mysql_fetch_array($icon_slot3);
$icon_slot4 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot4['displayid']."' LIMIT 1");
$row_icon_slot4 = mysql_fetch_array($icon_slot4);
$icon_slot5 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot5['displayid']."' LIMIT 1");
$row_icon_slot5 = mysql_fetch_array($icon_slot5);
$icon_slot6 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot6['displayid']."' LIMIT 1");
$row_icon_slot6 = mysql_fetch_array($icon_slot6);
$icon_slot7 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot7['displayid']."' LIMIT 1");
$row_icon_slot7 = mysql_fetch_array($icon_slot7);
$icon_slot8 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot8['displayid']."' LIMIT 1");
$row_icon_slot8 = mysql_fetch_array($icon_slot8);
$icon_slot9 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot9['displayid']."' LIMIT 1");
$row_icon_slot9 = mysql_fetch_array($icon_slot9);
$icon_slot10 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot10['displayid']."' LIMIT 1");
$row_icon_slot10 = mysql_fetch_array($icon_slot10);
$icon_slot11 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot11['displayid']."' LIMIT 1");
$row_icon_slot11 = mysql_fetch_array($icon_slot11);
$icon_slot12 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot12['displayid']."' LIMIT 1");
$row_icon_slot12 = mysql_fetch_array($icon_slot12);
$icon_slot13 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot13['displayid']."' LIMIT 1");
$row_icon_slot13 = mysql_fetch_array($icon_slot13);
$icon_slot14 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot14['displayid']."' LIMIT 1");
$row_icon_slot14 = mysql_fetch_array($icon_slot14);
$icon_slot15 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot15['displayid']."' LIMIT 1");
$row_icon_slot15 = mysql_fetch_array($icon_slot15);
$icon_slot16 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot16['displayid']."' LIMIT 1");
$row_icon_slot16 = mysql_fetch_array($icon_slot16);
$icon_slot17 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot17['displayid']."' LIMIT 1");
$row_icon_slot17 = mysql_fetch_array($icon_slot17);
$icon_slot18 = mysql_query("SELECT * FROM `armory_icons` WHERE `displayid` = '".$row_item_template_slot18['displayid']."' LIMIT 1");
$row_icon_slot18 = mysql_fetch_array($icon_slot18);
?>