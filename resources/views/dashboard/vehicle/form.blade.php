@extends('dashboard.index')
@section('content')
<div class="container page__container">

    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color">Default Forms</strong></p>
                <p class="text-muted">FlowDash supports all of Bootstrap's default form styling in addition to a handful of new input types and features. Please <a href="https://getbootstrap.com/docs/4.1/components/forms/"
                       target="_blank">read the official documentation</a> for a full list of options from Bootstrap's core library.</p>
            </div>
            <div class="col-lg-8 card-form__body card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Your email:</label>
                        <input type="email"
                               class="form-control"
                               id="exampleInputEmail1"
                               placeholder="Enter your email address ..">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Your password:</label>
                        <input type="password"
                               class="form-control"
                               id="exampleInputPassword1"
                               placeholder="Enter your password ..">
                    </div>
                    <button type="submit"
                            class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
