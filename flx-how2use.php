<?php
# HOW TO USE FLIXX CLASS
require_once 'flixxClass.php';

# Pass your API key from the FLIXX555 user panel in here
$flx = new FlixxMain("http://flix555.com","a1b2c3e4f5g6h7i8j9");

# Get account info
$res = $flx->curlBuilder("accountInfo");
print_r($res);

# Account statistics
/* Arguments:
- Optional
	Days; amount of days for statistics; default 14
*/
$res = $flx->curlBuilder("accountStats",7);
print_r($res);

# Upload file by URL 
/* Arguments:
- Required
	URL; direct link of video url
*/
$res = $flx->curlBuilder("uploadByURL","http://clips.vorwaerts-gmbh.de/VfE_html5.mp4");
print_r($res);

# Get upload server
$res = $flx->curlBuilder("uploadServer");
print_r($res);

# Get file info
/* Arguments:
- Required
	FileCode(s); if multiple files, please comma seperate
*/
$res = $flx->curlBuilder("fileInfo","d5e6f7g8,h9i10j11k");
print_r($res);

# Get file list
/* Arguments (in array):
- Required
	FolderId; folder id; 0 = root
	PageNumber; page number
	PerPage; amount of items displayed per page
	Public; 0 for private files / 1 for public file
- Optional
	Created; filter files only after this time e.g. "2018-06-21 05:07:10"
	Title; filter on video title e.g. "Iron Man"
*/
$res = $flx->curlBuilder("fileList",array(123,1,100,0,NULL,NULL));
print_r($res);

# Rename files
/* Arguments (in array):
- Required
	FileCodes;
	VideoTitle; the new title of the files specified by Filecodes
*/
$res = $flx->curlBuilder("fileRename",array("d5e6f7g8,h9i10j11k","my awesome videos V2"));
print_r($res);

# Clone files
/* Arguments:
- Required
	FileCodes;
*/
$res = $flx->curlBuilder("fileClone","d5e6f7g8,h9i10j11k");
print_r($res);

# Set folder for file
/* Arguments (in array):
- Required
	FileCodes
	FolderId; folder id the files go to; 0 = root
*/
$res = $flx->curlBuilder("fileSetFolder",array("d5e6f7g8,h9i10j11k",123);
print_r($res);

# Get folder/file list
/* Arguments:
- Required
	FolderId;
*/
$res = $flx->curlBuilder("folderList","a1b2c3e4");
print_r($res);

# Create folder
/* Arguments (in array):
- Required
	ParentId; the id of the parent folder; 0 = root
	FolderName; the name of the folder
*/
$res = $flx->curlBuilder("createFolder",array(123,"my awesome folder"));
print_r($res);

# Rename folder
/* Arguments (in array):
- Required
	FolderId; folder id of the folder you want to rename
	FolderName; the new name of the folder
*/
$res = $flx->curlBuilder("renameFolder",array(123,"my awesome folder V2"));
print_r($res);

# Deleted files
/* Arguments:
- Optional
	FileLimit; amount of files you want to display; default 50
*/
$res = $flx->curlBuilder("deletedFiles",25);
print_r($res);

# DMCA files
/* Arguments:
- Optional
	FileLimit;
*/
$res = $flx->curlBuilder("dmcaFiles",25);
print_r($res);
?>
