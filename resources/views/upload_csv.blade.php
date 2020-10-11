<form action="{{url('/upload_csv'}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        <label for="upload_csv">Upload</label>
        <input type="file" name="upload_csv" id="upload_csv" class="form-control">
    </div>
    <input type="submit" value="Upload" class="btn btn-success" name="submit">

</form>