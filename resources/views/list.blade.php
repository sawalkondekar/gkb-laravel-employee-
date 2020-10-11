<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Table</title>
    
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    
</head>

<body class="bg-light">

    <div class="p-3 mb-2 bg-dark text-white">
        <div class="container">
            <div class="h3">Employees Table</div>
        </div>       
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <a href="{{url('employees/add')}}" class="btn btn-primary">ADD</a>
            </div>
            @if(Session::has('msg'))
            <div class="col-md-12">
                <div class="alert alert-success">{{Session::get('msg')}}</div>
            @endif
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>Employees / List</h5></div>
                <div class="card-body">
                <table id="mydatatable" class="display" style="width:100%">
                        <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Hobbies</th>
                            <th>Gender</th>
                            <th>Picture</th>
                            <th width="100">Edit</th>
                            <th width="100">Delete</th>
                        </tr>
                        </thead>
                        @if($employees)
                            @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->firstname}}</td>
                            <td>{{$employee->lastname}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->hobbies}}</td>
                            <td>{{$employee->gender}}</td>
                            <!-- <td>{{$employee->upload_picture}}</td> -->
                            <td><img src="{{asset('uploads/employee/' . $employee->upload_image) }}" width="100px;"
                             height="100px"; alt="image"></td> 

                            <td><a href="{{url('employees/edit/'.$employee->id)}}" class="btn btn-primary">Edit</a></td>
                            <td><a href="#" onclick="deleteEmployee({{$employee->id}});" class="btn btn-danger">Delete</a></td>
                        </tr> 
                            @endforeach
                        @else
                        <tr>
                            <td colspan="6">Employees not added yet.</td>
                        </tr>
                            @endif
                    </table>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready( function () {
    $('#mydatatable').DataTable();
} );
    </script>

</body>
</html>
<script type="text/javascript">
    function deleteEmployee(id) {
        if (confirm('Are you sure you want to delete ?')) {
            window.location.href='{{url('employees/delete')}}/'+id;
        }
    }
</script>

