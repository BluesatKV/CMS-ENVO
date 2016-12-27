<?php

// Get the data per array for faqs
function jak_get_faqs($limit, $jakvar1, $table)
{

  $sqlwhere = '';
  if (!empty($jakvar1)) $sqlwhere = 'WHERE catid = ' . smartsql($jakvar1) . ' ';

  global $jakdb;
  $jakdata = array();
  $result = $jakdb->query('SELECT * FROM ' . $table . ' ' . $sqlwhere . 'ORDER BY id DESC ' . $limit);
  while ($row = $result->fetch_assoc()) {
    // collect each record into $_data
    $jakdata[] = $row;
  }

  if (!empty($jakdata)) return $jakdata;
}

// Get the faq comments
function jak_get_faq_comments($limit, $jakvar1, $jakvar2)
{
  if ($jakvar1 == 'approve') {
    $sqlwhere = 'WHERE approve = 0 AND trash = 0 ';
  } elseif ($jakvar2 == 'faqid') {
    $sqlwhere = 'WHERE faqid = ' . smartsql($jakvar1) . ' AND trash = 0 ';
  } elseif ($jakvar2 == 'userid') {
    $sqlwhere = 'WHERE userid = ' . smartsql($jakvar1) . ' AND trash = 0 ';
  } else {
    $sqlwhere = 'WHERE trash = 0 ';
  }

  global $jakdb;
  $jakdata = array();
  $result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'faqcomments ' . $sqlwhere . 'ORDER BY id, approve = 0 DESC ' . $limit);
  while ($row = $result->fetch_assoc()) {
    // collect each record into $_data
    $jakdata[] = $row;
  }

  return $jakdata;
}

// Menu builder function, parentId 0 is the root
function jak_build_menu_faq($parent, $menu, $lang, $title1, $title2, $title3, $title4, $title5, $class = "", $id = "")
{
  $html = "";
  if (isset($menu['parents'][$parent])) {
    $html .= "
      <ul" . $class . $id . ">\n";
    foreach ($menu['parents'][$parent] as $itemId) {
      // Build menu for FAQ categories
      if (!isset($menu['parents'][$itemId])) {
        $html .= '<li id="menuItem_' . $menu["items"][$itemId]["id"] . '" class="jakcat">
          		<div>
          		<span class="text"><span class="textid">#' . $menu["items"][$itemId]["id"] . '</span><a href="index.php?p=faq&amp;sp=categories&amp;ssp=edit&amp;sssp=' . $menu["items"][$itemId]["id"] . '">' . $menu["items"][$itemId]["name"] . '</a></span>
          		<span class="actions">
          			<a href="index.php?p=faq&amp;sp=categories&amp;ssp=lock&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="' . ($menu["items"][$itemId]["active"] == 0 ? "$title1" : "$title2") . '"><i class="fa fa-' . ($menu["items"][$itemId]["active"] == 0 ? 'lock' : 'check') . '"></i></a>
          			<a href="index.php?p=faq&amp;sp=new&amp;ssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="' . $title3 . '"><i class="fa fa-sticky-note-o"></i></a>
          			<a href="index.php?p=faq&amp;sp=categories&amp;ssp=edit&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="' . $title4 . '"><i class="fa fa-edit"></i></a>
          			<a href="index.php?p=faq&amp;sp=categories&amp;ssp=delete&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-danger btn-xs" data-confirm="' . $lang . '" data-toggle="tooltip" data-placement="bottom" title="' . $title5 . '"><i class="fa fa-trash-o"></i></a>
          		</span></div></li>';
      }
      // Build menu for ...
      if (isset($menu['parents'][$itemId])) {
        $html .= '<li id="menuItem_' . $menu["items"][$itemId]["id"] . '" class="jakcat">
          		<div>
          		<span class="text">#' . $menu["items"][$itemId]["id"] . ' <a href="index.php?p=faq&amp;sp=categories&amp;ssp=edit&amp;sssp=' . $menu["items"][$itemId]["id"] . '">' . $menu["items"][$itemId]["name"] . '</a></span>
          		<span class="actions">
          			<a href="index.php?p=faq&amp;sp=categories&amp;ssp=lock&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs"><i class="fa fa-' . ($menu["items"][$itemId]["active"] == 0 ? 'lock' : 'check') . '"></i></a>
          				<a href="index.php?p=faq&amp;sp=new&amp;ssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs"><i class="fa fa-sticky-note-o"></i></a>
          				<a href="index.php?p=faq&amp;sp=categories&amp;ssp=edit&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
          				<a href="index.php?p=faq&amp;sp=categories&amp;ssp=delete&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-danger btn-xs" onclick="if(!confirm(' . $lang . '))return false;"><i class="fa fa-trash-o"></i></a>
          		</span>
          		</div>';
        $html .= jak_build_menu_faq($itemId, $menu, $lang);
        $html .= "</li> \n";
      }
    }
    $html .= "</ul> \n";
  }
  return $html;
}

?>