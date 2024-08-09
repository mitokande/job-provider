<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Planning</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .timetable {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        .developer {
            display: flex;
            margin-bottom: 20px;
            align-items: center;
        }
        .developer-name {
            width: 100px;
            text-align: right;
            margin-right: 10px;
            font-weight: bold;
        }
        .job-container {
            display: flex;
            flex-grow: 1;
            height: 50px;
        }
        .job {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #333;
            margin-right: 2px;
            background-color: #3498db;
            color: #fff;
            height: 100%;
            font-size: 14px;
            text-align: center;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">İş dağılımı Planı</h2>
    <h5 class="text-center">İşlerin detayını görmek için üstünde durun</h5>
  <div style="margin-top:80px"></div>
  <div class="timetable">
    @php
    $maxTime = 0;
    @endphp
      @foreach ($devToJobDict as $key => $jobs)
        @php
        $dev = \App\Models\Developer::find($key);
        @endphp
          <div class="developer">
              <div class="developer-name">Developer #{{ $key }}</div>
              <div class="job-container">
                @php
                $timeSpent = 0;
                @endphp
                  @foreach ($jobs as $job)
                  @php
                  $timeForThisTask = ($job['difficulty'] * $job['duration']) / $dev->hourly_rate;
                  $timeSpent +=  $timeForThisTask;
                  @endphp
                      <div data-toggle="tooltip" data-placement="top" title="Zorluk:{{ $job['difficulty'] }} | Süre:{{ $job['duration'] }} saat
                         | Bitirmek için gereken süre:{{ floatToTime($timeForThisTask) }}" type="button" class=" job" style="flex-basis: {{  ($job['difficulty'] * $job['duration']) / $dev->hourly_rate * 20 }}px;">
                          Job #{{ $job['id'] }}
                      </div>
                  @endforeach
                  
              </div>
              @php
              $maxTime = max($maxTime, $timeSpent);
              @endphp
              <div >Toplam Çalışma Saaati: {{floatToTime($timeSpent)}}  </div>
          </div>
      @endforeach
  </div>
<p>Algoritma mantığı:Zorluk * süreye göre sıralanan işler developerlara müsaitliklerine göre dağıtılıyor.</p><br>
<p>Hafta başından <strong>{{floatToTime($maxTime)}}</strong> sonrasında bütün işler bitmiş olacak.</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>