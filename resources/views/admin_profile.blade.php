
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Teacher Admin</title>
  </head>
<body>
</html><h1>Hello admin, {{session('username')}}  </h1>
       
    <h2>All Students</h2>
    <form action="" class="col-3">
        <div class="form-group">
            <label for="">Search</label>
            <input type="search" name="ssearch" id="" class="form-control" placeholder="" value="{{$ssearch}}">
        </div>
        <button class="btn btn-primary">Search</button>
        <a href="{{url('/aprofilee')}}">
            <button class='btn btn-primary' type="button">Reset</button>
        </a>
      </form>
<table class="table">
      <thead>
              <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Course</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach($s as $i)
                <tr>
                    <td>{{$i->name}}</td>
                    <td>{{$i->username}}</td>
                    <td>{{$i->course}}</td>
                    <td>   
                        <a href="{{url('/aprofilee/s_delete/')}}/{{$i->id}}"> 
                            <button class="btn btn-danger">Delete</button>    
                        </a>   
                        <a href="{{url('/aprofilee/s_edit/')}}/{{$i->id}}"> 
                            <button class="btn btn-primary">Edit</button>    
                        </a>  
                    </td>
              </tr>
              @endforeach
          </tbody>
      </table>
      <div class="row">
          {{$s->links()}}
      </div>
      <h2>All Teachers</h2>
      <form action="" class="col-3">
        <div class="form-group">
            <label for="">Search</label>
            <input type="search" name="tsearch" id="" class="form-control" placeholder="" value="{{$tsearch}}">
        </div>
        <button class="btn btn-primary">Search</button>
        <a href="{{url('/aprofilee')}}">
            <button class='btn btn-primary' type="button">Reset</button>
        </a>
      </form>
      <table class="table">
      <thead>
              <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Course</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach($t as $i)
                <tr>
                    <td>{{$i->name}}</td>
                    <td>{{$i->username}}</td>
                    <td>{{$i->course}}</td>
                    <td>   
                        <a href="{{url('/aprofilee/t_delete/')}}/{{$i->id}}"> 
                            <button class="btn btn-danger">Delete</button>    
                        </a>   
                        <a href="{{url('/aprofilee/t_edit/')}}/{{$i->id}}"> 
                            <button class="btn btn-primary">Edit</button>    
                        </a>  
                    </td>  
              </tr>
              @endforeach
          </tbody>
      </table>
      <div class="row">
          {{$t->links()}}
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
        <a href="{{url('/alogout')}}"> 
            <button class="btn btn-primary">Logout</button>    
        </a>   
</body>
</html>