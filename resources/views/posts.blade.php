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
        <h1>All Posts Display</h1>
    </div>
           
    <div class="d-flex p-5">
        @foreach ($posts as $post ) 
            <div class="card d-flex " style="width: 18rem;">   
                        
                <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                    <small>{{ $post->name }}</small> 
                <p class="card-text">{{ $post->description }}</p>
    
                </div>
                
            </div>           
        @endforeach       
        
            
          
      
     </div>
         
</body>
</html>