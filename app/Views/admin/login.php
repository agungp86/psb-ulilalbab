<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h2>Login Admin</h2>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('login')?>" method="post">
                        <label class="form-label" for="username">Username:</label><br>
                        <input class="form-control" type="text" id="username" name="username"><br>
                        <label class="form-label" for="password">Password:</label><br>
                        <input class="form-control" type="password" id="password" name="password"><br>
                        <input class="btn btn-outline-success" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>