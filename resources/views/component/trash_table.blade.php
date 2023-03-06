<div class="table-responsive mb-5 shadow rounded border" style="min-height: 500px">
    <table class="table table-bordered-x table-hover" style="min-width: 620px">
        <thead class="bg-light">
            <tr>
                <th class="col-sm-5">Name</th>
                <th class="col-sm-3">Deleted At</th>
                <th class="col-sm-2"></th>
                <th class="col-sm-2"></th>
            </tr>
        </thead>
        <tbody>
            {{-- foreach folder --}}
            @foreach ($folders as $r)
                <tr>
                    <td>
                        <a class="text-dark" title="{{ $r->name }}">
                            <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                            <strong>
                                {{ substr($r->name, 0, 30) }}
                                @if (strlen($r->name) > 30)
                                    ...
                                @endif
                            </strong>
                        </a>
                    </td>
                    <td>{{  date('H:i:s, M d Y', strtotime($r->deleted_at)) }}</td>
                    <td colspan="2" class="text-right">
                        <a class="btn btn-outline-success">Restore</a>
                        <a class="btn btn-outline-danger">Delete</a>
                    </td>
                </tr>
                @include('folder/edit')                            
            @endforeach

            {{-- foreach file --}}
            @foreach ($files as $r)
                <tr>
                    <td>
                        <a data-target="#fileView{{ $r->id_file }}" type="button" data-toggle="modal" class="text-dark" title="{{ $r->name }}">
                            {{-- icon goes here --}}
                            <img src="{{ asset($file::getIcon($r->route, $r->type)) }}" width="30" height="30" class="mb-1 mr-1 img-cover">
                            <strong>
                                {{ substr($r->name, 0, 30) }}
                                @if (strlen($r->name) > 30)
                                    ...
                                @endif
                            </strong>
                        </a>
                    </td>
                    <td>{{  date('H:i:s, M d Y', strtotime($r->deleted_at)) }}</td>
                    <td colspan="2" class="text-right">
                        <a href="{{url('restore/file/' . $r->route)}}" class="btn btn-outline-success">Restore</a>
                        <a href="{{url('delete/file/' . $r->route)}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr> 
                @include('file/view')   
            @endforeach
        </tbody>
    </table>
</div>    