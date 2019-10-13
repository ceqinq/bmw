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

    for(var i = 0; i < userList.length; i++)
        {
            model_tf().then(model => document.getElementById("result").value=model.predict(tf.tensor2d([[userList[i].jarak1, userList[i].jarak2, userList[i].jarak3]])).dataSync());
            var res=document.getElementById("result").value;
            var arr = res.split(',');
            arr[0] = parseFloat(arr[0]);
            arr[0] = Math.abs(1 - arr[0]);
            arr[1] = parseFloat(arr[1]);
            arr[1] = Math.abs(1 - arr[1]);
            arr[2] = parseFloat(arr[2]);
            arr[2] = Math.abs(1 - arr[2]);
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
        jarak1: "0.1235",
        jarak2: "0.000123",
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
        jarak2: "0.000123",
        jarak3: "1.00123",
    },{
        name: "lagsana7",
        blood: "AB",
        rhesus: "+",
        phoneNumber: "081111111111",
        jarak1: "0.1235",
        jarak2: "0.000123",
        jarak3: "1.00123",
    },{
        name: "lagsana8",
        blood: "AB",
        rhesus: "-",
        phoneNumber: "081111111111",
        jarak1: "0.1235",
        jarak2: "0.000123",
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
        jarak1: "0.1235",
        jarak2: "0.000123",
        jarak3: "1.00123",
    }
];

//Dummy target recipient
let userTarget = [
    {
        name: "lagsanaTarget",
        blood: "AB",
        rhesus: "-",
        idRS: 2, //contoh klo misalnya kejadiannya di RS 2
    }
]
let fix1 = [];//list hasil filter pertama
let fix2 = [];//list hasil filter kedua (hasil akhir)
//filter pertama, munta database, kasus, sama list sementarauntuk filter pertama
filterFirst(userTarget, userList,fix1);
filterSecond(fix1, fix2);

//filter minta list hasil filter pertama sama list untuk hasil akhir
