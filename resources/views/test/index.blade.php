<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1>Reprocess Data</h1>     
</body>


<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous">
  </script>

  <script>

$(document).ready(function(){
     reprocess();
  });
  
  
  function reprocess(){
      $.ajax({
          url:"reprocessData",
          type:"POST",
          data:{
              _token:"{{ csrf_token() }}",
          },
          success: function (response){
              console.log(response);
              //reprocess();
          },
          error: function(error){

          }
      });
  }

  </script>

</html>
