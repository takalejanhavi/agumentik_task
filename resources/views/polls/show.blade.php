<h3>{{ $poll->question }}</h3>

<div id="vote-message" style="margin-bottom:10px;"></div>

<form id="voteForm">
    @foreach($poll->options as $option)
        <div>
            <label>
                <input type="radio" name="option_id" value="{{ $option->id }}">
                {{ $option->option_text }}
            </label>
        </div>
    @endforeach

    <button type="submit">Vote</button>
</form>

<!-- jQuery (MANDATORY as per task) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$('#voteForm').on('submit', function(e) {
    e.preventDefault(); // ❌ no page reload

    let optionId = $('input[name="option_id"]:checked').val();

    if (!optionId) {
        $('#vote-message').html('<span style="color:red">Please select an option.</span>');
        return;
    }

    $.ajax({
        url: '/vote',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            poll_id: {{ $poll->id }},
            option_id: optionId
        },
        success: function(response) {
            if (response.status === 'success') {
                $('#vote-message').html('<span style="color:green">' + response.message + '</span>');
            } else {
                $('#vote-message').html('<span style="color:red">' + response.message + '</span>');
            }
        }
    });
});
</script>
<hr>

<h4>Live Results</h4>

<div id="results">
    @foreach($poll->options as $option)
        <div id="option-{{ $option->id }}">
            {{ $option->option_text }} :
            <strong>0</strong> votes
        </div>
    @endforeach
</div>
<script>
function fetchResults() {
    $.ajax({
        url: '/polls/{{ $poll->id }}/results',
        method: 'GET',
        success: function (data) {
            data.forEach(function (item) {
                $('#option-' + item.option_id + ' strong').text(item.total);
            });
        }
    });
}

// Initial fetch
fetchResults();

// Fetch results every ~1 second (real-time)
setInterval(fetchResults, 1000);
</script>
