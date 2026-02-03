<h3>Votes (Admin View)</h3>

<table border="1" cellpadding="8">
<tr>
    <th>IP</th>
    <th>Option</th>
    <th>Voted At</th>
    <th>Status</th>
    <th>Action</th>
</tr>

@foreach($votes as $vote)
<tr>
    <td>{{ $vote->ip_address }}</td>
    <td>{{ $vote->option_id }}</td>
    <td>{{ $vote->voted_at }}</td>
    <td>
        {{ $vote->is_released ? 'Released' : 'Active' }}
    </td>
    <td>
        @if(!$vote->is_released)
        <button class="release-btn" data-id="{{ $vote->id }}">
            Release IP
        </button>
        @endif
    </td>
</tr>
@endforeach
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('.release-btn').click(function () {
    let voteId = $(this).data('id');

    $.post('/admin/release-ip', {
        _token: '{{ csrf_token() }}',
        vote_id: voteId
    }, function (res) {
        alert(res.message);
        location.reload(); // allowed for admin page
    });
});
</script>
