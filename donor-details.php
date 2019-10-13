<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhzBTG0Ynnq2xr2YLsBOaCSbfddjXpZAM&callback=initMap"></script>
    <script src="https://www.gstatic.com/firebasejs/7.1.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
    <meta charset="utf-8">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.11.2"></script>
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
              <li class="current">Donor Request</li>
            </a>
            <a href="Validation.php">
              <li>User Validation</li>
            </a>
            <a href="blood-donor.php">
              <li>Blood Donor</li>
            </a>
          </ul>
        </div>
        <div class="col-md-9 content">
          <a href="donor.php" class="action">Back</a>
          <table border="1px solid #9e0b0f">
            <tr>
              <td colspan="2">ID</td>
              <td colspan="5" style="text-align:left">001</td>
            </tr>
            <tr>
              <td colspan="2">Name</td>
              <td colspan="5" style="text-align:left">John</td>
            </tr>
            <tr>
              <td colspan="2">Blood Type</td>
              <td colspan="5" style="text-align:left">O+</td>
            </tr>
            <tr>
              <td colspan="2">Hospital</td>
              <td colspan="5" style="text-align:left">RS Mitra Keluarga</td>
            </tr>
            <tr>
              <td colspan="2">Quota Filled</td>
              <td colspan="5" style="text-align:left">(1/4)</td>
            </tr>
            <tr>
              <td colspan="2">Timeout</td>
              <td colspan="5" style="text-align:left">5:00</td>
            </tr>
            <tr>
              <td colspan="7">
                <a href="pending-list.php" class="action">Pending List</a>
              </td>
            </tr>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Phone Number</th>
              <th>Status</th>
              <th colspan="3">Action</th>
            </tr>
            <tr>
              <td>1</td>
              <td>Jane Doe</td>
              <td>08123</td>
              <td>Accept</td>
              <td>
                <a href="#" class="action">Accept</a>
              </td>
              <td>
                <a href="#" class="action">Pending</a>
              </td>
              <td>
                <a href="#" class="action">Deny</a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Jonathan Joestar</td>
              <td>08321</td>
              <td>Pending</td>
              <td>
                <a href="#" class="action">Accept</a>
              </td>
              <td>
                <a href="#" class="action">Pending</a>
              </td>
              <td>
                <a href="#" class="action">Deny</a>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>George Joestar</td>
              <td>08213</td>
              <td>Deny</td>
              <td>
                <a href="#" class="action">Accept</a>
              </td>
              <td>
                <a href="#" class="action">Pending</a>
              </td>
              <td>
                <a href="#" class="action">Deny</a>
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>Joseph Joestar</td>
              <td>08312</td>
              <td>Pending</td>
              <td>
                <a href="#" class="action">Accept</a>
              </td>
              <td>
                <a href="#" class="action">Pending</a>
              </td>
              <td>
                <a href="#" class="action">Deny</a>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- <input type="hidden" id="ajax_return" name="scripting-purpose-do-not-delete" value=""> -->
    <div id="ajax_return"></div>
    <input type="hidden" id="result" name="scripting-purpose-do-not-delete" value="">
    <script>
    const model_tf=async () => {
      const model = await tf.loadModel('https://ihzaa.com/model.json');
      return model;
    }
    function createCORSRequest(method, url) {
        var xhr = new XMLHttpRequest();
        if ("withCredentials" in xhr) {
          // XHR for Chrome/Firefox/Opera/Safari.
          xhr.open(method, url, true);
        } else if (typeof XDomainRequest != "undefined") {
          // XDomainRequest for IE.
          xhr = new XDomainRequest();
          xhr.open(method, url);
        } else {
          // CORS not supported.
          xhr = null;
        }
          return xhr;
    }
        // Make the actual CORS request.
    function makeCorsRequest() {
          // This is a sample server that supports CORS.
          var url = 'http://ihzaa.com/model.json';
          var xhr = createCORSRequest('GET', url);
          if (!xhr) {
            alert('CORS not supported');
            return;
          }

          // Response handlers.

          xhr.withCredentials = anonymous;
          xhr.send();
    }
    function filterFirst(listUser, target, fixList) {
        var counter = 0;
        for(var i = 0; i < listUser.length; i++)
        {
            if(target[0].blood == listUser[i].blood)
            {
                if(target[0].rhesus == listUser[i].rhesus || listUser[i].rhesus == "-")
                    {
                        fixList[counter] = listUser[i];
                        counter++;
                    }

            }
        }
        for(var i = 0; i < listUser.length; i++)
        {
            if(target[0].blood == "AB")
            {
                if(listUser[i].blood == "A" || listUser[i].blood == "B" || listUser[i].blood == "O")
                {
                    if(target[0].rhesus == listUser[i].rhesus || listUser[i].rhesus == "-")
                        {
                            fixList[counter] = listUser[i];
                            counter++;
                        }
                }
            }
        }
        for(var i = 0; i < listUser.length; i++)
        {
            if(target[0].blood == "A" || target[0].blood == "B")
            {
                if(listUser[i].blood == "O")
                {
                    if(target[0].rhesus == listUser[i].rhesus || listUser[i].rhesus == "-")
                        {
                            fixList[counter] = listUser[i];
                            counter++;
                        }
                }
            }
        }
    }

    function filterSecond(userList, fixList)
    {
      var counter = 0;
        for(var i = 0; i < userList.length; i++){model_tf().then(model => document.getElementById("result").value=model.predict(tf.tensor2d([[userList[i].jarak1,userList[i].jarak2,userList[i].jarak3]])).dataSync());
                var res=document.getElementById("result").value;
                // console.log(res);
                var arr = res.split(',');
                console.log(arr);
                arr[0] = parseFloat(arr[0]);
                arr[0] = Math.abs(1 - arr[0]);
                arr[1] = parseFloat(arr[1]);
                arr[1] = Math.abs(1 - arr[1]);
                arr[2] = parseFloat(arr[2]);
                arr[2] = Math.abs(1 - arr[2]);
                // console.log(Math.min.apply(null, arr));
                switch(userTarget[0].idRS){
                  case 1:
                    if(arr[0]==Math.min.apply(null, arr)){
                      fixList[counter]=userList[i];
                    }
                  break;
                  case 2:
                    if(arr[1]==Math.min.apply(null, arr)){
                      fixList[counter]=userList[i];
                    }
                  break;
                  case 3:
                    if(arr[2]==Math.min.apply(null, arr)){
                      fixList[counter]=userList[i];
                    }
                  break;
                  default:
                  break;
                }
                // console.log(arr[1]);
                // console.log(Math.min.apply(null, arr));
                // console.log(fixList[counter]);
                counter++;
                // console.log(arr[0]);
                // console.log(arr[1]);
                // console.log(arr[2]);
                //if arr[1] paling kecil, masukkan ke list fixList (karena dummy database sama semua, jarak paling kecil jarak 2, yang berarti dia di rumah sakit dua)
            }
    }


    //model_tf().then(model => console.log(model));

    //pengganti database (anggapa udah ada jarak, aslinya harusnya koordinat, baru koordinatnya di parse dengat matrix distance api dibandingkan dengan koordinat user donor)
    let user = [
        {
            name: "lagsana1",
            blood: "O",
            rhesus: "+",
            phoneNumber: "081111111111",
            jarak1: "0.1235",
            jarak2: "0.000123",
            jarak3: "1.00123",
        },
        {
            name: "lagsana2",
            blood: "O",
            rhesus: "-",
            phoneNumber: "081111111111",
            jarak1: "0.000123",
            jarak2: "0.1235",
            jarak3: "1.00123",
        },{
            name: "lagsana3",
            blood: "A",
            rhesus: "+",
            phoneNumber: "081111111111",
            jarak1: "0.1235",
            jarak2: "0.000123",
            jarak3: "1.00123",
        },{
            name: "lagsana4",
            blood: "A",
            rhesus: "-",
            phoneNumber: "081111111111",
            jarak1: "0.1235",
            jarak2: "0.000123",
            jarak3: "1.00123",
        },{
            name: "lagsana5",
            blood: "B",
            rhesus: "+",
            phoneNumber: "081111111111",
            jarak1: "0.1235",
            jarak2: "0.000123",
            jarak3: "1.00123",
        },{
            name: "lagsana6",
            blood: "B",
            rhesus: "-",
            phoneNumber: "081111111111",
            jarak1: "0.1235",
            jarak2: "1.00123",
            jarak3: "0.000123",
        },{
            name: "lagsana7",
            blood: "AB",
            rhesus: "+",
            phoneNumber: "081111111111",
            jarak1: "0.000123",
            jarak2: "0.1235",
            jarak3: "1.00123",
        },{
            name: "lagsana8",
            blood: "AB",
            rhesus: "-",
            phoneNumber: "081111111111",
            jarak1: "0.000123",
            jarak2: "0.1235",
            jarak3: "1.00123",
        },{
            name: "lagsana9",
            blood: "AB",
            rhesus: "+",
            phoneNumber: "081111111111",
            jarak1: "0.1235",
            jarak2: "0.000123",
            jarak3: "1.00123",
        },{
            name: "lagsana10",
            blood: "AB",
            rhesus: "-",
            phoneNumber: "081111111111",
            jarak1: "0.000123",
            jarak2: "0.1235",
            jarak3: "1.00123",
        }
    ];

    //Dummy target recipient
    let userTarget = [
        {
            name: "lagsanaTarget",
            blood: "AB",
            rhesus: "-",
            idRS: 1, //contoh klo misalnya kejadiannya di RS 2
        }
    ]
    let fix1 = [];//list hasil filter pertama
    let fix2 = [];//list hasil filter kedua (hasil akhir)
    //filter pertama, munta database, kasus, sama list sementarauntuk filter pertama
    // console.log();
    filterFirst(user, userTarget, fix1);
    // console.log();
    filterSecond(fix1, fix2);
    //filter minta list hasil filter pertama sama list untuk hasil akhir
    // var table = document.getElementById("table");
    // if(document.getElementById("row1")){
    //   table.deleteRow(i);
    // }
    // var row = table.insertRow(i);
    // row.setAttribute("id", "row"+i);
    // row.setAttribute("class", "row-class");
    //
    // var cell1 = row.insertCell(0);
    // cell1.setAttribute("id", "cell"+i+"_1");
    // document.getElementById("cell"+i+"_1").innerHTML = i;
    // var value = snapshot.forEach((child) => {
    //   var key=child.key;
    //   var value=child.val();
    //   console.log(key);
    //   if(key=="Nama"){
    //     var cell3 = row.insertCell(1);
    //     cell3.setAttribute("id", "cell"+i+"_3");
    //     document.getElementById("cell"+i+"_3").innerHTML = value;
    //   }else if(key=="GolDar"){
    //     var cell4 = row.insertCell(1);
    //     cell4.setAttribute("id", "cell"+i+"_4");
    //     document.getElementById("cell"+i+"_4").innerHTML = value;
    //   }else if(key=="SaldoDarah"){
    //     var cell5 = row.insertCell(3);
    //     cell5.setAttribute("id", "cell"+i+"_5");
    //     document.getElementById("cell"+i+"_5").innerHTML = value;
    //   }
    // });
    // var cell2 = row.insertCell(1);
    // cell2.setAttribute("id", "cell"+i+"_2");
    // document.getElementById("cell"+i+"_2").innerHTML = snapshot.key;
    // var cell6 = row.insertCell(5);
    // cell6.setAttribute("id", "cell"+i+"_6");
    // document.getElementById("cell"+i+"_6").innerHTML = "<a href=\"balance.php?key="+snapshot.key+"\" class=\"action\">Add balance</a>";
    </script>
  </body>
</html>
