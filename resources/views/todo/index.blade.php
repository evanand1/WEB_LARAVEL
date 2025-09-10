<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- 00. Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid col-md-7">
            <div class="navbar-brand">Simple To Do List</div>
            <!-- 
            <div class="navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Akun Saya
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                            <li><a class="dropdown-item" href="#">Update Data</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        -->
        </div>
    </nav>
    
    <div class="container mt-4">
        <!-- 01. Content-->
        <h1 class="text-center mb-4">To Do List</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
             <div class="card mb-3">
                <div class="card-body">
                    <!-- 02. Form input data -->
                    <form id="todo-form" action="{{ route('todo.store') }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="task" id="todo-input"
            placeholder="Tambah task baru" required>
        <button class="btn btn-primary" type="submit">
            Simpan
        </button>
    </div>
</form>
                  </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <p class="text-muted" id="realtime-clock">Waktu sekarang: --:--:--</p>

                    <ul>
    @foreach ($todos as $todo)
        <li>
            {{ $todo->task }} - <small>Dibuat pada: {{ $todo->created_at->format('d M Y, H:i') }}</small>

            <form action="{{ route('todo.update', $todo->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button type="submit">
                    @if($todo->is_done)
                        Undo
                    @else
                        Done
                    @endif
                </button>
            </form>

            @if($todo->is_done)
                <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endif
        </li>
    @endforeach
</ul>

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
<script>
    function updateClock() {
        const now = new Date();
        const jam = now.getHours().toString().padStart(2, '0');
        const menit = now.getMinutes().toString().padStart(2, '0');
        const detik = now.getSeconds().toString().padStart(2, '0');
        document.getElementById("realtime-clock").textContent = `Waktu sekarang: ${jam}:${menit}:${detik}`;
    }

    setInterval(updateClock, 1000);
    updateClock(); // initial call
</script>

</body>

</html>