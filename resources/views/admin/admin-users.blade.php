@include('admin.admin-header')
                <div class="row">
                    <form method="post" action="{{action('AdminUsersController@updateUserMeta')}}">
                    {{ csrf_field() }}
                    <div class="col-sm-12" style="margin-top:2%;">
                        <div class="white-box">
                            <h3 class="box-title">EPIC Users</h3>
                            <input type="submit" name="new_user_btn" value="Add New User" class="btn btn-info">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                                <th></th>
                                                <th>User ID</th>
                                                <th>User Display Name</th>
                                                <th>User Login</th>
                                                <th>User Email</th>
                                                <th>User Role</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $value)
                                                <tr>
                                                    <td><input type="checkbox" name="action_users[]" value="{{ $value->ID }}"></td>
                                                    <td>{{ $value->ID }}</td>
                                                    <td>{{ $value->display_name }}</td>
                                                    <td>{{ $value->user_login }}</td>
                                                    <td>{{ $value->user_email }}</td>
                                                    <td>{{ $value->user_role }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <select name="user_select_action" class="form-control">
                                                        <option>update</option>
                                                        <option>delete</option>
                                                    </select>
                                                </td>
                                                <td colspan="2">
                                                    <input class="btn btn-info" type="submit" name="user_select_submit" value="Action">
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
@include('admin.admin-footer')