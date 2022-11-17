@include('Admin.Heder')
<div class="container">
    <form method="POST" action="">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Complain</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Description</th>
                    <th scope="col">Provider</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ProviderData as $p)
                    <tr>
                        <td class='text-center'>{{ $p->compId }}</td>
                        <td class='text-center'>{{ $p->complain }}</td>
                        <td>{{ $p->prodName }}</td>
                        <td>
                            @if($p->status == 1)
                                New
                            @elseif ($p->status == 2)
                                Pending
                            @else
                                Completed
                            @endif
                        </td>
                        <td>{{ $p->compDesc }}</td>
                        <td>{{ $p->userName }}</td>
                        <td>
                            @if($p->status == 1)
                                <a href={{URL::to('admin/Allocation/'.$p->compId)}}><iclass="fa-solid fa-pencil"></i>edit</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>

@include('Admin.Footer')
