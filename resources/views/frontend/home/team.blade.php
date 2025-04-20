@php
    $team = App\Models\Team::latest()->get();
@endphp

<div class="team-area-three pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">Guesthouse's Owner</span>
            <h2>Let's Meet Up With Our Owner And Team Members</h2>
        </div>
        <div class="team-slider-two owl-carousel owl-theme pt-5">
            @foreach ($team as $item)
            <div class="team-item">
                <a href="team.html">
                    <img src="{{ asset($item->image) }}" alt="Images">
                </a>
                <div class="content">
                    <h3><a href="team.html">{{ $item->name }}</a></h3>
                    <span>{{ $item->position }}</span>
                    <ul class="social-link">
                        <li>
                            <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class="fa-brands fa-telegram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
