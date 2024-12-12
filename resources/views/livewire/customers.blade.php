<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .btn-success,
        .btn-primary,
        .btn-secondary,
        .btn-danger {
            background-color: rgba(205, 133, 63, 0.5); /* Very light brown, almost transparent */
            border: none;
        }
        .btn-success:hover,
        .btn-primary:hover,
        .btn-secondary:hover,
        .btn-danger:hover {
            background-color: rgba(205, 133, 63, 0.8); /* Slightly darker on hover */
        }
        .form-control {
            background-color: rgba(205, 133, 63, 0.5); /* Very light brown, almost transparent */
            border: 1px solid #ddd;
            color: #8B4513;
        }
        .form-control::placeholder {
            color: #8B4513;
        }
        .table {
            margin-top: 20px;
        }
        .text-danger {
            color: red;
        }
    </style>
</head>
<body>
<div>
    <div class="row">
        <div class="col-auto">
            <button wire:navigate href="/customers/create" class="btn btn-success btn-sm">Create</button>
        </div>
        <div class="col-auto">
            <input wire:model.live.debounce.150ms="search" type="text" class="form-control" placeholder="Search customer">
        </div>
    </div>
    <livewire:flash-message/>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <th scope="row">{{$customer->id}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>
                    <button wire:navigate href="/customers/{{$customer->id}}" class="btn btn-primary btn-sm">View</button>
                    <button wire:navigate href="/customers/{{$customer->id}}/edit" class="btn btn-secondary btn-sm">Edit</button>
                    <button wire:click="deletecustomer({{$customer->id}})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
