<?php
/**
 * Group blog module
 */

$group = elgg_get_page_owner_entity();

if ($group->assemblies_enable == "no") {
	return true;
}

$all_link = elgg_view('output/url', array(
	'href' => "assembly/view/$group->guid",
	'text' => elgg_echo('assemblies:link:view'),
	'is_trusted' => true,
));

$all_link .= " ".elgg_view('output/url', array(
	'href' => "assembly/edit/$group->guid",
	'text' => elgg_echo('assemblies:link:edit'),
	'is_trusted' => true,
));

$info = elgg_view("assemblies/info", array('entity' => $guid));
$agenda = elgg_view("assemblies/agenda", array('entity' => $guid));
$minutes = elgg_view("assemblies/minutes", array('entity' => $guid));

$content = $info . $agenda . $minutes;

echo elgg_view('groups/profile/module', array(
	'title' => elgg_echo('assemblies:group'),
	'content' => $content,
	'all_link' => $all_link,
	#'add_link' => $new_link,
));
