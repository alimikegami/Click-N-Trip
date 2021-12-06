@extends('layouts.main-layout')

@section('css')
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/tourPosting.css">
  <link rel="stylesheet" href="../css/Navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('body')
@include('components.navbar-logged-in')
      <!-- Register Page Starts Here -->
      <div class="container mt-5">
        <div class="row mb-5" id='header'>
          <h1 class='text-center' id='tourpostheadertitle'>List Your Very Own Day Trip Plan</h1>
        </div>
        <div class='row'>
              <div class="container">
                <form action="/day-trips" method="post" class='register-form pt-5' enctype="multipart/form-data">
                    @csrf
                    @if (Session::has('success'))
                      <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @error('title')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('description')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('price_per_day')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('max_capacity_per_day')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('time_start')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('time_end')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('agenda')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('images')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="row mb-3">
                      <div class="col-3">
                        <label for="title" class="form-label">Day Trip Plan Title</label>
                      </div>
                      <div class="col">  
                        <input type="text" class="form-control" name="title" id="title" placeholder='The Grand Trip' required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-3">
                        <label for="destination" class="form-label">Day Trip Plan Destination</label>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" name="destination" id="destination" placeholder='Canggu, Bali' required></input>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-3">
                        <label for="description" class="form-label">Day Trip Plan Description</label>
                      </div>
                      <div class="col">
                        <textarea class="form-control" name="description" id="description" placeholder='The greatest trip plan ever seen' required></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-3">
                        <label for="price_per_day" class="form-label">Day Trip Plan Price</label>
                      </div>
                      <div class="col">
                        <input type="number" name="price_per_day" class="form-control" id="price_per_day" placeholder='IDR.500.000,00' required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-3">
                        <label for="max_capacity_per_day" class="form-label">Day Trip Plan Capacity (Person)</label>
                      </div>
                      <div class="col">                        
                        <input type="number" name='max_capacity_per_day' class="form-control" id="max_capacity_per_day" placeholder='5' required> 
                      </div>
                    </div>
                    <script>
                      function addRow(){
                        let container = document.getElementById('schedule-form');

                        let form = document.createElement('section');
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
                        
                        let dummyRow = document.createElement('class');
                        dummyRow.className = 'row'
                        let emptyColumn = document.createElement('div');
                        emptyColumn.className = 'col-3';
                        let containerColumn = document.createElement('div');
                        containerColumn.className = 'col';
                        let removeButtonColumn = document.createElement('div');
                        removeButtonColumn.className='col'
                        
                        let removeLabel = document.createElement('label');
                        removeLabel.innerHTML = "Action";
                        removeLabel.htmlFor = 'removebutton';
                        removeLabel.className = 'form-label'
                        
                        formTimeStartContainer.appendChild(startLabel)
                        formTimeStartContainer.appendChild(formTimeStart);
                        formTimeEndContainer.appendChild(endLabel);
                        formTimeEndContainer.appendChild(formTimeEnd);
                        formTimeOutsideContainer.appendChild(formTimeStartContainer);
                        formTimeOutsideContainer.appendChild(formTimeEndContainer);
                        formTimeColumn.appendChild(formTimeOutsideContainer)
                        formAgendaColumn.appendChild(agendaLabel);
                        formAgendaColumn.appendChild(formAgenda);
                        removeButtonColumn.appendChild(removeLabel);
                        form.appendChild(formTimeColumn);
                        form.appendChild(formAgendaColumn);
                        form.appendChild(removeButtonColumn);
                        $(removeButtonColumn).append(
                          "<button onclick='removeSchedule(this)' class='d-block btn btn-primary' id='removebutton' type='button'>"+
                          "Remove"+
                          "</button>"
                        );
                        dummyRow.appendChild(emptyColumn);
                        containerColumn.appendChild(form);
                        dummyRow.appendChild(containerColumn);
                        container.appendChild(dummyRow);
                      }
                      function removeSchedule(pointer){
                        $(pointer).parents("section").remove();
                      }
                    </script>
                    <div class="mb-3" id='schedule-form'>
                    <div class="row">
                      <div class="col-3">
                        <label class="form-label">Day Trip Plan Schedule</label>
                      </div>
                      <div class="col">
                        <div class="row mb-3" >
                            <div class="col" > 
                                <div class="row">
                                    <div class="col">
                                        <label for="time_start" class="form-label">Time Start</label>
                                        <input type="time" name='time_start[]' class="form-control" id="time_start" placeholder='start' required> 
                                    </div>   
                                    <div class="col">
                                        <label for="time_end" class="form-label">Time End</label>
                                        <input type="time" name='time_end[]' class="form-control" id="time_end" placeholder='end' required> 
                                    </div>   
                                </div>
                            </div>
                            <div class="col"> 
                                <label for = 'agenda' class="form-label">Agenda</label>   
                                <input type="text" name='agenda[]' class="form-control" id="agenda" placeholder='Shedule Agenda' required> 
                            </div>
                            <div class="col"> 
                              <label for = 'removebutton' class="form-label">Action</label> 
                              <button type="button" id="removebutton" class="d-block btn btn-primary">Remove</button>  
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                      <div class="d-flex justify-content-center">
                          <button id='create-button' type='button' onclick="addRow()" class="btn btn-secondary">Add Schedule</button>
                      </div>
                    <div class="row mb-5 mt-3">
                      <div class="col-3">
                        <label class="form-label">Day Trip Thumbnail</label>
                      </div>
                      <div class="col">
                        <input type="file" name='images[]' class="form-control" id="images" multiple required> 
                      </div>
                    </div>
                    <div class="d-flex justify-content-center pb-5">
                      <button id='create-button' type="submit" class="btn btn-primary mt-3">Create</button>
                    </div>
              </form>
            </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>