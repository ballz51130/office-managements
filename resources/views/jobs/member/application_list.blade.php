

<script src="https://kit.fontawesome.com/94fa0b7fcf.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <div class="container p-5">
        <br>
        <center><img src="{{ asset('images/header.png') }}" style="height: 70px;width:auto"></center>
        <br><br>
        <center><h3>รับสมัครพนักงาน</h3></center>
    </div>
        <div class="container">
            <div class="row">
              @php
                $job = ['java Programer','PHP Programer','WEB Programer','MOBILE Programer','Database','marketing'];
                $count = count($job);
              @endphp
              @for ($i = 0; $i < $count; $i++)
                  @php
                     $jobs = $job[$i];
                  @endphp
                <div class="col-md-4 p-2">
                    <div class="card" style="width: 23rem;">
                        <img src="https://jobs.hubbathailand.com/assets/bg/banner-6af15a097cf8aebf8c0337eb44912da9a986c53fe58fdf2de10721480142501d.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-title float-right text-danger">เหลืออีก 30 วัน</p>
                        <h5 class="card-title">{{ $jobs }}</h5>

                          <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam culpa dicta assumenda. Consequuntur blanditiis quasi ea. Neque, cumque. Natus doloribus fuga perspiciatis doloremque eveniet nemo odio explicabo ratione nulla beatae.</p>
                        </div>
                        <div class="card-body">
                            <p class="card-title float-left"><i class="fas fa-briefcase"></i> 35,000/เดือน</p>
                        <a href="{{ROUTE('jobs.applicationdetail',$i)}}" class="card-link float-right text-dark">ดูรายละเอียด</a>
                        </div>
                      </div>
                </div>

                @endfor

        </div>


