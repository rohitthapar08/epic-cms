<?php 

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class AdminIngestController extends Controller{
	public function getIngest(){
		//define veriables for store ftp details
		$ftp_server = "epic655701.ftp.upload.akamai.com";
        $ftp_username = "fuzail_epic";
        $ftp_userpass = "1c@ng3tin2018";
        /*
         * FTP connect
        */
        $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
        $login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
        //if($login)
        //echo "\nConnected";

    	// change the current directory
    	ftp_chdir($ftp_conn, '/655701/lmpl_test/');

        // get listing
        ftp_pasv($ftp_conn, true);
		$files = ftp_nlist($ftp_conn, ".");
		
		$file_list = array();
		foreach($files as $k=>$file){
    		if (ftp_size($ftp_conn, $file) == -1 || ftp_size($ftp_conn, $file) == 0){
	            #Its a direcotry
	            $file_list[] = $file;
        	}
    	}
    
		// close connection
		ftp_close($ftp_conn);

		return view('admin.admin-ingest')->with('file_list',$file_list);
	}
}