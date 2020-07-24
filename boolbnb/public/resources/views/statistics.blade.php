@extends('layouts.mainLayout')

@section('content')
  <div class="contenitore_statistiche">
    <h1>Statistiche appartamento</h1>
    <div class="statistics">
      <canvas id="views"></canvas>
      <script type="text/javascript">
        var list_of_views = <?php echo json_encode($list_of_views)?>;
        // document.write(list_of_months);
      </script>
    </div>
    <div class="statistics">
      <canvas id="messages"></canvas>
      <script type="text/javascript">
        var list_of_messages = <?php echo json_encode($list_of_messages)?>;
        // document.write(list_of_months);
      </script>
    </div>
  </div>

@endsection
