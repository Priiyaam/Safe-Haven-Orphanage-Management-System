<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Donation Live Search </h1>
  <a href="../../Views/Donator/Login.html"><Right>Log Out  || </Right></a> 
  <a href="../../Controller/Donator/Dashboard.php"><Right>Donator Info || </Right></a> 
  <a href="../../Views/Donator/DonationInfo.html"><Right> Donate Here  </Right></a> 
</div>
<div class="container"> 
<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="search">
      <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Organization</th>
          <th>Purpose</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody id="output">
        
      </tbody>
    </table>
    
    </div>
    <div class="col-sm-3">
    </div>
    
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'search.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>

</body>
</html>