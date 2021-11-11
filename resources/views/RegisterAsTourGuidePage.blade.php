<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/LoginPage.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>Register</title>
</head>
<body>
      <!-- Register Page Starts Here -->
      <div class="parent container d-flex justify-content-center align-items-center h-100" id='login-container'>
        <div class='form-container container-fluid rounded mt-5 mb-5'>
          <div class="row">
              <div class="col d-flex justify-content-center align-items-center">
                <div class="container" id="right-content">
                  <h2 class='text-center'id='right-text' >Tour Guide Registration</h2>
                  <div class="container d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar-event" style="font-size: 9.5rem; color:black;"></i>
                  </div>
                </div>
              </div>
            <div class="col">
              <div class="container">
                <form class="register-form">
                    <h2 class='pt-5'>Fill in to Register as Tour Guide!</h2>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="province" class="form-label">Province</label>
                        <input type="text" class="form-control" name="province" id="province" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik">
                    </div>
                    <div class="mb-3">
                        <label for="fotoktp" class="form-label">Selfie With KTP</label>
                        <input type="file" name='fotoktp' class="form-control" id="fotoktp">
                    </div>
                    <div class="d-grid gap-2 pb-5">
                      <button type="submit" class="btn btn-primary mt-3">Apply</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>