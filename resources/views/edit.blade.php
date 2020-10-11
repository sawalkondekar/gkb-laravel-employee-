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
                <a href="{{url('employees')}}" class="btn btn-primary">Back</a>
            </div>
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>Employees / Add</h5></div>
                <div class="card-body">
                    <form action="{{url('employees/edit/'.$employee->id)}}" method="post" enctype="multipart/form-data" name="addEmployee" id="addEmployee">
                        @csrf
                        <div class="form=group">
                            <label for="firstname">First name</label>
                            <input type="text" name="firstname" id="firstname" value="{{old('firstname',$employee->firstname)}}" class="form-control" {{($errors->any() && $errors->first('firstname')) ? 'is-invalid' : ''}}>

                            @if($errors->any())
                                <p class="invalid-feedback">{{$errors->first('firstname')}}</p>
                             @endif

                        </div>
                        <div class="form=group">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" id="lastname" value="{{old('lastname',$employee->lastname)}}" class="form-control">
                            
                            @if($errors->any())
                                <p class="invalid-feedback">{{$errors->first('lastname')}}</p>
                             @endif

                        </div>
                        <div class="form=group">
                            <label for="Email">Email</label>
                            <input type="text" name="email" id="email" value="{{old('email',$employee->email)}}" class="form-control"><br>
                        </div>
                        <div class="form=group">
                        @if ($employee->hobbies == "TV")
                            <label for="hobbies">Hobbies</label><br>
                            <input type="checkbox" id="hobbies" name="hobbies" value="TV" checked>
                            <label for="TV">TV</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies" value="{{old('hobbies',$employee->hobbies)}}">
                            <label for="Reading" >Reading</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies" value="{{old('hobbies',$employee->hobbies)}}">
                            <label for="Coding">Coding</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies" value="{{old('hobbies',$employee->hobbies)}}">
                            <label for="Skyiing">Skiing</label><br><br>
                            @elseif ($employee->hobbies == "Reading")
                            <label for="hobbies">Hobbies</label><br>
                            <input type="checkbox" id="hobbies" name="hobbies" value="TV" >
                            <label for="TV">TV</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies" checked value="Reading">
                            <label for="Reading" >Reading</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies" value="{{old('hobbies',$employee->hobbies)}}">
                            <label for="Coding">Coding</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies" value="{{old('hobbies',$employee->hobbies)}}">
                            <label for="Skyiing">Skiing</label><br><br>  
                            @elseif ($employee->hobbies == "Coding")
                            <label for="hobbies">Hobbies</label><br>
                            <input type="checkbox" id="hobbies" name="hobbies" value="TV" >
                            <label for="TV">TV</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies"  value="Reading">
                            <label for="Reading" >Reading</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies" value="Coding" checked>
                            <label for="Coding">Coding</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies" value="{{old('hobbies',$employee->hobbies)}}">
                            <label for="Skyiing">Skiing</label><br><br>
                            @elseif ($employee->hobbies == "Skiing")
                            <label for="hobbies">Hobbies</label><br>
                            <input type="checkbox" id="hobbies" name="hobbies" value="TV" >
                            <label for="TV">TV</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies"  value="Reading">
                            <label for="Reading" >Reading</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies" value="Coding" >
                            <label for="Coding">Coding</label><br>
                            
                            <input type="checkbox" id="hobbies" name="hobbies" value="Skiing" checked>
                            <label for="Skyiing">Skiing</label><br><br>  
                            @endif  
                        </div>






                        <div class="form=group">
                            <label for="Gender">Gender</label><br>
                            @if ($employee->gender == "male")
                            <input type="radio" name="gender" value="male" id="male" checked>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female" id="female">
                            <label for="female">Female</label>
                            @else
                            <input type="radio" name="gender" value="male" id="male">
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female" id="female" checked>
                            <label for="female">Female</label>
                            @endif
                            <!-- <input type="radio" name="gender" value="{{old('gender',$employee->gender)}}" > Male<br>
                            <input type="radio" name="gender" value="{{old('gender',$employee->gender)}}"> Female<br> -->
                        </div>
                        <div class="form=group mt-2">
                            <label for="Profile_Picture">Profile Picture</label>
                            <input type="file" name="upload_picture" id="upload_picture" value="{{old('upload_picture',$employee->upload_picture)}}" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" name="submit" class="btn btn-primary">Update Employee</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </div>
    
</body>
</html>