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
