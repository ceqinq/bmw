<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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
              <li class="current">Donor Request</li>
            </a>
            <a href="validation.php">
              <li>User Validation</li>
            </a>
            <a href="blood-donor.php">
              <li>Blood Donor</li>
            </a>
          </ul>
        </div>
        <div class="col-md-9 content">
          <a href="donor-details.php" class="action">Back</a>
          <table border="1px solid #9e0b0f">
            <tr>
              <td colspan="2">ID</td>
              <td colspan="4" style="text-align:left">001</td>
            </tr>
            <tr>
              <td colspan="2">Name</td>
              <td colspan="4" style="text-align:left">John</td>
            </tr>
            <tr>
              <td colspan="2">Blood Type</td>
              <td colspan="4" style="text-align:left">O+</td>
            </tr>
            <tr>
              <td colspan="2">Hospital</td>
              <td colspan="4" style="text-align:left">RS Mitra Keluarga</td>
            </tr>
            <tr>
              <td colspan="2">Quota Filled</td>
              <td colspan="5" style="text-align:left">(2/4)</td>
            </tr>
            <tr>
              <td colspan="2">Timeout</td>
              <td colspan="5" style="text-align:left">5:00</td>
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
              <td>Jonathan Joestar</td>
              <td>08321</td>
              <td>Accepted</td>
              <td>
                <a href="#" class="action">Accept</a>
              </td>
              <td>
                <a href="#" class="action">Deny</a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Joseph Joestar</td>
              <td>08312</td>
              <td>Denied</td>
              <td>
                <a href="#" class="action">Accept</a>
              </td>
              <td>
                <a href="#" class="action">Deny</a>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
