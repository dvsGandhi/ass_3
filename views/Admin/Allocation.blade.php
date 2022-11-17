<div class="container">
    <form method="POST" action={{ URL::to('/admin/allocate') }}>
        @csrf
        <input type="hidden" name="txtId" value={{$data[0]->compId}} />
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Complain</label>
            <div class="col-sm-10">
                <input type="text" readonly name="txtcomp" class="form-control-plaintext"
                    value="@if (isset($data[0]->complain)) {{ $data[0]->complain }} @endif" />
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Product</label>
            <div class="col-sm-10">
                <input type="text" readonly name="txtprodName" class="form-control-plaintext"
                    value="@if (isset($data[0]->prodName)) {{ $data[0]->prodName }} @endif">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" readonly name="txtcompDesc" class="form-control-plaintext"
                    value="@if (isset($data[0]->compDesc)) {{ $data[0]->compDesc }} @endif">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Service Provider</label>
            <div class="col-sm-10">
                <select class="form-control-plaintext" name="txtServiceProviderID">
                    <option>-------select---------</option>
                    @foreach ($provider as $p)
                        <option value={{ $p->id }}>{{ $p->userName }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="submit" name="btnSubmit" value="Update" class="btn btn-primary"></input>
    </form>
</div>
