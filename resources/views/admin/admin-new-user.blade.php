@include('admin.admin-header')
		<!-- Content Area -->
                <div class="row">
                    <div class="col-md-12" style="margin-top:2%;">
                        <div class="panel panel-info">
                            <div class="panel-heading"></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                        <div class="form-body">
                                        	@if (!empty($current_user[0]))
								                <h3 class="box-title">Update User {{$current_user[0]->display_name}}</h3>
								            @else
								                <h3 class="box-title">Add New User</h3>
								            @endif
                                            <hr>
                                        @if (!empty($current_user[0]))
										<form method="post" action="{{action('AdminUsersController@updateUserMeta')}}">
                                    		{{ csrf_field() }}
                                    		<input type="hidden" name="user_id" value="{{$current_user[0]->ID}}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">User Name</label>
                                                        <input class="form-control" name="user_login" typr="text" value="{{$current_user[0]->user_login}}" disabled="true"> <span class="help-block"> This Should be Unique.</span></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Password</label>
                                                        <input name="user_password" type="password" class="form-control"> <span class="help-block"> Password for the User </span> </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">User Email</label>
                                                        <input name="user_email" type="email" value="{{$current_user[0]->user_email}}" required class="form-control"> <span class="help-block"> Any of User's Active Email </span> </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">User Role</label>
                                                        <select name="user_role" value="{{$current_user[0]->user_role}}" class="form-control">
                                                            <option value="1">Admin</option>
									                        <option value="2">Editor</option>
									                        <option value="3">Author</option>
									                        <option value="4">Contributor</option>
                                                        </select> <span class="help-block"> <i>User Level</i> </span> </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">User Status</label>
                                                        <input class="form-control" type="text" name="user_status" value="{{$current_user[0]->user_status}}" required> <span class="help-block"> This Should be Unique.</span></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Display Name</label>
                                                        <input class="form-control" type="text" name="user_display_name" value="{{$current_user[0]->display_name}}" required> <span class="help-block"> Name for Public Display </span> </div>
                                                </div>
                                            </div>
                                        <div class="form-actions">
                                        	<input type="submit" value="Update" name="update_user_btn" class="btn btn-success">
                                        </div>
                                    </form>
                                    @else
            						<form method="post" action="{{action('AdminUsersController@updateUserMeta')}}">
                                    		{{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">User Name</label>
                                                        <input class="form-control" name="user_login" typr="text"> <span class="help-block"> This Should be Unique.</span></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Password</label>
                                                        <input name="user_password" type="password" class="form-control"> <span class="help-block"> Password for the User </span> </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">User Email</label>
                                                        <input name="user_email" type="email" required class="form-control"> <span class="help-block"> Any of User's Active Email </span> </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">User Role</label>
                                                        <select name="user_role" class="form-control">
                                                            <option value="1">Admin</option>
									                        <option value="2">Editor</option>
									                        <option value="3">Author</option>
									                        <option value="4">Contributor</option>
                                                        </select> <span class="help-block"> <i>User Level</i> </span> </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">User Status</label>
                                                        <input class="form-control" type="text" name="user_status" required> <span class="help-block"> This Should be Unique.</span></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Display Name</label>
                                                        <input class="form-control" type="text" name="user_display_name" required> <span class="help-block"> Name for Public Display </span> </div>
                                                </div>
                                            </div>
                                        <div class="form-actions">
                                        	<input type="submit" value="Add User" name="add_user_btn" class="btn btn-success">
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@include('admin.admin-footer')