<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/tourPosting.css">
    <link rel="stylesheet" href="../css/Navbar.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Post Trip</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" id='custom-navbar'>
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Click-n-Trip</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="#">View Deals</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="LoginPage.html">Login</a></li>
                  <li><a class="dropdown-item" href="/register">Sign-Up</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Register Page Starts Here -->
      <div class="parent container d-flex justify-content-center align-items-center h-100" id='login-container'>
        <div class='form-container container-fluid mt-5 mb-5 rounded'>
          <div class="row">
            <div class="col-lg-2 rounded" id='container-image'>
            </div>
            <div class="col">
              <div class="container">
                <form action="/day-trips" method="post" class='register-form pt-5' enctype="multipart/form-data">
                    @csrf
                    <h1 class='mb-4'>Create a Day Trip Plan</h1>
                    <div class="mb-3">
                        <label for="day_trip_plan_name" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" name="day_trip_plan_name" id="day_trip_plan_name" placeholder='The Grand Trip'>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Plan Description</label>
                        <input type="textarea" class="form-control" name="desc" id="desc" placeholder='The greatest trip plan ever seen'>
                    </div>
                    <div class="mb-3">
                        <label for="price_per_day" class="form-label">Price per Day</label>
                        <input type="text" name="price_per_day" class="form-control" id="price_per_day" placeholder='IDR.500.000,00'>
                    </div>
                    <div class="mb-3">
                        <label for="max_capacity_per_day" class="form-label">Max Capacity per Day</label>
                        <input type="number" name='max_capacity_per_day' class="form-control" id="max_capacity_per_day" placeholder='5'> 
                    </div>
                    <div class="mb-3">
                        <label for="destination" class="form-label">Destination</label>
                        <input type="text" name='destination' class="form-control" id="destination" placeholder='Seminyak-Bali'> 
                    </div>
                    <script>
                      function addRow(){
                        let container = document.getElementById('schedule-form');

                        let form = document.createElement('div');
                        form.className = 'row mb-3';

                        let formTimeColumn = document.createElement('div');
                        formTimeColumn.className = 'col';

                        let formTimeOutsideContainer = document.createElement('div');
                        formTimeOutsideContainer.className = 'row';

                        let formTimeStartContainer = document.createElement('div');
                        formTimeStartContainer.className='col';
                        let formTimeStart = document.createElement('input');
                        formTimeStart.type = 'time';
                        formTimeStart.name = 'time_start[]';
                        formTimeStart.className = 'form-control'
                        formTimeStart.id = 'time_start';
                        formTimeStart.placeholder = 'start'

                        let formTimeEndContainer = document.createElement('div');
                        formTimeEndContainer.className='col';
                        let formTimeEnd = document.createElement('input');
                        formTimeEnd.type = 'time';
                        formTimeEnd.name = 'time_end[]';
                        formTimeEnd.className = 'form-control'
                        formTimeEnd.id = 'time_end';
                        formTimeEnd.placeholder = 'end'

                        formAgendaColumn = document.createElement('div');
                        formAgendaColumn.className='col';
                        let formAgenda = document.createElement('input');
                        formAgenda.type = 'text';
                        formAgenda.name = 'agenda[]';
                        formAgenda.className = 'form-control'
                        formAgenda.id = 'agenda';
                        formAgenda.placeholder = 'Schedule Agenda';

                        let startLabel = document.createElement('label');
                        startLabel.htmlFor = 'time_start';
                        startLabel.className = 'form-label';
                        startLabel.innerHTML = 'Time_Start';
                        let endLabel = document.createElement('label');
                        endLabel.htmlFor = 'time_end';
                        endLabel.className = 'form-label';
                        endLabel.innerHTML = 'Time_End';
                        let agendaLabel = document.createElement('label');
                        agendaLabel.htmlFor = 'agenda';
                        agendaLabel.className = 'form-label';
                        agendaLabel.innerHTML = 'Agenda';
                        
                        formTimeStartContainer.appendChild(startLabel)
                        formTimeStartContainer.appendChild(formTimeStart);
                        formTimeEndContainer.appendChild(endLabel);
                        formTimeEndContainer.appendChild(formTimeEnd);
                        formTimeOutsideContainer.appendChild(formTimeStartContainer);
                        formTimeOutsideContainer.appendChild(formTimeEndContainer);
                        formTimeColumn.appendChild(formTimeOutsideContainer)
                        formAgendaColumn.appendChild(agendaLabel);
                        formAgendaColumn.appendChild(formAgenda);
                        form.appendChild(formTimeColumn);
                        form.appendChild(formAgendaColumn);
                        container.appendChild(form)
                        }
                    </script>
                    <div class="mb-3" id='schedule-form'>
                        <label class="form-label">Add Schedule</label>
                        <div class="row mb-3" >
                            <div class="col" > 
                                <div class="row">
                                    <div class="col">
                                        <label for="time_start" class="form-label">Time Start</label>
                                        <input type="time" name='time_start[]' class="form-control" id="time_start" placeholder='start'> 
                                    </div>   
                                    <div class="col">
                                        <label for="time_end" class="form-label">Time End</label>
                                        <input type="time" name='time_end[]' class="form-control" id="time_end" placeholder='end'> 
                                    </div>   
                                </div>
                            </div>
                            <div class="col"> 
                                <label for = 'agenda' class="form-label">Agenda</label>   
                                <input type="text" name='agenda[]' class="form-control" id="agenda" placeholder='Shedule Agenda'> 
                            </div>
                        </div>
                      </div>
                      <div class="d-grid gap-2">
                          <button type='button' onclick="addRow()" class="btn btn-primary mt-3">Add Schedule</button>
                      </div>
                    <div class="mb-3">
                        <label class="form-label">Day Trip Thumbnail</label>
                        <input type="file" name='image_path' class="form-control" id="image_path"> 
                        <div class='d-flex justify-content-center mt-3' id='show-thumbnail'>
                            <label class='text-center'>Image Show Here</label>
                            <div>
                                <!-- image here -->
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 pb-5">
                      <button type="submit" class="btn btn-primary mt-3">Sign Up</button>
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