<h3>Active Polls</h3>

<div style="margin-bottom: 15px;">
    <a href="/polls/create" style="
        padding: 8px 12px;
        background-color: #0d6efd;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    ">
        + Create Poll
    </a>
</div>

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
