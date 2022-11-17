@include('Admin.Heder')
<div class="container">
    <form method="post" action={{URL::to('admin/ProvIns')}} enctype="multipart/form-data">
        @csrf
        <h2>Service provides </h2>
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
                Age
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="txtAge" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                Contact No
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="txtContNo" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                Photo
            </div>
            <div class="col-md-3">
                <input type="file" class="form-control" name="txtProfileImg" />
            </div>
        </div>
        <input type="submit" name="btnSubmit" value="insert" class="btn btn-primary"></input>


    </form>
</div>
@include('Admin.Footer')
