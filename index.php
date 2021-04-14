<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
        <link href="css/css back.css" rel="stylesheet" type="text/css"/>
        
        <link href="css.css" rel="stylesheet" type="text/css"/>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <div class="container1">
            <section class="container-fluid">
                <section class="row justify-content-center">
                    <section class="col-12 col-sm-6 col-md-3">
                        <form action="login.php" method="post" class="form-container">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="uname" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" id="btn" class="btn btn-primary btn-block">LOGIN</button>
                        </form>

                    </section>
                </section>

            </section>
        </div>
    </body>
</html>