<?php
/**
 * Created by PhpStorm.
 * User: griggi
 * Date: 5/3/2018
 * Time: 10:42 PM
 */
?>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Contact Us</h1>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <img src="/assets/imgs/vv-logo.png">
                </div>
                    <div class="col-md-4">
                    <form role="form">
                        <br style="clear:both">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                        </div>

                        <button type="button" id="submit" name="submit" class="btn btn-secondary pull-right">Submit Form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


