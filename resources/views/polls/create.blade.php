<!DOCTYPE html>
<html>
<head>
    <title>Create Poll</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4">
        <h4 class="mb-3">Create Poll</h4>

        <form method="POST" action="/polls">
            @csrf

            <div class="mb-3">
                <label class="form-label">Question</label>
                <input type="text" name="question" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Options</label>
                <input type="text" name="options[]" class="form-control mb-2" placeholder="Option 1" required>
                <input type="text" name="options[]" class="form-control mb-2" placeholder="Option 2" required>
                <input type="text" name="options[]" class="form-control mb-2" placeholder="Option 3">
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="is_active" class="form-control" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button class="btn btn-primary">Create Poll</button>
        </form>
    </div>
</div>

</body>
</html>
