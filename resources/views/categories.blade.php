<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap/bootstrap.min.css") }}">
  
</head>
<body>

    <div class="text-center font-weight-bold">
        <h1>Latest Category Post</h1>
    </div>
           
    <div class="d-flex p-5">
        @foreach ($categoriesPost as $item ) 
            <div class="card d-flex " style="width: 18rem;">   
                        
                <div class="card-body">
                    <small class="card-title">{{ $item->name }}</small>

                    @if ($item->latestPost())
                        <h3>{{ $item->latestPost()->title }}</h3> 
                        <p class="card-text">{{ $item->latestPost()->description }}</p>
                    @else
                    <h5>No Post Found for this category</h5>

                    @endif    
                </div>
                
            </div>           
        @endforeach       
        
            
          
      
     </div>
         
</body>
</html>