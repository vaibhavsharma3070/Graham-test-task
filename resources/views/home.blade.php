<!DOCTYPE html>
<html>
<head>
    <title>Test Task</title>
    @livewireStyles
</head>
<body>
    <div class="container mx-auto">
        <div class="card">
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @livewire('category')
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>