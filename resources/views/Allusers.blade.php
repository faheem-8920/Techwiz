<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }

        .container {
            width: 95%;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #333;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        .delete-button {
            background: #dc3545;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 4px;
        }

        .disable-button {
            background: #ffc107;
            color: black;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 4px;
        }

        .enable-button {
            background: #198754;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 4px;
        }

        .active {
            color: green;
            font-weight: bold;
        }

        .disabled {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>All Users</h2>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Academic Year</th>
                <th>Savings Goal</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

        </thead>

        <tbody>

            @foreach($users as $user)

                <tr>

                    <td>
                        {{ $user->id }}
                    </td>

                    <td>
                        {{ $user->name }}
                    </td>

                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        {{ $user->Academicyear }}
                    </td>

                    <td>
                        {{ $user->Savingsgoal }}
                    </td>

                    <td>
                        {{ $user->userrole }}
                    </td>

                    <td>

                        @if($user->Status)

                            <span class="active">
                                Active
                            </span>

                        @else

                            <span class="disabled">
                                Disabled
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($user->Status)

                            <a
                                href="{{ url('/deactivateuser/'.$user->id) }}"
                                class="disable-button"
                                onclick="return confirm('Are you sure you want to disable this account?')"
                            >
                                Disable
                            </a>

                        @else

                            <a
                                href="{{ url('/activateuser/'.$user->id) }}"
                                class="enable-button"
                                onclick="return confirm('Do you want to enable this account?')"
                            >
                                Enable
                            </a>

                        @endif

                        <a
                            href="{{ url('/deleteuser/'.$user->id) }}"
                            class="delete-button"
                            onclick="return confirm('Are you sure you want to permanently delete this user?')"
                        >
                            Delete
                        </a>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>