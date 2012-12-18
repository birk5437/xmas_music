<?php //include "id3.php";?>
<?php require_once "getId3/getid3/getid3.php";?>
<?php
$directory="./music";
$sortOrder="newestFirst";

   $results = array();
   $handler = opendir($directory);

while ($file = readdir($handler)) {
       if ($file != '.' && $file != '..' && $file != "robots.txt" && $file != ".htaccess" && $file != ".DS_Store" && $file != "fixfilenames.sh" && $file != "audiobot_all.tar.gz"){
           $currentModified = filectime($directory."/".$file);
           $file_names[] = $file;
           $file_dates[] = $currentModified;
       }
   }
       closedir($handler);

   //Sort the date array by preferred order
   if ($sortOrder == "newestFirst"){
       arsort($file_dates);
   }else{
       asort($file_dates);
   }

   //Match file_names array to file_dates array
   $file_names_Array = array_keys($file_dates);
   foreach ($file_names_Array as $idx => $name) $name=$file_names[$name];
   $file_dates = array_merge($file_dates);

   $i = 0;

   //Loop through dates array and then echo the list
   foreach ($file_dates as $$file_dates){
       $date = $file_dates;
       $last_modified_str= date("d M Y h:i", $date[$i]);
       $j = $file_names_Array[$i];
       $file = $file_names[$j];
       $i++;
  //$tag = tagReader($directory . "/" . $file);
  $full_filepath = $directory . "/" . $file;
  $getID3 = new getID3;
  $tag = $getID3->analyze($full_filepath);
  getid3_lib::CopyTagsToComments($tag);

//<b>" . $tag['comments_html']['artist'][0] . "</b>" . " - "

    echo "<div class='song' filename='" . $file . "' title='" . $tag['comments_html']['title'][0] . "' artist='" . $tag['comments_html']['artist'][0] . "'></div>";

    // echo "<tr>";
    //     echo
    //     "<td><p class=\"footBot\">" . $last_modified_str . "</p>
    //       <h5><i>" . $tag['comments_html']['genre'][0] . "</i></h5>
    //     </td>" .
    //     "<td><h3><div class=\"music_listing\">" .
    //       "<a href=\"files/" . urlencode($file) . "\">"
    //           . $tag['comments_html']['title'][0]  .
    //       "</a></div></h3>" .
    //       "<h6>"
    //           . $tag['comments_html']['artist'][0] .
    //       "</h6>" .
    //     "</td>";
    // echo "</tr>";
   }
?>