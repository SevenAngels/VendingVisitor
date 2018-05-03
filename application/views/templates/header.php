<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="/assets/css/album.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-tour.min.css" rel="stylesheet">
	<title>
		<?php
		if (!empty($page_title)) {
			echo $page_title;
		} else {
			echo 'Vending Visitor';
		} ?>
	</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#"><img src="/assets/imgs/vv-logo.png" width="30" height="43" class="d-inline-block align-middle" alt="">
        Vending Visitor</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php /** @var string $active */
			if ($active == 'Map') echo 'active' ?>">
				<a class="nav-link" href="/index.php/map/view">Map<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item <?php if ($active == 'Browse') echo 'active' ?>">
				<a class="nav-link" href="/index.php/products/viewAll">Browse Items</a>
			</li>
			<li class="nav-item <?php if ($active == 'Feedback') echo 'active' ?>">
				<a class="nav-link" href="#">Feedback</a>
			</li>
			<li class="nav-item <?php if ($active == 'Contact') echo 'active' ?>">
				<a class="nav-link" href="#">Contact Us</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0" action="/index.php/search/searchForProduct" method="get">
			<input name="query" class="form-control mr-sm-2" type="search" placeholder="Search for Inventory"
				   aria-label="Search"/>
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>
