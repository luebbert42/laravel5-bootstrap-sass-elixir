<div class="table-responsive">
    <table class="table table-striped b-t text-small" id="table-app-users-index">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Rolle</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    <a href="{{route("users.edit", array("id" => $user->id))}}">{{$user->firstname}}  {{$user->lastname}}</a>
                </td>
                <td><a href="mailto:{{$user->email}}"> {{$user->email}}</a>
                </td>
                <td>
                    @foreach($user->roles()->get() as $role)
                        {{ $role->role_title}}
                    @endforeach
                </td>
                <td>
                    @yesno($user->active)
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@if(method_exists($pager,"appends"))

    <div>
        Zeige {{($pager->currentpage()-1)*$pager->perpage()+1}}
        bis {{($pager->currentpage()-1) * $pager->perpage() + $pager->count()}}
        von {{$pager->total()}} Einträgen
    </div>

    {!! $pager->appends([
                         'lastname' => Input::get('lastname'),
                         ])->render() !!}
@endif
