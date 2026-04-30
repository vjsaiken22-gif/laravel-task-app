<!DOCTYPE html>
<html>
<head>
    <title>Task App</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #121212;
            color: white;

            display: flex;
            justify-content: center;

            padding-top: 50px;
        }

        .container {
            width: 550px;

            background: #1e1e1e;

            padding: 25px;

            border-radius: 12px;

            box-shadow: 0 0 15px rgba(0,0,0,0.4);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        form {
            display: inline;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;

            margin-bottom: 20px;
        }

        .task-form {
            display: flex;
            gap: 10px;

            margin-bottom: 20px;
        }

        input[type="text"] {
            flex: 1;

            padding: 10px;

            border: none;
            border-radius: 8px;

            outline: none;

            font-size: 16px;
        }

        button {
            padding: 8px 14px;

            border: none;
            border-radius: 8px;

            cursor: pointer;

            font-weight: bold;
        }

        .dashboard-btn {
            background: #555;
            color: white;
        }

        .logout-btn {
            background: #ff9800;
            color: white;
        }

        .add-btn {
            background: #4CAF50;
            color: white;
        }

        .complete-btn {
            background: #2196F3;
            color: white;
        }

        .delete-btn {
            background: #f44336;
            color: white;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background: #2a2a2a;

            margin-bottom: 12px;

            padding: 12px;

            border-radius: 10px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .done {
            text-decoration: line-through;
            color: #777;
            opacity: 0.7;
        }

        .task-actions {
            display: flex;
            gap: 8px;
        }

        button:hover {
            opacity: 0.85;
        }

        .error-box {
            background: #ff4d4d;

            padding: 10px;

            border-radius: 8px;

            margin-bottom: 15px;

            color: white;
        }

        .task-counter {
            margin-bottom: 15px;
            color: #aaa;

            font-size: 15px;
        }

    </style>
</head>

<body>

    <div class="container">

        <div class="top-bar">

            <a href="/dashboard">
                <button class="dashboard-btn">
                    ⬅ Dashboard
                </button>
            </a>

            <a href="/force-logout">
                <button class="logout-btn">
                    🚪 Logout
                </button>
            </a>

        </div>

        <h1>📝 Task App</h1>

        @if ($errors->any())

            <div class="error-box">

                @foreach ($errors->all() as $error)

                    <p>{{ $error }}</p>

                @endforeach

            </div>

        @endif

        <form action="/tasks" method="POST" class="task-form">

            @csrf

            <input
                type="text"
                name="title"
                placeholder="Enter task..."
                required
            >

            <button type="submit" class="add-btn">
                Add
            </button>

        </form>

        <div class="task-counter">
            Total Tasks: {{ count($tasks) }}
        </div>

        <ul>

            @foreach($tasks as $task)

                <li>

                    <span class="{{ $task->is_done ? 'done' : '' }}">
                        {{ $task->title }}
                    </span>

                    <div class="task-actions">

                        <form action="/tasks/{{ $task->id }}" method="POST">

                            @csrf
                            @method('PUT')

                            <button type="submit" class="complete-btn">

                                @if($task->is_done)
                                    Undo
                                @else
                                    Complete
                                @endif

                            </button>

                        </form>

                        <form action="/tasks/{{ $task->id }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-btn">
                                Delete
                            </button>

                        </form>

                    </div>

                </li>

            @endforeach

        </ul>

    </div>

</body>
</html>
