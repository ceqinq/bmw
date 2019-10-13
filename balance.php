<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://www.gstatic.com/firebasejs/7.1.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
    <meta charset="utf-8">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="bdm-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-3 menu">
          <ul>
            <a href="index.php">
              <li>Home</li>
            </a>
            <a href="donor.php">
              <li>Donor Request</li>
            </a>
            <a href="validation.php">
              <li>User Validation</li>
            </a>
            <a href="blood-donor.php">
              <li class="current">Blood Donor</li>
            </a>
          </ul>
        </div>
        <div class="col-md-9 content">
          <div class="bg-light" style="padding:50px;">
            <h3 id="name"></h3>
            <!-- update blood balance di database. current + input -->
            <input type="text" name="balance" value="" id="input">
            <a href="blood-donor.php" class="action">Add Balance</a>
          </div>
        </div>
      </div>
    </div>
    <script src="firebase.js"></script>
    <script type="text/javascript">
      var i=1;
      var reference="/User/<?php echo $_GET['key']; ?>";
      firebase.database().ref(reference).once('value').then((snapshot) => {
        // cell1.setAttribute("id", "cell"+i+"_1");
        var value = snapshot.forEach((child) => {
          var key=child.key;
          var value=child.val();
          console.log(key);
          if(key=="Nama"){
            document.getElementById("name").innerHTML = value;
          }
          // else if(key=="GolDar"){
          //   var cell4 = row.insertCell(1);
          //   cell4.setAttribute("id", "cell"+i+"_4");
          //   document.getElementById("cell"+i+"_4").innerHTML = value;
          // }else if(key=="SaldoDarah"){
          //   var cell5 = row.insertCell(3);
          //   cell5.setAttribute("id", "cell"+i+"_5");
          //   document.getElementById("cell"+i+"_5").innerHTML = value;
          // }
        });
      });
    </script>
  </body>
</html>
