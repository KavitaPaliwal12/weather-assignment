<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Report</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </head>
    <body>
       <section class="vh-100" style="background-color: #4B515D;">
  <div class="container py-5 h-100">

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-8 col-lg-6 col-xl-4">

        <div class="card" style="color: #4B515D; border-radius: 35px;">
          <div class="card-body p-4">

            <div class="d-flex">
              <h6 class="flex-grow-1">{{ $getData->City }}</h6>
              <h6>{{ $time }} </h6>
            </div>

            <div class="d-flex flex-column text-center mt-5 mb-4">
              <h6 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;"> {{ $getData->temp }}°F </h6>
              <span class="small" style="color: #868B94">{{ $getData->description }}</span>
            </div>

            <div class="d-flex align-items-center">
              <div class="flex-grow-1" style="font-size: 1rem;">
                <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1"> Fells Like : {{ $getData->feels_like }}
                  </span></div>
                   <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span class="ms-1"> Max temp: {{ $getData->temp_max }}  </span>
                </div>
                 <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span class="ms-1"> Min temp: {{ $getData->temp_min}} </span>
                </div>
                <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1"> Humidity: {{ $getData->humidity }}
                  </span></div>
                <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span class="ms-1"> Visibility: {{ $getData->visibility }}</span>
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
</section>


    </body>
</html>
