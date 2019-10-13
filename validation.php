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
              <li class="current">User Validation</li>
            </a>
            <a href="blood-donor.php">
              <li>Blood Donor</li>
            </a>
          </ul>
        </div>
        <div class="col-md-9 content">
          <table border="1px solid #9e0b0f" id="table">
            <tr>
              <th>No</th>
              <th>User ID</th>
              <th>Name</th>
              <th>Phone Number</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <script src="firebase.js"></script>
    <script>
    var i=1;
    var reference="/User";
    if(document.getElementById("row1")){
      table.deleteRow(i);
    }
    firebase.database().ref(reference).once('value').then((snapshot) => {
      var value = snapshot.forEach((child) => {
        var table = document.getElementById("table");
        var row = table.insertRow(i);
        row.setAttribute("id", "row"+i);
        row.setAttribute("class", "row-class");

        var cell1 = row.insertCell(0);
        cell1.setAttribute("id", "cell"+i+"_1");
        document.getElementById("cell"+i+"_1").innerHTML = i;
        child.forEach((child1) => {
          // console.log(child1.val());
          var key = child1.key;
          value=child1.val();
          if(key=="Nama"){
            var cell3 = row.insertCell(1);
            cell3.setAttribute("id", "cell"+i+"_3");
            document.getElementById("cell"+i+"_3").innerHTML = value;
          }else if(key=="Phone"){
            var cell4 = row.insertCell(2);
            cell4.setAttribute("id", "cell"+i+"_4");
            document.getElementById("cell"+i+"_4").innerHTML = value;
          }else if(key=="Status"){
            if(value==0){
              var verification_status="Unverified"
            }else{
              var verification_status="Verified"
            }
            var cell5 = row.insertCell(3);
            cell5.setAttribute("id", "cell"+i+"_5");
            document.getElementById("cell"+i+"_5").innerHTML = verification_status;
          }
        });
        var cell2 = row.insertCell(1);
        cell2.setAttribute("id", "cell"+i+"_2");
        document.getElementById("cell"+i+"_2").innerHTML = child.key;
        var cell6 = row.insertCell(5);
        cell6.setAttribute("id", "cell"+i+"_6");
        document.getElementById("cell"+i+"_6").innerHTML = "<a href=\"#\" class=\"action\" onclick=\"return confirm('Are you sure you want to verify?')\">Accept</a>";
        i++;
      });
    });
    </script>
  </body>
</html>
