@extends("layouts.app")

@section("content")
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Notifications</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <ul class="iq-timeline">
                @foreach($notifications as $notification)
                    <li>
                        <div class="timeline-dots border-{{$notification->status}}"><i class="ri-pantone-line"></i></div>
                        <h6 class="float-left mb-1">{{ $notification->title }}</h6>
                        <small class="float-right mt-1">{{ \Carbon\Carbon::make($notification->created_at)->toFormattedDayDateString() }}</small>
                        <div class="d-inline-block w-100">
                            <p>{{ $notification->description }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
