<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Active Polls</h3>

    <div>
        <a href="{{ route('polls.create') }}" class="btn btn-sm btn-success">
            + Create Poll
        </a>

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="btn btn-sm btn-outline-danger ms-2">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>

<h3>Active Polls</h3>

@if($polls->count() === 0)
    <p style="color: gray;">
        No active polls available right now.
    </p>
@else
    <ul>
        @foreach($polls as $poll)
            <li>
                <a href="#" class="poll-link" data-id="{{ $poll->id }}">
                    {{ $poll->question }}
                </a>
            </li>
        @endforeach
    </ul>
@endif

<div id="poll-view"></div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).on('click', '.poll-link', function (e) {
    e.preventDefault();
    let id = $(this).data('id');
    $('#poll-view').load('/polls/' + id);
});
</script>
