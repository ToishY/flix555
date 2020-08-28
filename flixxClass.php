 <?php
 	/* FlIX555
 	- Description
 	  A simple class with methods to make API calls to FLIX555. 
 	  Full API documentation can be found here: https://flix555.docs.apiary.io
 	- Credits
 	  Made by: ToshY
	  Link: https://github.com/ToshY/flix555
 	  Last modified: 15-01-2019
 	*/
	class FlixxMain{
		private $key;
		private $host;

		function __construct($apiHost, $apiKey){
			$this->host = $apiHost;
			$this->key = $apiKey;
		}

		function curlBuilder($functionName, $functionArgs = NULL){
			//init
			$ch = curl_init();

			//prepare string
			$apiString = str_replace('%key%','key='.$this->key,$this->$functionName($functionArgs));

			//setopts
			curl_setopt($ch, CURLOPT_URL, $apiString);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);

			$response = curl_exec($ch);
			if (!curl_errno($ch)) {
				$res = json_decode($response,true);
			}else{
				$res = curl_error($ch);
			}
			curl_close($ch);
			return $res;
		}

		function accountInfo(){
			return $this->host.'/api/account/info?%key%';
		}

		function accountStats($daysLimit = 14){
			return $this->host.'/api/account/stats?%key%&last='.$daysLimit;
		}

		function uploadByURL($videoURL){
			return $this->host.'/api/upload/url?%key%&url='.$videoURL;
		}

		function uploadServer(){
			return $this->host.'/api/upload/server?%key%';
		}

		function fileInfo($fileCodes){
			return $this->host.'/api/file/info?%key%&file_code='.urlencode($fileCodes);
		}

		function fileList($inputArray){
			//$inputArray = array("a1b2c3e4",1,100,0,NULL,NULL);
			list($folderId, $pageNumber, $perPage, $public, $created, $videoTitle) = $inputArray;
			return $this->host.'/api/file/list?%key%&page='.$pageNumber.'&per_page='.$perPage.'&fld_id='.$folderId.'&public='.$public.'&created='.urlencode($created).'&title='.urlencode($videoTitle);
		}

		function fileRename($inputArray){
			//$inputArray = array("d5e6f7g8","my awesome video")
			list($fileCodes, $videoTitle) = $inputArray;
			return $this->host.'/api/file/rename?%key%&file_code='.urlencode($fileCodes).'&title='.urlencode($videoTitle);
		}

		function fileClone($fileCodes){
			return $this->host.'/api/file/clone?%key%&file_code='.urlencode($fileCodes);
		}

		function fileSetFolder($inputArray){
			//$inputArray = array("d5e6f7g8","folderName")
			list($fileCodes, $folderId) = $inputArray;
			return $this->host.'/api/file/set_folder?%key%&file_code='.urlencode($fileCodes).'&fld_id='.$folderId;
		}

		function folderList($folderId){
			return $this->host.'/api/folder/list?%key%&fld_id='.$folderId;
		}

		function createFolder($inputArray){
			//$inputArray = array("xle1390a","my awesome folder")
			list($parentId, $folderName) = $inputArray;
			return $this->host.'/api/folder/create?%key%&parent_id='.$parentId.'&name='.urlencode($folderName);
		}

		function renameFolder($inputArray){
			//$inputArray = array("a1b2c3e4","my awesome folder")
			list($folderId, $folderName) = $inputArray;
			return $this->host.'/api/folder/rename?%key%&fld_id='.$folderId.'&name='.urlencode($folderName);
		}

		function deletedFiles($fileLimit = 50){
			return $this->host.'/api/files/deleted?%key%&last='.$fileLimit;
		}

		function dmcaFiles($fileLimit = 50){
			return $this->host.'/api/files/dmca?%key%&last='.$fileLimit;
		}

		/*
		#This call did not work; resulted in forbidden / 403
		function fileDirectLink($fileCode, $quality = NULL){
			if((isset($quality)) && ($quality === "h" || $quality === "l" || $quality === "o"){
				return $this->host.'/api/file/direct_link?%key%&file_code='.$fileCode.'&q='.$quality;
			}
			return $this->host.'/api/file/direct_link?%key%&file_code='.$fileCode;
		}
		*/
	}
?>
