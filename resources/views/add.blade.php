<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Table</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
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
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>Employees / Edit</h5></div>
                <div class="card-body">
                    <form action="{{url('employees/add')}}" method="post" enctype="multipart/form-data" name="addEmployee" id="addEmployee">
                        @csrf
                        <div class="form=group">
                            <label for="firstname">First name</label>
                            <input type="text" name="firstname" id="firstname" value="{{old('firstname')}}" class="form-control" {{($errors->any() && $errors->first('firstname')) ? 'is-invalid' : ''}}>

                            @if($errors->any())
                                <p class="invalid-feedback">{{$errors->first('firstname')}}</p>
                             @endif

                        </div>
                        <div class="form=group">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" id="lastname" value="{{old('firstname')}}" class="form-control">
                            
                            @if($errors->any())
                                <p class="invalid-feedback">{{$errors->first('lastname')}}</p>
                             @endif

                        </div>
                        <div class="form=group">
                            <label for="Email">Email</label>
                            <input type="text" name="email" id="email"  class="form-control"><br>
                        </div>
                        <div class="form=group">
                            <label for="hobbies">Hobbies</label><br>
                            <input type="checkbox" id="hobbies" name="hobbies" value="TV">
                            <label for="TV">TV</label><br>
                            <input type="checkbox" id="hobbies" name="hobbies" value="Reading">
                            <label for="Reading">Reading</label><br>
                            <input type="checkbox" id="hobbies" name="hobbies" value="Coding">
                            <label for="Coding">Coding</label><br>
                            <input type="checkbox" id="hobbies" name="hobbies" value="Skiing">
                            <label for="Skyiing">Skiing</label><br><br>
                            
                        </div>
                        <div class="form=group">
                            <label for="Gender">Gender</label><br>
                            <input type="radio" name="gender" value="Male" > Male<br>
                            <input type="radio" name="gender" value="Female"> Female<br>
                        </div>
                        <div class="form=group mt-2">
                            <label for="Profile_Picture">Profile Picture</label>
                            <input type="file" name="upload_picture" id="upload_picture"   class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" name="submit" class="btn btn-primary">Save Employee</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </div>
    
</body>
</html>