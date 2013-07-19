<script type="text/javascript" src="JS/modal.popup.js"></script>
<script type="text/javascript" src="JS/jquery.pajinate.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#show_results').pajinate({
    wrap_around: true});
  });
</script>

<?php

  function MOMENTS($data_array, &$moment) {
    $moment[0] = 0.0;
    $moment[1] = 0.0;
    $moment[2] = 0.0;
    $moment[3] = 0.0;
    
    $N = count($data_array);
	
    $s = 0.0;
    for ($i = 0; $i < $N; $i++) {
      $s = $s + $data_array[$i]; 
    }
    $moment[0] = $s/$N;

    $ep = 0.0;
		
    for ($i = 0; $i < $N; $i++) {
      $s = $data_array[$i] - $moment[0]; 
      $ep = $ep + $s;
      $p = $s*$s;
      $moment[1] = $moment[1] + $p;
      $p = $p*$s;
      $moment[2] = $moment[2] + $p;
      $p = $p*$s;
      $moment[3] = $moment[3] + $p;
    }
	
    $moment[1] = $moment[1] - ($ep*$ep)/$N;
    $moment[1] = $moment[1]/($N);
    $sdev = sqrt($moment[1]);
		
    if ($moment[1]) {
      $moment[2] = $moment[2] / ($N*$moment[1]*$sdev);
      $moment[3] = $moment[3] / ($N*$moment[1]*$moment[1]) - 3.0;
    }
  }
	
	
  function read_pdb_file($pdb_name,&$pdb_x,&$pdb_y,&$pdb_z,&$size){
		
  /*
  31 - 38        Real(8.3)     x            Orthogonal coordinates for X in Angstroms.
  39 - 46        Real(8.3)     y            Orthogonal coordinates for Y in Angstroms.
  47 - 54        Real(8.3)     z            Orthogonal coordinates for Z in Angstroms.
  */
		
    $file_handle = fopen($pdb_name, "r");
    $atom_cont = 0;	

    while (!feof($file_handle)) {
      $line = fgets($file_handle);
			
      if (substr($line,0,6) == "ATOM  " && substr($line,13,3) == "CA "){
				
        $pdb_x[]=(float)substr($line,31,8);
        $pdb_y[]=(float)substr($line,39,8);
        $pdb_z[]=(float)substr($line,47,8);
        $atom_cont++;
      }
      if (substr($line,0,6) == "ATOM  " && substr($line,13,3) == "CA "){
        $size++;
      }
    }

    fclose($file_handle);	
		
  }
	
  function calculate_vector($pdb_x,$pdb_y,$pdb_z,$size,&$USR){
    $CTD = array(0.0,0.0,0.0);
    $size = count($pdb_x);
		
    foreach($pdb_x as $coord){
      $CTD[0] = $CTD[0] + $coord;	
    }
    foreach($pdb_y as $coord){
      $CTD[1] = $CTD[1] + $coord;	
    }
    foreach($pdb_z as $coord){
      $CTD[2] = $CTD[2] + $coord;	
    }

    $CTD[0] = $CTD[0] / $size;	
    $CTD[1] = $CTD[1] / $size;
    $CTD[2] = $CTD[2] / $size;
	
    $min_dist = 9999999;
    $max_dist = -9999999;
    $min_ind = 0;
    $max_ind = 0;
	
    for ($i = 0; $i < $size; $i++) {
      $d = sqrt(($CTD[0] - $pdb_x[$i])*($CTD[0] - $pdb_x[$i]) + ($CTD[1] - $pdb_y[$i])*($CTD[1] - $pdb_y[$i]) + ($CTD[2] - $pdb_z[$i])*($CTD[2] - $pdb_z[$i]));
      if ($d < $min_dist) {
        $min_ind = $i;
        $min_dist = $d;
      }
      if ($d > $max_dist) {
        $max_ind = $i;
        $max_dist = $d;
      }
    }
	
    $CST[0] = $pdb_x[$min_ind];
    $CST[1] = $pdb_y[$min_ind];
    $CST[2] = $pdb_z[$min_ind];
	
    $FCT[0] = $pdb_x[$max_ind];
    $FCT[1] = $pdb_y[$max_ind];
    $FCT[2] = $pdb_z[$max_ind];	

    $max_dist = -99999.99;
    $max_ind = 0;
		
    for ($i = 0; $i < $size; $i++) {
      $d = sqrt(($FCT[0] - $pdb_x[$i])*($FCT[0] - $pdb_x[$i]) + ($FCT[1] - $pdb_y[$i])*($FCT[1] - $pdb_y[$i]) + ($FCT[2] - $pdb_z[$i])*($FCT[2] - $pdb_z[$i]));
      if ($d > $max_dist) {
        $max_ind = $i;
        $max_dist = $d;
      }
    }
		
    $FTF[0] = $pdb_x[$max_ind];
    $FTF[1] = $pdb_y[$max_ind];
    $FTF[2] = $pdb_z[$max_ind];
	
    for ($i = 0; $i < $size; $i++) {
      $d1[$i] = sqrt(($CTD[0] - $pdb_x[$i])*($CTD[0] - $pdb_x[$i]) + ($CTD[1] - $pdb_y[$i])*($CTD[1] - $pdb_y[$i]) + ($CTD[2] - $pdb_z[$i])*($CTD[2] - $pdb_z[$i]));
      $d2[$i] = sqrt(($CST[0] - $pdb_x[$i])*($CST[0] - $pdb_x[$i]) + ($CST[1] - $pdb_y[$i])*($CST[1] - $pdb_y[$i]) + ($CST[2] - $pdb_z[$i])*($CST[2] - $pdb_z[$i]));
      $d3[$i] = sqrt(($FCT[0] - $pdb_x[$i])*($FCT[0] - $pdb_x[$i]) + ($FCT[1] - $pdb_y[$i])*($FCT[1] - $pdb_y[$i]) + ($FCT[2] - $pdb_z[$i])*($FCT[2] - $pdb_z[$i]));
      $d4[$i] = sqrt(($FTF[0] - $pdb_x[$i])*($FTF[0] - $pdb_x[$i]) + ($FTF[1] - $pdb_y[$i])*($FTF[1] - $pdb_y[$i]) + ($FTF[2] - $pdb_z[$i])*($FTF[2] - $pdb_z[$i]));
    }	
	
    $_CTD = array();
    $_CST = array();
    $_FCT = array();
    $_FTF = array();
	
    MOMENTS($d1, $_CTD);
    MOMENTS($d2, $_CST);
    MOMENTS($d3, $_FCT);
    MOMENTS($d4, $_FTF);
	
		//echo $_CST[2];
    $USR = array($_CTD[0],$_CTD[1],$_CTD[2],$_CST[0],$_CST[1],$_CST[2],$_FCT[0],$_FCT[1],$_FCT[2],$_FTF[0],$_FTF[1],$_FTF[2]);
  }
	
  function Scoring_Function($query,$seed){
	
    //dist = 1/(1.0+(1.0/12.0*sum([abs(float(v1[x])-float(v2[x])) for x in xrange(0,12)])))
	
    $length = 12;
    $i=0;
    $sum=0.0;
			
    while($i < $length){
      $sum = $sum +abs($query[$i] - $seed[$i]);#535353
      $i++;
    }	
				
    $dist = 1.0 / (1+(1.0/12.0)*$sum);
    return $dist;	
  }
	
  /*Begin of the php script*/
	
  $db = $_POST['db'];
  //echo $db;
  $folder = $_POST['folder'];

  include 'connect_db.php';	
  $pdb_name = $_POST['pdb_name'];
	
  $pdb_x = array();
  $pdb_y = array();
  $pdb_z = array();
  $size = 0;
	
  $USR = array();
	
  //Read pdb file
  read_pdb_file($pdb_name,$pdb_x,$pdb_y,$pdb_z,$size);
	
  //Save frag size	
  $size_frag = $size;	
	
  //Calculate vector from Uploaded pdb
  calculate_vector($pdb_x,$pdb_y,$pdb_z,$size,$USR);
  $results_array = array();
	
  //Collect USR seeds vectors
  $query = mysql_query("SELECT * FROM fragment WHERE array_values!='none'");

  if (!$query){
    $message = 'Invalid query' . mysql_error() . "\n";
  }

  // Search within USR seeds
  while ($data = mysql_fetch_array($query)){

    $array_seeds = split(",",$data["array_values"]);
    $array_seeds_f = array();
			
    foreach($array_seeds as $seed){
      $array_seeds_f[] = (float)$seed;
    }		
				
    $var = Scoring_Function($USR,$array_seeds_f);
    $results_array[$data["pdbid"]."_".$data["chain"]."_".$data["init_pos"]."_".$data["end_pos"]] = $var;
  }
  $cont_height = 190 + (30 * 24);
?>

<!-- HTML section -->
<div id="show_results" class="container" style="height:<?php echo $cont_height ?>px">
  <h3 style="margin:10px 0 0 10px;text-align:left"><b>Search results</b></h3>
  <p style="margin:10px 0 0 10px;text-align:left">Found <?php echo $result_num ?> fragment(s)</br></p>
  <div style="margin:10px 40px 0 40px;border: 1px solid green;background-color: #e5eecc;padding: 1px;width:relative;">
    <div style="display:table-cell;width:30px;">#</div>
    <div style="display:table-cell;width:50px;text-align:center;"><b>PDB ID</b></div>
    <div style="display:table-cell;width:50px;text-align:center;"><b>Chain</b></div>
    <div style="display:table-cell;width:120px;text-align:center;"><b>Sequence</b></div>
    <div style="display:table-cell;width:50px;text-align:center;"><b>Size</b></div>
    <div style="display:table-cell;width:50px;text-align:right;"><b>Init Pos</b></div>
    <div style="display:table-cell;width:70px;text-align:right;"><b>End Pos</b></div>
    <div style="display:table-cell;width:120px;text-align:center;"><b>Group</b></div>
    <div style="display:table-cell;width:90px;text-align:center;"><b>G Size</b></div>
    <div style="display:table-cell;width:80px;text-align:center;"><b>USR</b></div>
  </div>
	
  <ul class="content" style="margin=5px 0px 0px 0px">
  <?php 		
    arsort($results_array);
    $i=0;
    $divID=1;
    $frag_number = 1;
				
    foreach($results_array as $key => $value):
      if ($i < 100):
      $key_e = explode("_",$key);
      $pdbid = $key_e[0];
      $size_pad = str_pad($size,2,"0",STR_PAD_LEFT);
      $chain = $key_e[1];
      $init_s_pad = $key_e[2];
      $end_s_pad = $key_e[3];
      while ($info = mysql_fetch_array(mysql_query('SELECT seq,group_all from fragment where pdbid = "'.$key_e[0].'" AND chain="'.$chain.'" AND init_pos="'.$init_s_pad.'" AND end_pos="'.$end_s_pad.'"'))){
        $seq = $info["seq"];
        $group = $info["group_all"];
        break;					
      }
      $group_size = mysql_num_rows(mysql_query('SELECT pdbid from fragment where group_all="'.$group.'"'));
      $group_list = explode("_",$group);
      $num_group = (int)$group_list[1];
  ?>
  <li>			
    <div style="border: 1px solid green;background-color: #e5eecc;padding: 1px;width:relative;margin:0px 40px 0px 0px;">
      <a  id="myHeader'.$divID.'" 
      href="javascript:showonlyone('fragbox<?php echo $divID ?>','<?php echo $pdbid ?>','<?php echo $size_pad ?>','<?php echo $size ?>',
      '<?php echo $seq ?>','<?php echo $init_s_pad ?>','<?php echo $end_s_pad ?>','<?php echo $group?>','<?php echo $num_group?>','<?php echo $chain?>',
      '<?php echo $db ?>','<?php echo $group_size ?>','<?php echo $key ?>','<?php echo $folder ?>');">

      <div style="display:table-cell;width:30px;"><?php echo $frag_number ?></div>
      <div style="display:table-cell;width:50px;text-align:center;"><?php echo $pdbid ?></div>
      <div style="display:table-cell;width:50px;text-align:center;"><?php echo $chain ?></div>
      <div style="display:table-cell;width:120px;text-align:center;"><?php echo $seq ?></div>
      <div style="display:table-cell;width:50px;text-align:center;"><?php echo $size ?></div>
      <div style="display:table-cell;width:50px;text-align:right;"><?php echo $init_s_pad ?></div>
      <div style="display:table-cell;width:50px;text-align:right;"><?php echo $end_s_pad?></div>
      <div style="display:table-cell;width:120px;text-align:center;"><?php echo $group ?></div>
      <div style="display:table-cell;width:80px;text-align:center;"><?php echo $group_size ?></div>
      <div style="display:table-cell;width:80px;text-align:right;"><?php printf("%0.5f",$value) ?></div>
								
      </a>
    </div>
    <div name="boxes" id="fragbox<?php echo $divID?>" style="display:none;background-color: #CCCCCC;display: block;width:relative;margin:0px 40px 0px 0px;">
    </div>
							
    <?php
      endif;
      $frag_number++;
      $divID++;
      $i++;
      endforeach;
    ?>
  </li>
  </ul>
  <div class="page_navigation"></div>
</div>

<script type="text/javascript" src="JS/ResultsScript.js"></script>

