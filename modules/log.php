<div class="wrapper" id="form-container-wrap">
            <div id="form-container">
                <h2 id="new">Nuovo iscritto? Registrati!</h2>
                <p></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Nome Utente</label>
                        <input type="text" id="username" name="username" class="form-control"
                            oninput="checkAvailability(this.value)" value="<?php echo $username;  ?> ">
                        <span class="help-block"><?php echo $username_err; ?></span><span
                            id="user-availability-status"></span>
                        <p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control"
                            value="<?php echo $confirm_password; ?>">
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input id="submit" type="submit" class="btn btn-primary" value="Unisciti a Moot!">

                    </div>
                    <p>Ho già un account <a href="login.php">Login</a>.</p>
                </form>
            </div>
        </div>