@include('admin.admin-header')
	<style type="text/css">
		.fileList {text-align: left;padding-left:30px;font-size: 18px; color: #000000;text-decoration: none;}
		ul {list-style-type: none;}
		.classh1 {text-align: left;padding-left:20px;}
	</style>
    <div class="row" style="margin-top:2%;text-align:center;">
        <h1>Ingest</h1><br>
        <h3 class="classh1">File lists</h3><br>
        <ul>
        @if (!empty($file_list))
            @foreach($file_list as $k => $file)
        		<li class="fileList">{{$k+1}}.  &nbsp&nbsp{{$file}}</li>
        	@endforeach
        @endif
        </ul>
    </div>      
@include('admin.admin-footer')