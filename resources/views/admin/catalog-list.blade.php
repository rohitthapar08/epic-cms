@include('admin.admin-header')
                <div class="row">
                        
                        <div id="col-container" class="wp-clearfix">
                        <h2 style="text-transform: uppercase;font-size: 24px;font-weight: 500;">@if (!empty($catalog_data->type)){{$catalog_data->type}}@else{{$catalog_data[0]->type}}@endif</h2>
<div id="col-left" style="float: left;width: 35%;margin-left: 20px;">
 <form method="post" action="{{action('AdminCatalogTypeController@addCatalogType')}}">
                    {{ csrf_field() }}
<div class="col-wrap">


<div class="form-wrap">
<h3>Add New @if (!empty($catalog_data->type)){{$catalog_data->type}}@else{{$catalog_data[0]->type}}@endif</h3>

<div class="form-field form-required term-name-wrap">
    <label for="tag-name">Name</label>
    <input name="name" id="tag-name" value="" size="40" aria-required="true" type="text" required>
    <p></p><p></p>
</div>
<div class="form-field term-slug-wrap">
    <label for="tag-slug">Slug</label>
    <input name="slug" id="tag-slug" value="" size="40" type="text">
    <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
    <p></p>
</div>
<div class="form-field term-icon-wrap">
    <label for="menu-icon">Menu Icon</label>
    <input name="menu_icon" id="menu-icon" value="" size="40" type="text">
    <p>Please <a href="https://materialdesignicons.com/" target="_blank">Have A Look</a> here for the list of available Icons.</p>
    <p></p>
</div>

<div class="form-field term-description-wrap">
    <label><input type="checkbox" name="show_in_menu" id="tag-show_in_menu" value="1"> Show In Menu</label>
    <p></p><p id="catalog_type_id"></p>
    
</div>
<input type="hidden" name="type" id="tag-type" value="@if (!empty($catalog_data->type)){{$catalog_data->type}}@else{{$catalog_data[0]->type}}@endif">
<p class="submit"><input name="submit" id="submit" class="button button-primary btn btn-info" value="Add new @if (!empty($catalog_data->type)){{$catalog_data->type}}@else{{$catalog_data[0]->type}}@endif" type="submit"></p></div>

</div>
</form>
</div><!-- /col-left -->

<div id="col-right" style="float: right;width: 55%;margin-right: 20px;">
    <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                                
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Menu Icon</th>
                                                <th>Show In Menu</th>
                                                <th>Actions</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                    @if (!empty($catalog_data))
                                        @foreach($catalog_data as $value)
                                                <tr>
                                                    <td>{{ $value->ID }}</td>
                                                    <td id="name{{ $value->ID }}">{{ $value->name }}</td>
                                                    <td id="slug{{ $value->ID }}">{{ $value->slug }}</td>
                                                    <td id="icon{{ $value->ID }}">{{$value->menu_icon}}</td>
                                                    <td id="show_in_menu{{ $value->ID }}">
                                                    @if ($value->show_in_menu)
                                                    Yes
                                                    @else
                                                    No
                                                    @endif</td>
                                                    <td>
                                                        <button id="{{ $value->ID }}" class="btn btn-info" onclick="getCatalogType(this.id)">Edit</button>
                                                        <?php $content_data = \App\ContentCatalog::where('catalog_id',$value->ID)->get();?>
                                                        <?php $catalog_data_count = count($content_data); ?>
                                                        <button id="{{ $value->ID }}" class="btn btn-danger delete-content-type" data-catalog-id="{{ $value->ID }}" data-count="{{$catalog_data_count}}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                            
                                    </tbody>
                                </table>
                            </div>
</div><!-- /col-right -->

</div>
                    
                </div>
<script>
function getCatalogType(event) {
    var name = document.getElementById("name"+event).innerText;
    var slug = document.getElementById("slug"+event).innerText;
    var icon = document.getElementById("icon"+event).innerText;
    var show_in_menu = document.getElementById("show_in_menu"+event).innerText;
    if (show_in_menu == "Yes"){
        $("#tag-show_in_menu").prop('checked', true);
    }
    else {
        $("#tag-show_in_menu").prop('checked', false);
    }
    document.getElementById("tag-name").value = name;
    document.getElementById("tag-slug").value = slug;
    document.getElementById("menu-icon").value = icon;
    //document.getElementById("tag-show_in_menu").value = show_in_menu;
    document.getElementById("catalog_type_id").innerHTML = '<input type="hidden" name="ID" value="'+event+'">';
  //document.getElementById("demo").innerHTML = "Hello World";
}
</script>
@include('admin.admin-footer')