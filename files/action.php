<?php 
require_once('conn.php');
error_reporting(0);
//Folder Deleting Funcion
function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
     if (!$dir_handle)
          return false;
     while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                     unlink($dirname."/".$file);
                else
                     delete_directory($dirname.'/'.$file);
           }
     }
     closedir($dir_handle);
     rmdir($dirname);
     return true;
}
	// Function to remove folders and files 
	function rrmdir($dir) {
		if (is_dir($dir)) {
			$files = scandir($dir);
			foreach ($files as $file)
				if ($file != "." && $file != "..") rrmdir("$dir/$file");
			rmdir($dir);
		}
		else if (file_exists($dir)); //unlink($dir);
	}

	// Function to Copy folders and files       
	function rcopy($src, $dst) {
		if (file_exists ( $dst ))
			rrmdir ( $dst );
		if (is_dir ( $src )) {
			mkdir ( $dst );
			$files = scandir ( $src );
			foreach ( $files as $file )
				if ($file != "." && $file != "..")
					rcopy ( "$src/$file", "$dst/$file" );
		} else if (file_exists ( $src ))
			copy ( $src, $dst );
	}
// Custom Code Below

$action = $_POST['action'];
$contents = file_get_contents('data.json');
$fetched = json_decode($contents, true);


//Edit Repo
if ($action == 'EditRepo') {
	$RepoName = $_POST['RepoName'];
	$RepoUrl = $fetched[$RepoName]['RepoUrl'];
	$CloneUrl = $fetched[$RepoName]['CloneUrl'];
	$Token = $fetched[$RepoName]['Token'];
	$GitRepoName = $fetched[$RepoName]['RepoName'];
	$GitRepoBranch = $fetched[$RepoName]['Branch'];
	echo '{"msg":"Working","RepoName":"'.$RepoName.'","RepUrl":"'.$RepoUrl.'","ClonePath":"'.$CloneUrl.'","Token":"'.$Token.'","GitRepoName":"'.$GitRepoName.'","GitRepoBranch":"'.$GitRepoBranch.'"}';
}

// Clonning Repo
if ($action == 'Extracting') {
	$Check = True;
	$RepoName = $_POST['RepoName'];
	$RepoNameGit = $fetched[$RepoName]['RepoName'];
	$BranchGit = $fetched[$RepoName]['Branch'];
	$url = $fetched[$RepoName]['RepoUrl'];
	$zipPath = $fetched[$RepoName]['CloneUrl'];
	$Token = $fetched[$RepoName]['Token'];
	$cname = $zipPath.'/'.$RepoNameGit.'-'.$BranchGit;
	
	// Downloading Zip
	$newfile = $zipPath.'/'.$RepoName.'.zip';

	// Create folder path if not exits
	if (!is_dir($zipPath)) {
		mkdir($zipPath, 0777, true);
	}

	if($Check){
		if (!copy($url, $newfile)) {
			echo "failed to copy $url...\n";
			$Check = False;
			echo '{"msg":"files not Extracted, try again"}';
			exit();
		}
	}
	if($Check){
		// Create new zip class 
		$zip = new ZipArchive; 
		
		// Add zip filename which need to unzip 
		$zip->open($newfile); 
		
		// Extracts to current directory 
		if($zip->extractTo($zipPath.'/')){
			$Check = True;
		}else{
			$Check = False;
			echo '{"msg":"files not Extracted, try again"}';
			exit();
		}
		
		$zip->close(); 
	}
	rcopy($cname , $zipPath);

	if ($Check) {
		delete_directory($cname);
		if (!unlink($newfile)) { 
	    	$Check = False;
	    	echo '{"msg":"Files & directory not Deleted"}';
	    	exit();
		} 
		else { 
		    $Check = True;
		} 
	}

	if ($Check) {
		$fetched[$RepoName]['extract'] = true;
		$json = json_encode($fetched,JSON_PRETTY_PRINT);
		$done = file_put_contents('data.json', $json);
		if ($done) {
			echo '{"msg":"Working"}';
			exit();
		}else{
			echo '{"msg":"Repo Cloned , file not saved"}';
			exit();
		}
	}

}
// Crating Repo
if ($action == 'GeneratingRepo') {
	$RepoName = $_POST['RepoName'];
	$contents = file_get_contents('data.json');
	$contentsDecoded = json_decode($contents, true);
	$contentsDecoded[$RepoName]['RepoUrl'] = $_POST['url'];
	$contentsDecoded[$RepoName]['Name'] = $RepoName;
	$contentsDecoded[$RepoName]['CloneUrl'] = $_POST['path'];
	$contentsDecoded[$RepoName]['Token'] = $_POST['token'];
	$contentsDecoded[$RepoName]['RepoName'] = $_POST['GitRepoName'];
	$contentsDecoded[$RepoName]['Branch'] = $_POST['GitRepoBranch'];
	$contentsDecoded[$RepoName]['extract'] = false;
	$json = json_encode($contentsDecoded,JSON_PRETTY_PRINT);
	$done = file_put_contents('data.json', $json);
	if ($done) {
		echo '{"msg":"Working"}';
	}else{
		echo '{"msg":"Not Working"}';
	}
}
// Deleting Repo
if ($action == 'DeleteRepo') {
	$RepoName = $_POST['RepoName'];
	unset($fetched[$RepoName]);
	$json = json_encode($fetched,JSON_PRETTY_PRINT);
	$done = file_put_contents('data.json', $json);
	if ($done) {
		echo '{"msg":"Working"}';
	}else{
		echo '{"msg":"Repo Not Deleted Try again"}';
	}

}