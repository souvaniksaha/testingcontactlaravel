<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <title>Contact List | Laravel Testing</title>
  </head>
  <body>
    <h4 style="font-family: 'Dancing Script', cursive; font-size: 2rem;" class="mt-4 text-center">Souvanik's Testing Laravel Project</h4>
    <div class="container mt-5  mr-auto">
    <div class="container mt-5">
      @if(Session::has('success'))

      <div class="alert alert-success alert-dismissible mt-3">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong>{{Session::get('success')}}
      </div>
      @endif
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Phn Number</th>
                <th scope="col">Email</th>
                <th scope="col">Deleted Reason</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($contacts as $counter=> $item)
           
             <tr>
                <th scope="row">{{++$counter}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->phn}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->reason}}</td>
                <td><a href="{{url('contact/restore/'.$item->contact_id)}}" class="btn  btn-sm border-0"><i class="fa fa-undo" aria-hidden="true"></i></a></td>
              </tr>
             
             @endforeach
            </tbody>
          </table>
          
          <a href ="{{url('contact/list')}}" class="btn btn-success m-auto">Contact List</a>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>