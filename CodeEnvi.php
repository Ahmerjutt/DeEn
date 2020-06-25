<?php 
	$path = getcwd();
	function getData($url){
		//Create a cURL handle.
		$ch = curl_init($url);
		$customHeaders = array(
		    'authorization: Bearer e672b9a371a879143caa3078ad96d0b227316037',
		    'Accept: application/vnd.github.v3+json',
		    'User-Agent: Awesome-Octocat-App'
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $customHeaders);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		 
		//Execute the request.
		$result = curl_exec($ch);
		 
		return json_decode($result, true);
}

// Folder & Files Filter
	function dirfilter($data){
		$folder = array();
		$files = array();
		foreach ($data as $value) {
			if ($value['type'] == 'dir') {
				$folder[] = $value;
			}else{
				$files[] = $value;
			}
		}

		$data = array();
		$data['folder'] = $folder;
		$data['files'] = $files;
	}
// Size Formatter
	function getFormattedSize($sizeInBytes) {

        if($sizeInBytes < 1024) {
            return $sizeInBytes . " bytes";
        } else if($sizeInBytes < 1024*1024) {
            return round($sizeInBytes/1024, 2) . " KB";
        } else if($sizeInBytes < 1024*1024*1024) {
            return round($sizeInBytes/1024*1024,2) . " MB";
        } else if($sizeInBytes < 1024*1024*1024*1024) {
            return round($sizeInBytes/1024*1024*1024,2) . " GB";
        } else if($sizeInBytes < 1024*1024*1024*1024*1024) {
            return round($sizeInBytes/1024*1024*1024*1024,2) . " TB";
        } else {
            return "Greater than 1024 TB";
        }

    }


	$url = 'https://api.github.com/repos/Ahmerjutt/KarigarOnline';
	$repoInfo = getData($url);
	$gettingContent = $repoInfo['contents_url'];
	$exp = explode('{+', $gettingContent);
	$link = $exp[0];
	$repoTree = getData($link);
	$folders = array();
	$files = array();
	foreach ($repoTree as $value) {
		if ($value['type'] == 'dir') {
			$folders[] = $value;
		}else{
			$files[] = $value;
		}
	}
	$total = count($repoTree);
?>
<?php require_once('files/header.php')?>
<style>
	tr {
    	line-height: 0;
	}
	tr:hover{
		background: #e8e8e8;
	}
</style>
<table class="table table-sm" style="max-width: 1200px;margin: auto;margin-top: 50px;">
	  <thead>
	  	<tr>
	  		<td colspan="4" style="position: relative;">
	  			<h1><a href="/CodeChanger/api.php"><?=$repoInfo['name']?></a></h1>
	  			<span class="badge rounded-pill bg-light text-dark" style="position: absolute;right: 10px;top: 5px;"><?=$repoInfo['owner']['login']?></span>
	  		</td>
	  	</tr>
	    <tr>
	    	<?php 

	    		if (isset($_GET['view']) && $_GET['view'] == 'file' ) {
		    		$namee = $_GET['data'];
		  			$alink = "https://api.github.com/repos/".$repoInfo['owner']['login']."/".$repoInfo['name']."/contents/".$namee;
		  			$fdata = getData($alink);
		  			$size = getFormattedSize($fdata['size']);
	    			echo '<th scope="col">
						<h4><span class="badge bg-secondary"> '.$fdata['path'].'</span>  <span class="badge bg-secondary"> '.$size.'</span>
						<span class="badge bg-secondary"><a href='.$fdata['html_url'].' target="_blank">View on Github</a></span>
						</h4>
	    			</th>';
	    		}else{
	    			echo '<th scope="col">#</th>';
	    			echo '<th scope="col">Name</th>';
	    			echo '<th scope="col">Last Update</th>';
	    			echo '<th scope="col">Size</th>';
	    		}

	    	 ?>	
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 
	  		$nhash = 0;
	  		if (isset($_GET['data'])) {
	  			$name = $_GET['data'];
	  			$alink = "https://api.github.com/repos/".$repoInfo['owner']['login']."/".$repoInfo['name']."/contents/".$name;
	  			$fdata = getData($alink);
	  			if ($_GET['view'] == 'dir') {
					$fold = array();
					$fil = array();
					foreach ($fdata as $value) {
						if ($value['type'] == 'dir') {
							$fold[] = $value;
						}else{
							$fil[] = $value;
						}
					}
					foreach ($fold as $key => $value) {
				  			$nhash = $nhash+1;
				  			$size = getFormattedSize($value['size']);
				  			// $commit = "https://api.github.com/repos/".$repoInfo['owner']['login']."/".$repoInfo['name']."/commits/".$value['sha'];
				  			echo '<th scope="row">'.$nhash.'</th>';
				  			echo '<td><a href="?data='.$value["path"].'">'.$value['name'].'</a></td>';
				  			echo '<td>'.$value['name'].'</td>';
				  			echo '<td>'.$size.'</td>';
				  			echo "</tr>";
			  			}
			  		foreach ($fil as $key => $value) {
				  			$nhash = $nhash+1;
				  			$size = getFormattedSize($value['size']);
					  		echo "<tr>";
				  			echo '<th scope="row">'.$nhash.'</th>';
				  			echo '<td><a href="?data='.$value["path"].'&view=file">'.$value['name'].'</a></td>';
				  			echo '<td>'.$value['name'].'</td>';
				  			echo '<td>'.$size.'</td>';
				  			echo "</tr>";
			  			}
		  			}elseif ($_GET['view'] == 'file') {
		  				$url = $fdata['download_url'];
		  				$content = file_get_contents($url);
						echo "<tr>";
						echo "<td colspan='4'><xmp style='height:70vh;overflow:auto'>".$content."</xmp></td>";
						echo "</tr>";
		  			}
	  			}else{
		  		foreach ($folders as $key => $value) {
		  			$nhash = $nhash+1;
		  			$size = getFormattedSize($value['size']);
		  			// $commit = "https://api.github.com/repos/".$repoInfo['owner']['login']."/".$repoInfo['name']."/commits/".$value['sha'];
		  			echo '<th scope="row">'.$nhash.'</th>';
		  			echo '<td><a href="?data='.$value["path"].'&view=dir">'.$value['name'].'</a></td>';
		  			echo '<td>'.$value['name'].'</td>';
		  			echo '<td>'.$size.'</td>';
		  			echo "</tr>";
		  		}
		  		foreach ($files as $key => $value) {
		  			$urlCode = $value['download_url'];
		  			$content = file_get_contents($urlCode);
		  			$nhash = $nhash+1;
		  			$size = getFormattedSize($value['size']);
		  			echo "<tr>";
		  			echo '<th scope="row">'.$nhash.'</th>';
		  			echo '<td><a href="?data='.$value["path"].'&view=file">'.$value['name'].'</a></td>';
		  			echo '<td>'.$value['name'].'</td>';
		  			echo '<td>'.$size.'</td>';
		  			echo "</tr>";
		  		}
	  		}
	  	 ?>
	  </tbody>
	</table>

<?php require_once('files/footer.php')?>