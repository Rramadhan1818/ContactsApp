<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Contact</title>

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
    <link href="/assets/css/jasny-bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand text-uppercase" href="#">
            My contact
          </a>
        </div>
        <!-- /.navbar-header -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <div class="nav navbar-right navbar-btn">
            <a href="{{ route('contacts.create') }}" class="btn btn-default">
              <i class="glyphicon glyphicon-plus"></i>
              Add Contact
            </a>
          </div>
        </div>
      </div>
    </nav>

    <!-- content -->
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <?php $selected_group = Request::get('group_id') ?>
            <a href="{{ route('contacts.index') }}" class="list-group-item {{ empty($selected_group) ? 'active' : '' }}">All Contact <span class="badge">{{ App\Contact::count() }}</span></a>
            @foreach (App\Group::all() as $group)
            <a href="{{ route('contacts.index', ['group_id' => $group->id]) }}" class="list-group-item {{ $selected_group == $group->id ? 'active' : ''  }}">{{ $group->name }} <span class="badge">{{ $group->contacts->count() }}</span></a>
           @endforeach
          </div>
        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <link href="/assets/css/jasny-bootstrap.min.css" rel="stylesheet">
  </body>
</html>
