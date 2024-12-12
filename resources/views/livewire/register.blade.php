<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 50px;
        }
        .card-header {
            background-color: #8B4513; /* Brown color */
            color: #fff;
            padding: 10px;
            font-size: 1.25rem;
            border-radius: 5px 5px 0 0;
        }
        .btn-primary,
        .btn-success {
            background-color: rgba(205, 133, 63, 0.5); /* Very light brown, almost transparent */
            border: none;
        }
        .btn-primary:hover,
        .btn-success:hover {
            background-color: rgba(205, 133, 63, 0.8); /* Slightly darker on hover */
        }
        .form-label {
            font-weight: bold;
        }
        .text-danger {
            color: red;
        }
    </style>
</head>
<body>
<div class="card offset-3 col-6">
  <div class="card-header">
  Register
  </div>
  <div class="card-body">
  <form wire:submit="storeUser">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input wire:model="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div>
       @error('name')
          <span class="text-danger">{{$message}}</span>
       @enderror
    </div>  
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input wire:model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div>
       @error('email')
          <span class="text-danger">{{$message}}</span>
       @enderror
    </div>  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input wire:model="password" type="password" class="form-control" id="exampleInputPassword1">
    <div>
       @error('password')
          <span class="text-danger">{{$message}}</span>
       @enderror
    </div>  
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <div class="mb-3">
      Already have an account? <button wire:navigate href="/login" class="btn btn-success">Login</button>
  </div>
  </div>
</div>
</body>
</html>
