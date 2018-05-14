<div class="col m12 responsive">
    @for($i = 0; $i<= 24; $i++)
        <div class="col m3">
            <div class="card hoverable">
                <div class="card-image">
                    <div class="relative">
                        <img src="/storage/serie/{{ $serie->image }}" width="100%">
                        <span class="titre-projets-detail green-text">
                            <i class="material-icons">cloud_download</i>
                            <i class="material-icons">remove_red_eye</i>
                        </span>
                    </div>
                    <div class="progress blue lighten-4" style="margin: 0; height: 8px">
                        <div class="determinate orange" style="width: {{ rand(0,100) }}%"></div>
                    </div>
                </div>
                <div class="card-content center">
                    Episode {{ $i }}
                </div>
            </div>
        </div>
    @endfor
</div>