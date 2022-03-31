@include('nav')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>signup</title>
  </head>
  <body>
  <form class="row g-3" action="{{url('/')}}/tsignups" method="post">
   <!--<form class="row g-3" action="{{url('/')}}/customers" method="post">
    <form class="row g-3" action="{{url('/')}}/costumers" method="post">-->
        {{ csrf_field() }}
    <!--    <pre>
            @php
                print_r($errors->all());
            @endphp
        </pre>
    -->
        <h2 class="text-center text-primary">Teacher Registration Page</h2>

        <div class="col-md-6">
            <label  class="form-label">Name</label>
            <input type="" name="name" class="form-control" id="" value="{{old('name')}}">
            <span class="text-danger">
            @php
                foreach ($errors->get('name') as $message) 
                {
                    echo $message;
                }
            @endphp
            </span>
        </div>

        <div class="col-md-6">
            <label  class="form-label">Username</label>
            <input type="" name="username" class="form-control" id="" value="{{old('username')}}">
            <span class="text-danger">
                
            @foreach($errors->get('username') as $message) 
                {
                    {{$message}}
                }
            @endforeach
                
            </span>
        </div>

        <div class="col-md-6">
        <label  class="form-label">Course</label>
        <input list="course" name="course" value="{{old('course')}}">
            <datalist id="course" name="course" >
                <option value="B Tech">
                <option value="B.A.">
                <option value="B.Com.">
                <option value="B.Ed.">
                <option value="MBBS">
            </datalist>
            <span class="text-danger">
            @php
                foreach ($errors->get('course') as $message) 
                {
                    echo $message;
                }
                @endphp
            </span>
        </div>

        <div class="col-md-6">
            <label  class="form-label">Gender</label>

            <input type="radio" id="f" name="gender" value="F">
            <label for="f">Female</label>
            <input type="radio" id="m" name="gender" value="M">
            <label for="m">Male</label>
            <input type="radio" id="o" name="gender" value="O">
            <label for="o">Others</label>
            <span class="text-danger">
            @php
                foreach ($errors->get('gender') as $message) 
                {
                    echo $message;
                }
            @endphp
            </span>
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="">
            <span class="text-danger">
                @php
                foreach ($errors->get('password') as $message) 
                {
                    echo $message;
                }
                @endphp
            </span>
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="">
            <span class="text-danger">
                @php
                foreach ($errors->get('password_confirmation') as $message) 
                {
                    echo $message;
                }
                @endphp
            </span>
        </div>
        


        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
</form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>