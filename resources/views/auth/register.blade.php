<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto p-3">
                <div class="card my-2 p-3 ">
                  <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                        <x-error name="name" />
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" value="{{old('username')}}">
                        <x-error name="username" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                        <x-error name="email" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}">
                        <x-error name="password" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>    
</x-layout>