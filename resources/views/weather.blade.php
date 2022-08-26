<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Weather</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
      <section class="vh-50">
      <div class="container py-5 h-100">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <br />
      @endif
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-8 col-lg-6 col-xl-4">

        <h3 class="mb-4 pb-2 fw-normal">Check the weather forecast</h3>
   
        <div class="input-group rounded mb-3">
          <input type="text" class="form-control rounded" id="city" placeholder="Enter City"  />
          <button id="check" class="btn btn-primary" >check </button>
        </div>
      </div>
    </div>
      </div>
      </section>

       {{-- report code --}}
          <section class="vh-100 block_div" style="background-color: #4B515D;display:none">
            <div class="container py-5 h-100 " >
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-8 col-lg-6 col-xl-4">

                      <div class="card" style="color: #4B515D; border-radius: 35px;width:130%">
                        <div class="card-body p-4">
                          <div class="d-flex">
                            <h6 class="flex-grow-1" id="city_name"></h6>
                            <h6 >{{ date('H:i A')}} </h6>
                          </div>
                          <div class="d-flex flex-column text-center mt-5 mb-4">
                            <h6 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;"> <p id="temp"></p>°F </h6>
                            <span class="small" style="color: #868B94"><b><p id="description"></p></b></span>
                          </div>

                          <div class="d-flex align-items-center">
                            <div class="flex-grow-1" style="font-size: 1rem;">
                              <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1"> Fells Like : <p id="fells_like"></p>
                                </span></div>
                                <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span class="ms-1"> Max temp: <p id="temp_max"></p> </span>
                              </div>
                              <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span class="ms-1"> Min temp: <p id="temp_min"></p> </span>
                              </div>
                              <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1"> Humidity: <p id="humidity"></p>
                                </span></div>
                              <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span class="ms-1"> Visibility: <p id="visibility"></p> </span>
                              </div>
                            </div>
                            <div>
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu1.webp"
                                width="100px">
                            </div>
                          </div>

                        </div>
                      </div>

                    </div>
                  </div>

                </div>
          

          </div>
          </section>
      
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>

    $('#check').on('click',function(e){
      var city = $('#city').val();
       if(city == ''){
        alert('Please enter city name');
       }
      $.ajax({
       
                type:'post',
                url:"{{ route('getReport')}}",
                data: {
                    "_token":"{{csrf_token()}}",
                    city:city,
                     },
                
                success:function(data){
                  if(data['status']==200){
                   
                      console.log(data['data'].city);
                      $('.block_div').css('display','block');
                      $('#city_name').append(data['data'].city);
                      $('#description').append(data['data'].description);
                      $('#temp').append(data['data'].temp);
                      $('#fells_like').append(data['data'].feels_like);
                      $('#temp_max').append(data['data'].temp_max);
                      $('#temp_min').append(data['data'].temp_max);
                      $('#humidity').append(data['data'].humidity);
                      $('#visibility').append(data['data'].visibility);                  
                   }
                   else if(data['status'] == 201){
                      $('.block_div').css('display','none');
                      alert('unable to insert data');
                   }
                   else{
                      $('.block_div').css('display','none');
                      alert('Please enter correct city name');
                   }
                }
            });
      
    });
  </script>
</html>
