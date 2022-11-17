@include('Admin.Heder')
<div class="container">
    <form method="post" action={{ URL::to('ProdIns') }}>
        @csrf
        <div class="row">
            <div class="col-md-3">
                Name
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="txtName" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                Description
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="txtDes" />
            </div>
        </div>
        <input type="submit" name="btnSubmit" value="insert" class="btn btn-primary"></input>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody style="overflow-y:auto; height:200px; position:relative">
                {{-- @if (count($ProdData) > 0) --}}
                    @foreach ($ProdData as $product)
                        <tr>
                            <td class='text-center'>{{ $product->prodId }}</td>
                            <td class='text-center'>{{ $product->prodName }}</td>
                            <td class='text-center'>{{ $product->description }}</td>
                        </tr>
                    @endforeach
                {{-- @else
                    <tr>
                        <td colspan='3' class='text-center'>No Records</td>
                    </tr>
                @endif --}}
            </tbody>
        </table>

    </form>
</div>
@include('Admin.Footer')
